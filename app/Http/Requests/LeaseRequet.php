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
            'certificate_ids' => 'nullable',
            'property_ids' => 'nullable',
            // -- Offer Price
            'sell_monthly' => 'nullable',
            'sell_yearly' => 'nullable',
            'balance' => 'nullable',
            'due_date' => 'nullable|date',

            // LEASE BASE
            'lessor' => 'nullable',
            'lessor_pkp' => 'nullable',
            //tenant
            'tenant' => 'nullable',
            'tenant_type' => 'nullable',

            'purpose' => 'nullable',
            'pic' => 'nullable',
            // LEASE DEED aka Akta Sewa
            'lease_deed' => 'nullable', 
            'lease_number' => 'nullable',
            'lease_deed_date' => 'nullable|date',
            // GRACE
            'grace_start' => 'nullable|date',
            'grace_end' => 'nullable|date',
            
            'start' => 'nullable|date',
            'end' => 'nullable|date',
            'note' => 'nullable',

            // PAYMENT INVOICES
            'rent_m2_monthly' => 'nullable',
            'rent_m2_monthly_type' => 'nullable',
            'rent_price' => 'nullable',
            // PAYMENT TERMS
            'payment_invoices' => 'nullable',
            'payment_terms' => 'nullable',
            'payment_history' => 'nullable',

            'rent_price_type' => 'nullable',
            'rent_assurance' => 'nullable',

            // BROKER
            'brok_name' => 'nullable',
            'brok_fee_yearly' => 'nullable',
            'brok_fee_paid' => 'nullable',


        ];
    }

    public function messages()
    {
        return [
            'certificate_ids.required' => 'The certificate(s) field is required.'
        ];
    }
}
