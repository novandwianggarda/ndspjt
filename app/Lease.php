<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use App\Certificate;
use Carbon\Carbon;

class Lease extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'leases';
    protected $fillable = [
        'certificate_ids', 'lease_type_id', 'lease_payment_id',

        // LEASE BASE
        'lessor', 'lessor_pkp', 'tenant', 'purpose', 'start', 'end', 'note', 'lease_deed', 'lease_deed_date', 'payment_terms',

        // PRICES
        'sell_monthly', 'sell_yearly', 'rent_m2_monthly', 'rent_m2_monthly_type', 'rent_price', 'rent_price_type', 'rent_assurance',

        // PROPERTY
        'prop_name', 'prop_address', 'prop_land_area', 'prop_building_area', 'prop_block', 'prop_floor', 'prop_unit', 'prop_electricity', 'prop_water', 'prop_telephone',

        // BROKER
        'brok_name', 'brok_fee_yearly', 'brok_fee_paid',

        // GRACE
        'grace_start', 'grace_end'
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


    /** ELOQUENT RELATIONSHIP */

    /**
     * get lease type
     *
     * @return App\LeaseType
     */
    public function type()
    {
        return $this->belongsTo('App\LeaseType', 'lease_type_id', 'id');
    }

    /**
     * get lease payments history
     *
     * @return Illuminate\Database\Eloquent\Collection of App\LeasePayment
     */
    public function payments()
    {
        return $this->hasMany('App\LeasePayment', 'lease_id', 'id');
    }


    /** ATTRIBUTES */

    /**
     * get certificates
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
     * in years
     *
     * @return float
     */
    public function getDurationAttribute()
    {
        return diffTwoDates($this->start, $this->end, $this->rent_price_type);
    }

    /**
     * get grace period
     * in month
     *
     * @return float
     */
    public function getGracePeriodAttribute()
    {
        return diffTwoDates($this->grace_start, $this->grace_end, 'monthly');
    }


    /** STATIC */

    /**
     * get all lease with certificate id
     *
     * @return array
     */
    public static function leaseWithCertificateIds()
    {
        $leases = Lease::select('id', 'certificate_ids')->get()->toArray();
        $allIds = [];
        foreach ($leases as $lease) {
            $certificateIds = explode(',', $lease['certificate_ids']);
            foreach ($certificateIds as $certificateId) {
                array_push($allIds, ['lease_id' => $lease['id'], 'certificate_id' => $certificateId]);
            }
        }
        return $allIds;
    }
}
