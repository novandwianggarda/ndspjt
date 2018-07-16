<?php

use Illuminate\Database\Seeder;

class LeasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Lease::class, 30)->create();
    }
}
