<?php

use Faker\Generator as Faker;
use App\CertificateType;

$factory->define(\App\Certificate::class, function (Faker $faker) {
    $certTypeIds = CertificateType::all()->pluck('id')->toArray();
    $lat = $faker->latitude($min=-6.901907, $max=-7.746393);
    $lng = $faker->longitude($min=108.611961, $max=111.325584);
    $bnd = generateBoundary($lat, $lng);

    return [
        'certificate_type_id' => $faker->randomElement($array=$certTypeIds),

        // CERTIFICATE BASE
        'number' => $faker->unique()->numberBetween(100, 9999),
        'name' => $faker->company,
        'nop' => generateNop(),
        'owner' => $faker->name,
        'area' => $faker->numberBetween(100, 1000),
        'published_date' => randomDate('2017'),
        'expired_date' => randomDate('2017'),
        'note' => $faker->realText,

        // ADDRESS
        'addr_city' => $faker->city,
        'addr_district' => $faker->street,
        'addr_village' => $faker->street,
        'addr_address' => $faker->streetAddress,

        // AJB
        'ajb_nominal' => $faker->numberBetween(1000000, 100000000),
        'ajb_date' => $faker->date,

        // SCAN FILES
        'scan_cert' => '/path/foo/bar',
        'scan_plotting' => '/path/foo/bar',
        'scan_land_siteplan' => '/path/foo/bar',
        'scan_krk' => '/path/foo/bar',
        'scan_imb' => '/path/foo/bar',

        // MAPS
        'map_coordinate' => parseLocation($lat, $lng),
        'map_boundary' => $bnd,
        'map_link' => $faker->url,

        // FOLDER FILLING
        'folder_number' => $faker->safeColorName,
        'folder_current' => $faker->safeColorName,
        'folder_plan' => $faker->safeColorName,
    ];
});

function generateNop()
{
    $nop = '';
    for($i=0; $i < 18; $i++) {
        $min = ($i == 0) ? 1:0;
        if ($i==2 || $i==4 || $i==7 || $i==10 || $i==13|| $i==17) {
            $nop .= '.';
        }
        $nop .= mt_rand($min, 9);
    }
    return $nop;
}

function parseLocation($lat, $lng)
{
    return json_encode([
        'lat' => $lat,
        'lng' => $lng
    ]);
}

function generateBoundary($lat, $lng)
{
    // 0.000xxx
    $faker = \Faker\Factory::create();
    $coordinates = [];

    $points = 4;
    // 1 - atas
    $rnd = $faker->randomFloat($nbMaxDecimals = 6, $min = 0.000100, $max = 0.000900);
    $clat = $lat;
    $clng = $lng + $rnd;
    array_push($coordinates, ['lat' => $clat, 'lng' => $clng]);
    // 1 - kanan
    $rnd = $faker->randomFloat($nbMaxDecimals = 6, $min = 0.000100, $max = 0.000900);
    $clat = $lat + $rnd;
    $clng = $lng;
    array_push($coordinates, ['lat' => $clat, 'lng' => $clng]);
    // 1 - bawah
    $rnd = $faker->randomFloat($nbMaxDecimals = 6, $min = 0.000100, $max = 0.000900);
    $clat = $lat;
    $clng = $lng - $rnd;
    array_push($coordinates, ['lat' => $clat, 'lng' => $clng]);
    // 1 - kiri
    $rnd = $faker->randomFloat($nbMaxDecimals = 6, $min = 0.000100, $max = 0.000900);
    $clat = $lat - $rnd;
    $clng = $lng;
    array_push($coordinates, ['lat' => $clat, 'lng' => $clng]);
    // jsonify
    return json_encode($coordinates);
}

function randomDate($year = '')
{
    $year = empty($year) ? date('Y') : $year;
    $firstDayTimestamp = strtotime(date($year.'-01-01'));
    $lastDayTimestamp = strtotime(date($year.'-12-31'));
    $randomTimestamp = mt_rand($firstDayTimestamp, $lastDayTimestamp);
    $randomDate = date('Y-m-d', $randomTimestamp);
    return $randomDate;
}