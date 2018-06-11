<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/11
 * Time: 16:35
 */
include_once 'BookQueue.php';

$myBooks = new BookQueue(20);

$myBooks->enqueue('111');
$myBooks->enqueue('222');
$myBooks->enqueue('333');
$myBooks->enqueue('444');
$myBooks->enqueue('555');
$myBooks->enqueue('666');
$myBooks->enqueue('777');

echo $myBooks->dequeue();
echo "\n";
echo $myBooks->dequeue();
echo "\n";
var_dump($myBooks->isEmpty());
var_dump($myBooks->count());
while (!$myBooks->isEmpty()){
    echo $myBooks->dequeue() , "\n";
}