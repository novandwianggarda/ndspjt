<?php

use Faker\Generator as Faker;
use App\Certificate;
use App\LeaseType;

$factory->define(\App\Lease::class, function (Faker $faker) {
    $certificateIds = Certificate::all()->pluck('id')->toArray();
    $leaseTypeIds = LeaseType::all()->pluck('id')->toArray();
    $lessor = ['Leonard Hidajat', 'Sango Ina', 'DS-Estates'];
    $length = $faker->randomFloat(1, 1, 5);
    $electrics = ['220 Watt', '550 Watt', '990 Watt'];
    $waters = ['Tidak Ada', 'PAM', 'Sumur', 'Artetis'];
    $brokYearly = $faker->numberBetween(1000000, 99999999);
    $sellMonthly = $faker->numberBetween(100000, 9999999);
    $rentM2Montly = $faker->numberBetween(2000, 20000);
    $rentM2MontlyType = $faker->randomElement(['land', 'building']);
    $randCertId = $faker->unique()->randomElement($certificateIds);
    $certArea = Certificate::find($randCertId)->area;
    $landArea = $faker->numberBetween(100, 9999);
    $rentPrice = $rentM2Montly * 12 * $certArea;
    $buildingArea = $faker->numberBetween(10, 999);
    $rentPrice = $rentM2Montly * 12 * ($rentM2MontlyType == 'land' ? $landArea : $buildingArea);

    return [
        'certificate_ids' => $randCertId,
        'lease_type_id' => $faker->randomElement($leaseTypeIds),
        'lease_payment_id' => 1,

        // LEASE
        'lessor' => $faker->randomElement($lessor),
        'lessor_pkp' => $faker->boolean,
        'tenant' => $faker->name,
        'purpose' => $faker->sentence,
        'start' => randomDate('2017'),
        'end' => randomDate(2017+round($length)),
        'note' => $faker->realText,
        'lease_deed' => $faker->numberBetween(1111111111, 9999999999),
        'lease_deed_date' => randomDate('2017'),

        // PRICES
        'sell_monthly' => $sellMonthly,
        'sell_yearly' => $sellMonthly * 12,
        'rent_m2_monthly' => $rentM2Montly,
        'rent_price' => $rentPrice,
        'rent_assurance' => $faker->numberBetween(2000000, 50000000),

        // PROPERTY
        'prop_name' => $faker->company,
        'prop_address' => $faker->address,
        'prop_land_area' => $landArea,
        'prop_building_area' => $buildingArea,
        'prop_block' => strtoupper($faker->randomLetter),
        'prop_unit' => $faker->numberBetween(1, 100),
        'prop_floor' => $faker->numberBetween(1, 20),
        'prop_electricity' => $faker->randomElement($electrics),
        'prop_water' => $faker->randomElement($waters),
        'prop_telephone' => $faker->phoneNumber,

        // BROKER
        'brok_name' => $faker->name,
        'brok_fee_yearly' => $brokYearly,
        'brok_fee_paid' => $faker->numberBetween($brokYearly, $length * $brokYearly),

        // GRACE
        'grace_start' => randomDate('2017'),
        'grace_end' => randomDate('2018'),
    ];
});
