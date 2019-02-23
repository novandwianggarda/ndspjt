<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Posko extends Model implements Auditable
{

	use  \OwenIt\Auditing\Auditable;

	protected $table = 'poskos';
	protected $fillable = [
		'name', 'lokasi',
		'penjwb', 'jmlh_dpt'


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
    public function type()
    {
        return $this->belongsTo('App\PropertyType', 'property_type_id', 'id');
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
