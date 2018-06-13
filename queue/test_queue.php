<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/13
 * Time: 10:38
 */
include_once 'NumQueue.php';

$numbers = new NumQueue(7);

$numbers->addQueue('1111');
$numbers->addQueue('2222');
$numbers->addQueue('3333');
$numbers->addQueue('4444');
$numbers->addQueue('5555');
$numbers->addQueue('6666');
$numbers->addQueue('7777');
$numbers->addQueue('8888');
$numbers->addQueue('9999');

echo "\n";
echo $numbers->delQueue();
echo "\n";
//echo $numbers->delQueue();
echo "\n";
var_dump($numbers->isEmpty());
var_dump($numbers->count());
while (!$numbers->isEmpty()){
    echo $numbers->delQueue()."\n";
}