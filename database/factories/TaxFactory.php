<?php

use Faker\Generator as Faker;
use App\Certificate;
use App\TaxType;

$factory->define(\App\Tax::class, function (Faker $faker) {
    $taxTypeIds = TaxType::all()->pluck('id')->toArray();
    $certIds = Certificate::all()->pluck('id')->toArray();
    $owners = ['Leonard Hidajat', 'Sango Ina', 'DS-Estates'];
    $njopLand = $faker->numberBetween(1000000, 99999999);
    $njopBuilding = $faker->numberBetween(1000000, 99999999);
    $njopTotal = $njopLand + $njopBuilding;
    $paymentMethods = ['Cek', 'Transfer', 'Giro', 'POS', 'VA'];

    return [
        'tax_type_id' => $faker->randomElement($taxTypeIds),
        'certificate_ids' => $faker->unique()->randomElement($certIds),

        // TAX BASE
        'nop' => generateNop(),
        'owner' => $faker->randomElement($owners),
        'year' => '2017',
        'due_date' => randomDate('2017'),
        'nominal_ly' => $faker->numberBetween(10000, 9999999),
        'due_date_ly' => randomDate('2016'),
        'note' => $faker->realText,

        // ADDRESS
        'addr_address' => $faker->address,
        'addr_village' => $faker->street,
        'addr_land_area' => $faker->numberBetween(100, 99999),
        'addr_building_area' => $faker->numberBetween(0, 999),

        // NJOP
        'njop_land' => $njopLand,
        'njop_building' => $njopBuilding,
        'njop_total' => $njopTotal,

        // CORPORATION
        'corp_name' => $faker->company,
        'corp_payment_method' => $faker->randomElement($paymentMethods),

        // FOLDER FILLING
        'folder_number' => $faker->safeColorName,
        'folder_current' => $faker->safeColorName,
        'folder_plan' => $faker->safeColorName,
    ];
});

// function generateNop()
// {
//     $nop = '';
//     for($i=0; $i < 18; $i++) {
//         $min = ($i == 0) ? 1:0;
//         if ($i==2 || $i==4 || $i==7 || $i==10 || $i==13|| $i==17) {
//             $nop .= '.';
//         }
//         $nop .= mt_rand($min, 9);
//     }
//     return $nop;
// }

// function randomDate($year = '')
// {
//     $year = empty($year) ? date('Y') : $year;
//     $firstDayTimestamp = strtotime(date($year.'-01-01'));
//     $lastDayTimestamp = strtotime(date($year.'-12-31'));
//     $randomTimestamp = mt_rand($firstDayTimestamp, $lastDayTimestamp);
//     $randomDate = date('Y-m-d', $randomTimestamp);
//     return $randomDate;
// }
