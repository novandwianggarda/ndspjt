<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $table = 'certificates';
    protected $fillable = [
        'certificate_type_id',

        // CERTIFICATE BASE
        'number', 'name', 'nop', 'owner', 'area', 'published_date', 'expired_date', 'note',

        // ADDRESS
        'addr_city', 'addr_district', 'addr_village', 'addr_address',

        // AJB
        'ajb_nominal', 'ajb_date',

        // SCAN FILES
        'scan_cert', 'scan_plotting', 'scan_land_siteplan', 'scan_krk', 'scan_imb',

        // FOLDER FILLING
        'folder_number', 'folder_current', 'folder_plan'
    ];

    public $timestamp = true;

    /** ELOQUENT RELATION */
    public function type()
    {
        return $this->belongsTo('App\CertificateType', 'certificate_type_id', 'id');
    }

    /** ATTRIBUTES */
    public function getCertTypeAttribute()
    {
        return $this->type->short_name;
    }

}
