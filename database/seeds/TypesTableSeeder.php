<?php

use Illuminate\Database\Seeder;
use App\CertificateType;
use App\TaxType;
use App\LeaseType;

class TypesTableSeeder extends Seeder
{
    /**
     * tables: certificate_types, tax_types, lease_types
     */
    public function run()
    {
        // certificates_types
        CertificateType::create([
            'short_name' => 'SHM',
            'long_name' => 'Sertifikat Hak Milik',
        ]);
        CertificateType::create([
            'short_name' => 'SHGB',
            'long_name' => 'Sertifikat Hak Guna Bangunan',
        ]);
        CertificateType::create([
            'short_name' => 'SHMSRS',
            'long_name' => 'Sertifikat Hak Milik atas Satuan Rumah Susun',
        ]);

        //tax_types
        TaxType::create([
            'short_name' => 'PBB',
            'long_name' => 'Pajak Bumi & Bangunan',
        ]);

        // lease_types
        $leaseTypes = [
            ['name' => 'Tanah'],
            ['name' => 'Gudang'],
            ['name' => 'Ruko'],
            ['name' => 'Kantor'],
            ['name' => 'Pabrik'],
            ['name' => 'Apartemen'],
            ['name' => 'Kos'],
            ['name' => 'Hotel'],
        ];
        LeaseType::insert($leaseTypes);
    }
}
