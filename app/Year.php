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
        return $this->belongsTo('App\Tax', 'tax_id', 'id');
    }

    public function certye()
    {
        return $this->belongsTo('App\Certificate', 'certificate_id', 'id');
    }




    //ajax

     public function getCertificatesAttribute()
    {
        $certificateIds = explode(',', $this->certificate_ids);
        return Certificate::whereIn('id', $certificateIds)->get();
    }

    public static function yearWithCertificateIds()
    {
        $years = Year::select('id', 'certificate_ids')->get()->toArray();
        $allIds = [];
        foreach ($years as $ye) {
            $certificateIds = explode(',', $ye['certificate_ids']);
            foreach ($certificateIds as $certificateId) {
                array_push($allIds, ['lease_id' => $ye['id'], 'certificate_id' => $certificateId]);
            }
        }
        return $allIds;
    }
}
