<?php

use Faker\Generator as Faker;
use App\Certificate;
use App\LeaseType;

$factory->define(\App\Lease::class, function (Faker $faker) {
    $certIds = Certificate::all()->pluck('id')->toArray();
    $properIds = LeaseType::all()->pluck('id')->toArray();
    $length = $faker->randomFloat(1, 1, 5);
    $electrics = ['220 Watt', '550 Watt', '990 Watt'];
    $waters = ['Tidak Ada', 'PAM', 'Sumur', 'Artetis'];
    $brokYearly = $faker->numberBetween(1000000, 99999999);
    $sellMonthly = $faker->numberBetween(100000, 9999999);

    return [
        'cert_ids' => $faker->unique()->randomElement($certIds),
        'lease_type_id' => $faker->randomElement($properIds),
        'lease_payment_id' => 1,

        // LEASE
        'tenant' => $faker->name,
        'purpose' => $faker->sentence,
        'length' => $length,
        'start' => randomDate('2017'),
        'end' => randomDate(2017+round($length)),
        'note' => $faker->realText,

        // PROPERTY
        'prop_name' => $faker->company,
        'prop_address' => $faker->address,
        'prop_land_area' => $faker->numberBetween(100, 9999),
        'prop_building_area' => $faker->numberBetween(10, 999),
        'prop_block' => strtoupper($faker->randomLetter),
        'prop_unit' => $faker->numberBetween(1, 100),
        'prop_electricity' => $faker->randomElement($electrics),
        'prop_water' => $faker->randomElement($waters),
        'prop_telephone' => $faker->phoneNumber,

        // BROKER
        'brok_name' => $faker->name,
        'brok_fee_yearly' => $brokYearly,
        'brok_fee_total' => $length * $brokYearly,
        'brok_fee_paid' => $faker->numberBetween($brokYearly, $length * $brokYearly),

        // GRACE
        'grace_period' => $faker->numberBetween(1, 12),
        'grace_start' => randomDate('2017'),
        'grace_end' => randomDate('2017'),

        // PRICES
        'sell_monthly' => $sellMonthly,
        'sell_yearly' => $sellMonthly * 12,
        'rent_assurance' => $faker->numberBetween(2000000, 50000000),
    ];
});
