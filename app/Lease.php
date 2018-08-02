<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Certificate;
use Carbon\Carbon;

class Lease extends Model
{
    protected $table = 'leases';
    protected $fillable = [
        'certificate_ids', 'lease_type_id', 'lease_payment_id',

        // LEASE BASE
        'tenant', 'purpose', 'duration', 'start', 'end', 'note', 'lease_deed', 'lease_deed_date',

        // PROPERTY
        'prop_name', 'prop_address', 'prop_land_area', 'prop_building_area', 'prop_block', 'prop_unit', 'prop_electricity', 'prop_water', 'prop_telephone',

        // BROKER
        'brok_name', 'brok_fee_yearly', 'brok_fee_total', 'brok_fee_paid',

        // GRACE
        'folder_number', 'folder_current', 'folder_plan'
    ];

    public $timestamp = true;


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
     * get lease payments
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
        $start = Carbon::parse($this->start);
        $end = Carbon::parse($this->end);
        return sprintf('%.2f', $end->diffInDays($start) / 365); // round 365days
    }

    /**
     * get grace period
     * in month
     *
     * @return float
     */
    public function getGracePeriodAttribute()
    {
        $start = Carbon::parse($this->grace_start);
        $end = Carbon::parse($this->grace_end);
        return sprintf('%.2f', $end->diffInDays($start) / 30); // round 30days
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
