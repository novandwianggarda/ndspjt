<?php

use Faker\Generator as Faker;
use App\Certificate;
use App\Property;

$factory->define(\App\Lease::class, function (Faker $faker) {

    $certificateIds = Certificate::all()->pluck('id')->toArray();
    $randomCertificateId = $faker->unique()->randomElement($certificateIds);
    $propertyIds = Property::all()->pluck('id')->toArray();
    // $randomPropertyId = $faker->unique()->randomElement($propertyIds); // dont know but not works.
    $randomPropertyId = $randomCertificateId;

    $lessor = ['Leonard Hidajat', 'Sango Ina', 'DS-Estates'];
    $length = $faker->randomFloat(1, 1, 5);

    $brokYearly = $faker->numberBetween(1000000, 99999999);
    $sellMonthly = $faker->numberBetween(100000, 9999999);
    $rentM2Montly = $faker->numberBetween(2000, 20000);
    $rentM2MontlyType = $faker->randomElement(['land', 'building']);
    $certArea = Certificate::find($randomCertificateId)->area;
    $landArea = Property::find($randomPropertyId)->land_area;
    $buildingArea = Property::find($randomPropertyId)->building_area;
    $rentPrice = $rentM2Montly * 12 * $certArea;
    $rentPrice = $rentM2Montly * 12 * ($rentM2MontlyType == 'land' ? $landArea : $buildingArea);

    return [
        'certificate_ids' => $randomCertificateId,
        'property_ids' => $randomPropertyId,

        // LEASE BASE
        'lessor' => $faker->randomElement($lessor),
        'lessor_pkp' => $faker->boolean,
        'tenant' => $faker->name,
        'purpose' => $faker->sentence,
        'start' => randomDate('2017'),
        'end' => randomDate(2017+round($length)),
        'note' => $faker->realText,

        // LEASE DEED aka Akta Sewa
        'lease_deed' => $faker->numberBetween(1111111111, mt_getrandmax()),
        'lease_deed_date' => randomDate('2017'),

        // PAYMENT TERMS
        'payment_terms' => '{[]}',

        // PAYMENT HISTORY
        'payment_history' => '{[]}',

        // PAYMENT INVOICES
        'payment_invoices' => '{[]}',

        // PRICES

        // -- Offer Price
        'sell_monthly' => $sellMonthly,
        'sell_yearly' => $sellMonthly * 12,

        // -- Lease Price
        'rent_m2_monthly' => $rentM2Montly,
        'rent_price' => $rentPrice,
        'rent_assurance' => $faker->numberBetween(2000000, 50000000),

        // BROKER
        'brok_name' => $faker->name,
        'brok_fee_yearly' => $brokYearly,
        'brok_fee_paid' => $faker->numberBetween($brokYearly, $length * $brokYearly),

        // GRACE
        'grace_start' => randomDate('2017'),
        'grace_end' => randomDate('2018'),
    ];

});
