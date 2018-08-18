<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/2
 * Time: 16:59
 */
$str = "sluoWWsluoRR";
$tag = "luo";

function search($str, $need)
{
    $res      = [];
    $str_len  = strlen($str);
    $need_len = strlen($need);
    for ($i = 0; $i < $str_len; ++$i) {
        for ($n = 0; $n < $need_len; ++$n) {
            if (isset($str[$i + $n]) && $need[$n] != $str[$i + $n]) {
                break;
            }
            if ($n == $need_len - 1) {
                $res[] = $i;
            }
        }
    }
    return $res;
}

//var_dump(search($str, $tag), count(search($str, $tag)));

$arrSearch = search($str,$tag);
$arrCount = count($arrSearch);
print_r($arrSearch);
echo "<br>";
echo $arrCount;