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

            // LEASE BASE
            'lessor' => 'nullable',
            'lessor_pkp' => 'nullable',
            'tenant' => 'nullable',
            'purpose' => 'nullable',
            'start' => 'nullable|date',
            'end' => 'nullable|date',
            'note' => 'nullable',

            // LEASE DEED aka Akta Sewa
            'lease_deed' => 'nullable',
            'lease_deed_date' => 'nullable|date',

            // PAYMENT TERMS
            'payment_terms' => 'nullable',

            // PAYMENT HISTORY
            'payment_history' => 'nullable',

            // PAYMENT INVOICES
            'payment_invoices' => 'nullable',

            // PRICE

            // -- Offer Price
            'sell_monthly' => 'nullable',
            'sell_yearly' => 'nullable',

            // -- Lease Price
            'rent_m2_monthly' => 'nullable',
            'rent_m2_monthly_type' => 'nullable',
            'rent_price' => 'nullable',
            'rent_price_type' => 'nullable',
            'rent_assurance' => 'nullable',

            // BROKER
            'brok_name' => 'nullable',
            'brok_fee_yearly' => 'nullable',
            'brok_fee_paid' => 'nullable',

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
