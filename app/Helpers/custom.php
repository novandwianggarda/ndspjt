<?php

/**
 * custom Landlord helpers
 * register global function here
 */

 /**
  * test function to say hello
  */
if (! function_exists('sayHello')) {
    function sayHello()
    {
        return 'Hello';
    }
}

/**
 * parse date using carbon
 * with default format Y-m-d
 *
 * @param $string string date
 * @param $format format date
 *
 * @return string
 */

if (! function_exists('parseDate')) {
    function parseDate($string, $format = 'Y-m-d')
    {
        return \Carbon\Carbon::parse($string)->format($format);
    }
}

/**
 * calculate different between two day
 *
 * @param $start start date
 * @param $end end date
 * @param $period period of difference, monthly or yearly
 *
 * @return integer
 */
if (! function_exists('diffTwoDates')) {
    function diffTwoDates($start, $end, $period = 'monthly')
    {
        $startDate = \Carbon\Carbon::parse($start);
        $endDate = \Carbon\Carbon::parse($end);

        $startDay = $startDate->format('d');
        $endDay = $endDate->format('d');

        $startMonth = $startDate->format('m');
        if ($startDate->format('Y') !== $endDate->format('Y')) {
            $endMonth = $endDate->format('m') + (($endDate->format('Y') - $startDate->format('Y')) * 12);
        } else {
            $endMonth = $endDate->format('m');
        }

        $totalMonthDays = 0; $totalDays = 0;
        $totalMonths = $endMonth - $startMonth + 1;
        $difference = 0;

        for ($i = $startMonth; $i <= $endMonth; $i++){
            if ($i == $startMonth) {
                $usedDays = \Carbon\Carbon::parse($startDate)->endOfMonth()->format('d') - $startDay + 1;
                $totalDays = \Carbon\Carbon::parse($startDate)->endOfMonth()->format('d');
                $difference += ($usedDays/$totalDays);
            } else if ($i == $endMonth) {
                $usedDays = $endDay;
                $totalDays = \Carbon\Carbon::parse($startDate)->endOfMonth()->format('d');
                $difference += ($usedDays/$totalDays);
            } else {
                $difference += 1;
            }
            $startDate->addMonth();
        }

        if ($period == 'yearly') {
            return $difference / 12;
        }
        return $difference;
    }
}
