<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/12
 * Time: 14:54
 */

$start = microtime(true);
function getProgramExecTime($time = false, $format = false, $number = 3)
{
    list($usec, $sec) = explode(" ",microtime());

    $t = (float)$usec + (float)$sec;

    if($time == false) {

        return $t;
    }

    return $format ? round(($t - $time) * 1000, $number) . ' ms' : round(($t - $time) * 1000, $number);
}


$script_start_time = getProgramExecTime();

// some code ...

$diff = getProgramExecTime($script_start_time, true);
echo "程序运行了 " . $diff;
echo "<br>";

$end = microtime(true);
$total=round(($end - $start)*1000,3);   //计算差值
echo "程序运行了 " .$total."ms";