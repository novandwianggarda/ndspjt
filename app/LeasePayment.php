<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeasePayment extends Model
{
    protected $table = 'lease_payments';
    protected $fillable = [
        'lease_id', 'due_date', 'paid_date', 'total',
    ];

    public $timestamp = true;


    /** ELOQUENT RELATION */

    /**
     * get lease
     *
     * @return App\Lease
     */
    public function lease()
    {
        return $this->belongsTo('App\Lease', 'lease_id', 'id');
    }


    /** ATTRIBUTES */
}
