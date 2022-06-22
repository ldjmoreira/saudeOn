<?php
 //setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');

 $monthss[1] = "janeiro";
$monthss[2] = "fevereiro";
$monthss[3] = "março";
$monthss[4] = "abril";
$monthss[5] = "maio";
$monthss[6] = "junho";
$monthss[7] = "julho";
$monthss[8] = "agosto";
$monthss[9] = "setembro";
$monthss[10] = "outubro";
$monthss[11] = "novembro";
$monthss[12] = "dezembro";

// giorni
$weekdayss[0] = "domingo";
$weekdayss[1] = "segunda";
$weekdayss[2] = "terça";
$weekdayss[3] = "quarta";
$weekdayss[4] = "quinta";
$weekdayss[5] = "sexta";
$weekdayss[6] = "sábado";

function strftimeBRA($format, $timestamp){

    global $weekdayss, $monthss;

    preg_match_all('/%([a-zA-Z])/', $format, $results);

    $originals = $results[0];
    $factors = $results[1];


    foreach($factors as $key=>$factor){
        switch($factor){
            case 'a':
                /*** Abbreviated textual representation of the day ***/
                $n = date('w', $timestamp); // number of the weekday (0 for sunday, 6 for saturday);
                $replace = ucfirst($weekdayss[$n]); 
                $replace = substr($replace, 0, 3);
                break;
            case 'A':
                /*** Full textual representation of the day ***/
                $n = date('w', $timestamp); // number of the weekday (0 for sunday, 6 for saturday);
                $replace = ucfirst($weekdayss[$n]);
                break;
            case 'h':
            case 'b':
                /*** Abbreviated month name ***/
                $n = date('n', $timestamp); // Numeric representation of a month, without leading zeros
                $replace = ucfirst($monthss[$n]);
                $replace = substr($replace, 0, 3);
                break;
            case 'B':
                /*** Full month name ***/
                $n = date('n', $timestamp); // Numeric representation of a month, without leading zeros
                $replace = ucfirst($monthss[$n]);
                break;
            default:
                /*** Use standard strftime function ***/
                $replace = strftime("%".$factor, $timestamp);
                break;
        }
        $search = $originals[$key];
        $format = str_replace($search, $replace, $format);
    }
    return $format;
}
//-------------------------------------------------------
function getDateAsDateTime($date) {
    return is_string($date) ? new DateTime($date) : $date;
}
function isWeekend($date) {
    $inputDate = getDateAsDateTime($date);
    return $inputDate->format('N') >= 6;
}
function isBefore($date1, $date2) {
    $inputDate1 = getDateAsDateTime($date1);
    $inputDate2 = getDateAsDateTime($date2);
    return $inputDate1 <= $inputDate2;
}
function getNextDay($date) {
    $inputDate = getDateAsDateTime($date);
    $inputDate->modify('+1 day');
    return $inputDate;
}
function sumIntervals($interval1,$interval2){
    $date = new DateTime('00:00:00');
    $date->add($interval1);
    $date->add($interval2);

    return (new DateTime('00:00:00'))->diff($date);
}

function subtractIntervals($interval1,$interval2){
    $date = new DateTime('00:00:00');
    $date->add($interval1);
    $date->sub($interval2);

    return (new DateTime('00:00:00'))->diff($date);
}

function getDateFromInterval($interval){
    return new DateTimeImmutable($interval->format('%H:%i:%s'));
}
function getDateFromString($str){
    return DateTimeImmutable::createFromFormat('H:i:s', $str);
}

function getFirstDayOfMonth($date){
    $time = getDateAsDateTime($date)->getTimestamp();
    return new DateTime(date('Y-m-1',$time));
}
function getLastDayOfMonth($date){
    $time = getDateAsDateTime($date)->getTimestamp();
    return new DateTime(date('Y-m-t',$time));
}
function getSecondsFromDateInterval($interval){
    $d1 = new DateTimeImmutable();
    $d2 = $d1->add($interval);
    return $d2->getTimestamp() - $d1->getTimestamp();
}
function isPastWorkday($date) {//retornará verdadeiro ou falso
    return !isWeekend($date) && isBefore($date, new DateTime());
}
function getTimeStringFromSeconds($seconds){
    $h = intdiv($seconds,3600);
    $m = intdiv($seconds % 3600,60);
    $s = $seconds - ($h*3600) - ($m*60);
    return sprintf('%02d:%02d:%02d', $h, $m, $s);
}
function formatDateWithLocale($date, $pattern){
    $time = getDateAsDateTime($date)->getTimesTamp();
    return strftimeBRA($pattern, $time);
}
