<?php

setlocale(LC_TIME, 'fr_FR');
date_default_timezone_set('Europe/Paris');

$dayNumber = date('d');
$dayName = date('D');
$dayFullname = date('l');

$monthNumber = date('m');
$monthName = date('M');
$monthFullname = date('F');
$montDayCount = date('t');

$year = date('Y');
$tinyYear = date('y');

$currentDate = date('d/m/Y'); // Date

$hour = date('h');
$hourNormal = date('H');

$minute = date('i');

$secondes = date('s');

$currentHour = date('H:i:s'); // Time

$currentDatetime = date('d/m/Y H:i:s'); // DateTime

echo $currentDatetime;