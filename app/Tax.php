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

    public function certif()
    {
        return $this->belongsTo('App\Certificate', 'certificate_id', 'id');
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
        $certificateIds = explode(',', $this->certificate_ids);
        return Certificate::whereIn('id', $certificateIds)->get();
    }


    /** STATIC */

    /**
     * get all tax with certificate id
     *
     * @return array
     */
    public static function taxWithCertificateIds()
    {
        $taxes = Lease::select('id', 'certificate_ids')->get()->toArray();
        $allIds = [];
        foreach ($taxes as $tax) {
            $certificateIds = explode(',', $tax['certificate_ids']);
            foreach ($certificateIds as $certificateId) {
                array_push($allIds, ['tax_id' => $tax['id'], 'certificate_id' => $certificateId]);
            }
        }
        return $allIds;
    }
}
