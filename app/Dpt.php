<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Dpt extends Model implements Auditable
{

	use  \OwenIt\Auditing\Auditable;

	protected $table = 'dpts';
	protected $fillable = [
		'koordinator_id'


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

     /**
     * get property type
     *
     * @return App\PropertyType
     */
    public function kord()
    {
        return $this->belongsTo('App\Koordinator', 'Koordinator_id', 'id');
    }

    /**
     * STATIC
     */

    /**
     * property that available
     * to create a new lease
     *
     * @return Illuminate\Database\Eloquent\Builder
     */
    public static function availableForLease() {
        $notAvailable = array_column(Lease::leaseWithpropertyIds(), 'property_id');
        return Property::whereNotIn('properties.id', $notAvailable);
    }

}
