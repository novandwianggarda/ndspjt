<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $leon = User::create([
            'name' => 'Leonard Hidajat',
            'username' => 'leon',
            'password' => bcrypt('123qwe'),
        ]);
        $leon->roles()->attach(1);

        $via = User::create([
            'name' => 'Via',
            'username' => 'via',
            'password' => bcrypt('123qwe'),
        ]);
        $via->roles()->attach(2);

        $tata = User::create([
            'name' => 'Dyah Permatasari',
            'username' => 'tata',
            'password' => bcrypt('123qwe'),
        ]);
        $tata->roles()->attach(2);

        
    }
}
