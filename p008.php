<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/11
 * Time: 10:27
 */
/**
 * @param $a
 * @return mixed
 */
$start = microtime(true);
function htmlRe($a)
{
    if(strpos($a, '<', 0)===false)
    {
        echo $a;
    }else
    {
        while(strpos($a, '<', 0)>=0)
        {
            if(strpos($a, '<', 0)===false)
                break;

            $x1 = strpos($a, '<', 0);

            $x2 = strpos($a, '>', 0);

            if($x2===false)          //这里有if的原因是 特殊需要,因为内容可能只有<开始,没有>结束
                $x2 = strlen($a);
            $t = substr($a, $x1, $x2 - $x1 + 1);

            $a = str_replace($t,'',$a);
        }
        return $a;
    }

}

$str1 = "<p class=\"verinfo\">(PECL wincache &gt;= 1.0.0)</p>";
$str2 = "<span class=\"type\">bool</span><span class=\"methodname\"><strong>wincache_refresh_if_changed</strong></span>";
$s1 = htmlRe($str1);
$s2 = htmlRe($str2);
echo $s1."<br>";
echo $s2."<br>";

$end = microtime(true);
$total=round(($end - $start)*1000,3);   //计算差值
echo $total."ms";
