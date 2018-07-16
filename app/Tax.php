<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $table = 'taxes';
    protected $fillable = [
        'tax_type_id', 'cert_ids',

        // TAX BASE
        'nop', 'owner', 'year', 'due_date', 'value_ly', 'due_date_ly', 'note',

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
    public function type()
    {
        return $this->belongsTo('App\TaxType', 'tax_type_id', 'id');
    }

    /** ATTRIBUTES */
    public function getTaxTypeAttribute()
    {
        return $this->type->short_name;
    }
}
