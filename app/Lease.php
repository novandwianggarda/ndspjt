<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Lease extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'leases';
    protected $fillable = [
        'certificate_ids', 'property_ids',

        // LEASE BASE
        'lessor', 'lessor_pkp', 'tenant', 'tenant_type', 'purpose', 'start', 'end', 'note',

        // LEASE DEED aka Akta Sewa
        'lease_deed', 'lease_number', 'lease_deed_date', 'pic',

        // PAYMENT TERMS
        'payment_terms',

        // PAYMENT HISTORY
        'payment_history',

        // PAYMENT INVOICES
        'payment_invoices',

        // PRICES

        // -- Offer Price
        'sell_monthly', 'sell_yearly',

        // -- Lease Price
        'rent_m2_monthly', 'rent_m2_monthly_type', 'rent_price', 'rent_price_type', 'rent_assurance',

        // BROKER
        'brok_name', 'brok_fee_yearly', 'brok_fee_paid', 'due_date', 'balance',

        // GRACE
        'grace_start', 'grace_end',
    ];

    public $timestamp = true;

    protected $casts = [
        'payment_terms' => 'array',
        'payment_invoices' => 'array',
    ];

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

    /** ELOQUENT RELATIONSHIP */

    /**
     * get lease payments history.
     *
     * @return Illuminate\Database\Eloquent\Collection of App\LeasePayment
     */
    public function payments()
    {
        return $this->hasMany('App\LeasePayment', 'lease_id', 'id');
    }

    public function prop()
    {
        return $this->belongsTo('App\Property', 'property_ids', 'id');
    }

    public function cert()
    {
        return $this->belongsTo('App\Certificate', 'certificate_ids', 'id');
    }

    /** ATTRIBUTES */

    /**
     * get certificates.
     *
     * @return Illuminate\Database\Eloquent\Collection of App\Certificate
     */
    public function getCertificatesAttribute()
    {
        $certificateIds = explode(',', $this->certificate_ids);

        return Certificate::whereIn('id', $certificateIds)->get();
    }

    /**
     * get lease duration / masa sewa
     * in years.
     *
     * @return float
     */
    public function getDurationAttribute()
    {
        return diffTwoDates($this->start, $this->end, $this->rent_price_type);
    }

    /**
     * get grace period
     * in month.
     *
     * @return float
     */
    public function getGracePeriodAttribute()
    {
        return diffTwoDates($this->grace_start, $this->grace_end, 'monthly');
    }

    /** STATIC */

    /**
     * get all lease with certificate id.
     *
     * @return array
     */
    public static function leaseWithCertificateIds()
    {
        // $leases = Lease::select('id', 'certificate_ids')->get()->toArray();
        // $allIds = [];
        // foreach ($leases as $lease) {
        //     $certificateIds = explode(',', $lease['certificate_ids']);
        //     foreach ($certificateIds as $certificateId) {
        //         array_push($allIds, ['lease_id' => $lease['id'], 'certificate_id' => $certificateId]);
        //     }
        // }
        $allIds = Lease::plucK('id')->toArray();

        return $allIds;
    }

    /**
     * get all lease with property id.
     *
     * @return array
     */
    public static function leaseWithpropertyIds()
    {
        $leases = Lease::select('id', 'property_ids')->get()->toArray();
        $allIds = [];
        foreach ($leases as $lease) {
            $propertyIds = explode(',', $lease['property_ids']);
            foreach ($propertyIds as $propertyId) {
                array_push($allIds, ['lease_id' => $lease['id'], 'property_id' => $propertyId]);
            }
        }

        return $allIds;
    }

    public static function dueForToday()
    {
        $leaseDue = [];

        $leases = static::all();
        foreach ($leases as $lease) {
            foreach ($lease->payment_terms as $index => $paymentTerm) {
                if (empty($paymentTerm['due_date'])) {
                    continue;
                }

                $dueDate = \Carbon\Carbon::parse($paymentTerm['due_date']);
                if ($dueDate->gte(today())) {
                    $leaseDue[] = [
                        'lease_id' => $lease->id,
                        'tenant' => $lease->tenant,
                        'total' => $paymentTerm['total'],
                        'due_date' => $dueDate,
                        'timestamp' => $dueDate->timestamp,
                    ];
                }
            }
        }

        return collect($leaseDue)->sortBy('timestamp')->take(3);
    }

    /**
     * Undocumented function.
     *
     * @param array $paymentTerm
     */
    public function addPaymentTerm($paymentTerm)
    {
        $paymentTerms = (array) $this->payment_terms;
        $paymentTerms[] = $paymentTerm;

        return $this->update(['payment_terms' => $paymentTerms]);
    }
}
