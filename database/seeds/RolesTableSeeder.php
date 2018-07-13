<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = Role::create([
            'name' => 'Super Administrator',
            'slug' => 'superadmin',
            'permissions' => [
                'user-manager' => true,
            ],
        ]);

        $administrator = Role::create([
            'name' => 'Administrator',
            'slug' => 'administrator',
            'permissions' => [
                'user-manager' => false,
            ],
        ]);
    }
}
