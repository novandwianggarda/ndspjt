<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CertificateType extends Model
{
    //

    /** ATTRIBUTES */

    /**
     * get ceriticate type full name
     * ex: SHM - Sertifikat Hak Milik
     */
    public function getFullNameAttribute()
    {
        return $this->short_name . ' - ' . $this->long_name;
    }
}
