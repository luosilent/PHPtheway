<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/11
 * Time: 16:35
 */
include_once 'BookQueue.php';

$myBooks = new BookQueue(20);

$myBooks->enqueue('1111');
$myBooks->enqueue('2222');
$myBooks->enqueue('3333');
$myBooks->enqueue('4444');
$myBooks->enqueue('5555');
$myBooks->enqueue('6666');
$myBooks->enqueue('7777');

echo $myBooks->dequeue();
echo "\n";
echo $myBooks->dequeue();
echo "\n";
var_dump($myBooks->isEmpty());
var_dump($myBooks->count());
while (!$myBooks->isEmpty()){
    echo $myBooks->dequeue() , "\n";
}