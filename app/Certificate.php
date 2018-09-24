<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Certificate extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'certificates';
    protected $fillable = [
        'certificate_type_id', 'folder_sert', 'no_folder',
        'kepemilikan', 'nama_sertifikat', 'keterangan', 'archive', 'no_hm_hgb', 'kelurahan', 'kecamatan',
        'kota', 'published_date', 'expired_date', 'ajb_nominal', 'ajb_date', 'map_coordinate', 'addrees'
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
    public function type()
    {
        return $this->belongsTo('App\CertificateType', 'certificate_type_id', 'id');
    }

    public function cerdoc()
    {
        return $this->hasMany('App\CertificateDoc', 'certificate_id', 'id');
    }
     public function certif()
    {
        return $this->hasMany('App\Tax', 'certificate_id');
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
