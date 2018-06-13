<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/13
 * Time: 10:27
 */
include_once 'NumHeap.php';

$heap = new NumHeap();
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

$heap->dump();
var_dump($heap->count());
//echo $heap->extract(),"\n";
while (!$heap->isEmpty()){
    echo $heap->extract(),"\n";
}
var_dump($heap->count());