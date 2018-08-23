<?php

use Faker\Generator as Faker;

$factory->define(App\Property::class, function (Faker $faker) {
	$electrics = ['220 Watt', '550 Watt', '990 Watt'];
	$waters = ['Tidak Ada', 'PAM', 'Sumur', 'Artetis'];
    
    return [
        'name' => $faker->company,
        'address' => $faker->address,
        'land_area' => $faker->numberBetween(100, 1000),
        'building_area' => $faker->numberBetween(100, 1000),
        'block' => strtoupper($faker->randomLetter),
        'unit' => $faker->numberBetween(1, 100),
        'floor' => $faker->numberBetween(1, 20),
        'electricity' => $faker->randomElement($electrics),
        'water' => $faker->randomElement($waters),
        'telephone' => $faker->phoneNumber,
    ];
});
