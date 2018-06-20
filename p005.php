<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/6/20
 * Time: 14:19
 */

/**
 * 生成器
 * @param $length
 * @return Generator
 */
function makeRange($length){
    for ($i = 0; $i < $length;$i++){
        yield $i;
    }
}
foreach (makeRange(20) as $i){
    echo $i,PHP_EOL;
}
echo "<hr>";

/**
 * 斐波那契数列
 * @param $n
 */
function fib($n){
    $arr = array();
    $arr[0] = 1;
    $arr[1] = 1;

    for ($i = 2; $i < $n; $i++){
        $arr[$i] = $arr[$i-1] + $arr[$i-2];
    }
    foreach ($arr as $item) {
        echo $item,PHP_EOL;
    }
}
fib(20);
echo "<hr>";

function fb($num){
    $cur =1;
    $pre = 0;
    for ($i = 0;$i < $num;$i++){
        yield $cur;
        $tem = $cur;
        $cur = $pre+$cur;
        $pre = $tem;
    }
}
$fib = fb(20);
foreach ($fib as $item) {
    echo $item,PHP_EOL;
}
echo "<hr>";

$numPlusOne = array_map(function ($number){
    return $number+1;
},[1,2,3,4]);
print_r($numPlusOne);
echo "<hr>";
$closure = function ($name,$age){
    return sprintf("hello,my name is %s and my age is %d",$name,$age);
};
echo $closure("luo silent",12);
echo "<hr>";

