<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $table = 'taxes';
    protected $fillable = [
        'tax_type_id', 'certificate_ids',

        // TAX BASE
        'nop', 'owner', 'year', 'due_date', 'nominal_ly', 'due_date_ly', 'note',

        // ADDRESS
        'addr_address', 'addr_village', 'addr_land_area', 'addr_building_area',

        // NJOP
        'njop_land', 'njop_building', 'njop_total',

        // CORPORATION
        'corp_name', 'corp_payment_method',

        // FOLDER FILLING
        'folder_number', 'folder_current', 'folder_plan'
    ];

    public $timestamp = true;


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
