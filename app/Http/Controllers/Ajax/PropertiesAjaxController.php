<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Ajax\AjaxController;
use Illuminate\Http\Request;
use App\PropertyType;
use App\Property;

class PropertiesAjaxController extends AjaxController
{

    /**
     * get all properties
     * that available for new lease
     *
     * @return json
     */
    public function availableProperties(Request $request)
    {
        $builder = Property::availableForLease();
        $property = $builder
                    ->join('property_types', 'properties.property_type_id', '=', 'property_types.id')
                    ->selectRaw('properties.id as id, properties.name as name, property_types.name as type')->get();
        return response()->json($property);
    }

    /**
     * get result propertie
     *
     * @return json
     */
    public function result(Request $request)
    {
        $ids = $request->get('ids'); // ex: 1,2,3
        if (empty($ids)) return '';

        $properties = Property::whereIn('id', explode(',', $ids))->get();
        $result = (object)[];
        foreach ($properties as $property) {
            @$result->type .='|| ' . $property->type->name. ' ';
            @$result->name .='|| '. $property->name. ' ';
            @$result->address .='|| '. $property->address. ' ';
            @$result->land_area .= '|| '. $property->land_area. ' ';
            @$result->building_area .= '|| '. $property->building_area. ' ';
            @$result->block .= '|| '. $property->block. ' ';
            @$result->floor .= '|| '. $property->floor. ' ';
            @$result->unit .= '|| '. $property->unit. ' ';
            @$result->electricity .= '|| '. $property->electricity. ' ';
            @$result->water .= '|| '. $property->water. ' ';
            @$result->telephone .= '|| '. $property->telephone. ' ';
        }
        return response()->json($result);
    }

    /**
     * get all property types
     *
     * @return JSON
     */
    public function propertyTypes()
    {
        $propertyTypes = PropertyType::select('id', 'name')->get();
        return response()->json($propertyTypes);
    }

}
