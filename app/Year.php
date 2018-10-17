<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $table = 'years';
    protected $fillable = [
        'year', 'ptkp',
        //njop
        'njop_land', 'njop_building', 'njop_total',
        // TAX BASE
        'due_date', 'nominal_ly', 'due_date_ly', 'selisih'
    ];


    public function taxye()
    {
        return $this->belongsTo('App\Tax', 'tax_ids', 'id');
    }

    public function certye()
    {
        return $this->belongsTo('App\Certificate', 'certificate_ids', 'id');
    }




    //ajax

     public function getCertificatesAttribute()
    {
        $certificateIds = explode(',', $this->certificate_ids);
        return Certificate::whereIn('id', $certificateIds)->get();
    }

    public static function yearWithTaxIds()
    {
        $years = Year::select('id', 'tax_ids')->get()->toArray();
        $allIds = [];
        foreach ($years as $year) {
            $taxIds = explode(',', $year['taxIds']);
            foreach ($taxIds as $taxId) {
                array_push($allIds, ['year_id' => $ye['id'], 'tax_id' => $taxId]);
            }
        }
        return $allIds;
    }
}
