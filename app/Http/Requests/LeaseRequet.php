<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeaseRequet extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'certificate_ids' => 'required|unique:leases',
            'lease_type_id' => 'nullable|numeric',
            'lease_payment_id' => 'nullable|numeric',

            // LEASE BASE
            'lessor' => 'nullable',
            'tenant' => 'nullable',
            'purpose' => 'nullable',
            'start' => 'nullable|date',
            'end' => 'nullable|date',
            'note' => 'nullable',

            // PRICE
            'sell_monthly' => 'nullable|numeric',
            'sell_yearly' => 'nullable|numeric',
            'rent_assurance' => 'nullable|numeric',

            // PROPERTY
            'prop_name' => 'nullable',
            'prop_address' => 'nullable',
            'prop_land_area' => 'nullable|numeric',
            'prop_building_area' => 'nullable|numeric',
            'prop_block' => 'nullable',
            'prop_floor' => 'nullable|numeric',
            'prop_unit' => 'nullable',
            'prop_electricity' => 'nullable',
            'prop_water' => 'nullable',
            'prop_telephone' => 'nullable',

            // BROKER
            'brok_name' => 'nullable',
            'brok_fee_yearly' => 'nullable|numeric',
            'brok_fee_paid' => 'nullable|numeric',

            // GRACE
            'grace_start' => 'nullable|date',
            'grace_end' => 'nullable|date',

        ];
    }

    public function messages()
    {
        return [
            'certificate_ids.required' => 'The certificate(s) field is required.'
        ];
    }
}
