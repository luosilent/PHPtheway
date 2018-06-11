<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/11
 * Time: 16:27
 */
include_once 'BinaryHeap.php';

$heap = new BinaryHeap();
$heap->insert(1);
$heap->insert(6);
$heap->insert(44);
$heap->insert(10);
$heap->insert(17);
$heap->insert(32);
$heap->insert(5);
$heap->insert(13);
$heap->insert(7);
$heap->insert(21);
$heap->insert(37);
$heap->insert(30);
$heap->insert(20);
$heap->insert(3);
$heap->insert(53);
$heap->insert(4);
$heap->insert(19);

//$heap->dump();

while (!$heap->isEmpty()){
    echo $heap->extract(),"\n";
}