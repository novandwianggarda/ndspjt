<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class LeasePayment extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'lease_payments';
    protected $fillable = [
        'lease_id', 'paid_date', 'total', 'note'
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
