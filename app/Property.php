<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Property extends Model implements Auditable
{

	use  \OwenIt\Auditing\Auditable;

	protected $table = 'properties';
	protected $fillable = [
		'property_type_id', 
		'name', 'address',
		'land_area', 'building_area', 'block', 'floor', 'unit', 'electricity', 'water', 'telephone'


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
}
