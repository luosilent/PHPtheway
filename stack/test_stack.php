<?php


include_once 'BookStack.php';

$myBooks = new BookStack(20);

$myBooks->push('111');
$myBooks->push('222');
$myBooks->push('333');
$myBooks->push('444');
$myBooks->push('555');
$myBooks->push('666');
$myBooks->push('777');

echo $myBooks->pop();
echo "\n";
echo $myBooks->top();
echo "\n";
var_dump($myBooks->isEmpty());
var_dump($myBooks->count());
while (!$myBooks->isEmpty()){
    echo $myBooks->pop() , "\n";
}

