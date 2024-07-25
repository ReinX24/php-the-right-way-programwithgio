<?php

require_once "../vendor/autoload.php";

// DatePeriod
$period = new DatePeriod(
    new DateTime("05/01/2021"),
    new DateInterval("P3D"),
    3,
    // (new DateTime("05/31/2021"))->modify("+1 day"),
    DatePeriod::EXCLUDE_START_DATE
);

foreach ($period as $date) {
    echo $date->format("m/d/Y") . PHP_EOL;
}

// Add and subtract dates
// $from = new DateTimeImmutable();
// $to = $from->add(new DateInterval("P1M"));

// $to = $to->add(new DateInterval("P1Y"));

// echo $from->format("m/d/Y") . " - " . $to->format("m/d/Y") . PHP_EOL;

// $dateTime = new DateTime("05/25/2021 9:15AM");
// $interval = new DateInterval("P3M2D");

// $interval->invert = 1; // subtracts from dateTime instead of adding

// $dateTime->add($interval);

// echo $dateTime->format("m/d/Y g:iA") . PHP_EOL;

// $dateTime->sub($interval);

// echo $dateTime->format("m/d/Y g:iA") . PHP_EOL;

// Comparing dates
// $datetime1 = new DateTime("05/25/2021 9:15AM");
// $datetime2 = new DateTime("03/15/2021 3:25AM");
// $interval = new DateInterval("P3M2D");

// var_dump($interval);

// echo $datetime1->diff($datetime2)->format("%R%a") . PHP_EOL;
// echo $datetime2->diff($datetime1)->format("%Y years, %m months, %d days, %H, %i, %s") . PHP_EOL;
// var_dump($datetime1 < $datetime2);
// var_dump($datetime1 > $datetime2);
// var_dump($datetime1 == $datetime2);
// var_dump($datetime1 <=> $datetime2);

// $datetime = new DateTime("5/12/2021 3:30PM", new DateTimeZone("Asia/Manila"));

// day/month/year - europe
// month/day/year - U.S.

// $date = "15/05/2021"; // european format

// To make european format to U.S. format, replace slashes with dashes, this 
// will convert the date properly
// $datetime = new DateTime(str_replace("/", "-", $date));

// Another way of formatting date, sets expected format and converts automatically
// $datetime = DateTime::createFromFormat("d/m/Y", $date)->setTime(0, 0);

// var_dump($datetime, new DateTime("15-05-2021"));

// echo $datetime->getTimezone()->getName() . " - " . $datetime->format("m/d/Y g:i A") . PHP_EOL;

// $datetime->setDate(2024, 7, 25)->setTime(10, 15);
// $datetime->setTimezone(new DateTimeZone("Asia/Manila"));

// echo $datetime->getTimezone()->getName() . " - " . $datetime->format("m/d/Y g:i A") . PHP_EOL;
