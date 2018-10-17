<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Tax extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'taxes';
    protected $fillable = [
        'tax_type_id', 'folder_pbb', 'rencana_group', 'luas_sertifikat', 'pen_pbb', 'wajib_pajak', 'letak_objek_pajak', 'kelurahan_pbb', 'kota_pbb', 'purposes',
        'nop', 'luas_tanah_pbb', 'luas_bangun_pbb', 'year',
        //njop
        'njop_land', 'njop_building', 'njop_total',
        // TAX BASE
        'due_date', 'nominal_ly', 'due_date_ly', 'selisih'
    ];

    public $timestamp = true;


    /** AUDIT */

    /**
     * Attributes to exclude from the Audit.
     *
     * @var array
     */
    protected $auditExclude = [

    ];

    /**
     * Should the audit be strict?
     *
     * @var bool
     */
    protected $auditStrict = true;


    /** ELOQUENT RELATION */

    /**
     * get tax type
     *
     * @return App\TaxType
     */
    public function type()
    {
        return $this->belongsTo('App\TaxType', 'tax_type_id', 'id');
    }

    // public function certif()
    // {
    //     return $this->belongsTo('App\Certificate', 'certificate_id', 'id');
    // }

    public function certax(){
        return $this->belongsToMany('App\Certificate', 'certi_taxs', 'tax_id', 'certificate_ids');

    }

    public function taxye()
    {
        return $this->hasMany('App\Year', 'id');
    }



    /** ATTRIBUTES */

    /**
     * get tax_type
     * short name from type
     * ex: PBB
     *
     * @return string
     */
    public function getTaxTypeAttribute()
    {
        return $this->type->short_name;
    }

    /**
     * get certificates
     */
    public function getCertificatesAttribute()
    {
        $certificateIds = explode(',', $this->certificate_id);
        return Certificate::whereIn('id', $certificateIds)->get();
    }
    //year taxid

    public static function yearWithTaxIds()
    {
        $years = Year::select('id', 'tax_ids')->get()->toArray();
        $allIds = [];
        foreach ($years as $ye) {
            $yearIds = explode(',', $ye['tax_ids']);
            foreach ($yearIds as $yearId) {
                array_push($allIds, ['tax_ids' => $ye['id'], 'tax_ids' => $yearId]);
            }
        }
        return $allIds;
    }


    public static function availableForYear() {
        $notAvailable = array_column(Tax::yearWithTaxIds(), 'tax_ids');
        return Tax::whereNotIn('id', $notAvailable);
    }
}
