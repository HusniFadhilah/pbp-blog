<?php
function time_ago($timestamp)
{
    $time_ago = strtotime($timestamp);
    $current_time = time();
    $time_difference = $current_time - $time_ago;
    $seconds = $time_difference;
    $minutes      = round($seconds / 60);        // value 60 is seconds  
    $hours        = round($seconds / 3600);       //value 3600 is 60 minutes * 60 sec  
    $days         = round($seconds / 86400);      //86400 = 24 * 60 * 60;  
    $weeks        = round($seconds / 604800);     // 7*24*60*60;  
    $months       = round($seconds / 2629440);    //((365+365+365+365+366)/5/12)*24*60*60  
    $years        = round($seconds / 31553280);   //(365+365+365+365+366)/5 * 24 * 60 * 60  
    if ($seconds <= 60) {
        return "Just Now";
    } else if ($minutes <= 60) {
        if ($minutes == 1) {
            return "one minute ago";
        } else {
            return "$minutes minutes ago";
        }
    } else if ($hours <= 24) {
        if ($hours == 1) {
            return "an hour ago";
        } else {
            return "$hours hrs ago";
        }
    } else if ($days <= 7) {
        if ($days == 1) {
            return "yesterday";
        } else {
            return "$days days ago";
        }
    } else if ($weeks <= 4.3) {  //4.3 == 52/12
        if ($weeks == 1) {
            return "a week ago";
        } else {
            return "$weeks weeks ago";
        }
    } else if ($months <= 12) {
        if ($months == 1) {
            return "a month ago";
        } else {
            return "$months months ago";
        }
    } else {
        if ($years == 1) {
            return "one year ago";
        } else {
            return "$years years ago";
        }
    }
}

function bulan($date)
{
    $m = substr($date, 5, 2);
    switch ($m) {
        case 1:
            return "Januari";
        case 2:
            return "Februari";
        case 3:
            return "Maret";
        case 4:
            return "April";
        case 5:
            return "Mei";
        case 6:
            return "Juni";
        case 7:
            return "Juli";
        case 8:
            return "Agustus";
        case 9:
            return "September";
        case 10:
            return "Oktober";
        case 11:
            return "November";
        case 12:
            return "Desember";
    }
}

function month($date)
{
    $m = substr($date, 5, 2);
    switch ($m) {
        case 1:
            return "Jan";
        case 2:
            return "Feb";
        case 3:
            return "Mar";
        case 4:
            return "Apr";
        case 5:
            return "Mei";
        case 6:
            return "Jun";
        case 7:
            return "Jul";
        case 8:
            return "Aug";
        case 9:
            return "Sep";
        case 10:
            return "Oct";
        case 11:
            return "Nov";
        case 12:
            return "Des";
    }
}


function tgl_indo($date)
{
    $d = tanggal($date);
    $m = month($date);
    $y = tahun($date);
    return $d . " " . $m . " " . $y;
}

function indo_date($date)
{
    $d = tanggal($date);
    $m = bulan($date);
    $y = tahun($date);
    return $d . " " . $m . " " . $y;
}

function tgl_default($date)
{
    $d = tanggal($date);
    $m = bulan_angka($date);
    $y = tahun($date);
    return $d . "/" . $m . "/" . $y;
}

function pukul($date)
{
    $d = substr($date, 11, 5);
    return $d;
}

function tanggal($date)
{
    $d = substr($date, 8, 2);
    return $d;
}

function bulan_angka($date)
{
    $y = substr($date, 5, 2);
    return $y;
}

function tahun($date)
{
    $y = substr($date, 0, 4);
    return $y;
}
