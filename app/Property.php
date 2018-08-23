<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
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
