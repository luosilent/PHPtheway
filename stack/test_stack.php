<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/12
 * Time: 15:16
 */
include_once 'NumStack.php';

$numbers = new NumStack(5);

$numbers->push('111');
$numbers->push('222');
$numbers->push('333');
$numbers->push('444');
$numbers->push('555');
$numbers->push('666');
$numbers->push('777');
$numbers->push('888');
$numbers->push('999');

echo "<br>";
echo $numbers->pop(); //999
echo "<br>";
echo $numbers->top(); //888
echo "<br>";
var_dump($numbers->isEmpty()); // bool(false)
echo "<br>";
var_dump($numbers->count()); //int(8)
echo "<br>";
while (!$numbers->isEmpty()){
    echo $numbers->pop() . "<br>";
}

