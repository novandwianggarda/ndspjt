<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class CertificateDoc extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'certificate_docs';
    protected $fillable = [
        'nama_file',
        'title',

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


    /** ELOQUENT RELATION */

    /**
     * get certificate type
     *
     * @return App\CertificateType
     */
    public function cerdoc()
    {
        return $this->belongsTo('App\Certificate', 'id');
    }


    /** ATTRIBUTES */

    /**
     * get certificate_type
     * short name from type
     * ex: Rumah, Apartemen, dll
     */
    public function getCertificateTypeAttribute()
    {
        return $this->type->short_name;
    }

    /**
     * get lease
     */
    public function getLeaseAttribute()
    {
        $leaseIds = Lease::leaseIds();
        $inArrayNumber = array_search($this->id, array_column($leaseIds, 'certificate_id'));
        $leaseId = $leaseIds[$inArrayNumber]['lease_id'];
        return Lease::find($leaseId);
    }


    /** STATIC */

    /**
     * certificates that available
     * to create a new lease
     *
     * @return Illuminate\Database\Eloquent\Builder
     */
    public static function availableForLease() {
        $notAvailable = array_column(Lease::leaseWithCertificateIds(), 'certificate_id');
        return Certificate::whereNotIn('id', $notAvailable);
    }

    /**
     * certificates that available
     * to create a new tax
     *
     * @return Illuminate\Database\Eloquent\Builder
     */
    public static function availableForTax() {
        $notAvailable = array_column(Tax::taxWithCertificateIds(), 'certificate_id');
        return Certificate::whereNotIn('id', $notAvailable);
    }

}
