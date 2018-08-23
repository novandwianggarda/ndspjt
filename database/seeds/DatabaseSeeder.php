<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // dont reorder if you dont understand whats going on.
        $this->call(TranslationsSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(CertificatesTableSeeder::class);
        $this->call(TaxesTableSeeder::class);
        $this->call(PropertiesTableSeeder::class);
        $this->call(LeasesTableSeeder::class);
    }
}
