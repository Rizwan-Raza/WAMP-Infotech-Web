<?php
function daysUntilToday($date)
{
    // echo date_timestamp_get($date)."<br />";
    // echo date_timestamp_get(date_create())."<br />";
    $diff = date_timestamp_get(date_create()) - date_timestamp_get($date);
    // return  $diff;
    if ($diff < (2.628e+9/1000)) {
        if ($diff < (8.64e+7/1000)) {
            if ($diff < (3.6e+6/1000)) {
                if ($diff < (60000/1000)) {
                    return $diff." seconds ago";
                } else {
                    return floor($diff/60) . " minute".(($diff > 120) ? "s" : "") ." ago";
                }
            } else {
                return floor($diff/(3.6e+6/1000)) ." hour" .(($diff > (7.2e+6/1000)) ? "s" : "")." ago";
            }
        } else {
            return floor($diff/(8.64e+7/1000)) ." day" .(($diff > (1.728e+8/1000)) ? "s" : "")." ago";
        }
    } else {
        return floor($diff/(2.628e+9/1000) / 30) ." month" .(($diff > (5.256e+9/1000)) ? "s" : "")." ago";
    }
}
