<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $table = 'years';
    protected $fillable = [
        'year',
        //njop
        'njop_land', 'njop_building', 'njop_total',
        // TAX BASE
        'due_date', 'nominal_ly', 'due_date_ly', 'selisih'
    ];


    public function taxye()
    {
        return $this->belongsTo('App\Tax', 'tax_id', 'id');
    }

    public function certye()
    {
        return $this->belongsTo('App\Certificate', 'certificate_id', 'id');
    }
}
