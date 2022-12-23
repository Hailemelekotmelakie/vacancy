<?php

namespace App\Http\Controllers;

use App\Models\vacantlisttable;
use Illuminate\Http\Request;

class functions extends Controller
{
    public static function AddViewToOne($view, $id)
    {
        $cameOn = vacantlisttable::where('id', '=', $id)->first();
        $NewView = $cameOn->noOfView + 1;
        vacantlisttable::where('id', '=', $id)->update([
            'noOfView' => $NewView
        ]);
        return $NewView;
    }


    public static function calulateTimeAgo($time)
    {

        $time_difference = time() - $time;

        if ($time_difference < 1) {
            return 'less than 1 second ago';
        }
        $condition = array(
            12 * 30 * 24 * 60 * 60 =>  'year',
            30 * 24 * 60 * 60       =>  'month',
            24 * 60 * 60            =>  'day',
            60 * 60                 =>  'hour',
            60                      =>  'minute',
            1                       =>  'second'
        );

        foreach ($condition as $secs => $str) {
            $d = $time_difference / $secs;

            if ($d >= 1) {
                $t = round($d);
                return 'About ' . $t . ' ' . $str . ($t > 1 ? 's' : '') . ' ago';
            }
        }
    }
}