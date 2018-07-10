<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/6/27
 * Time: 13:36
 */
require 'Connect.php';
require "phpSpider.php";
require "getPageOne.php";
require "getPageTwo.php";
require "getPageThree.php";


$connect = new Connect();
$getPage = new Spider();
$conn = $connect->conn();

/**
 * 第一个表
 */
$urlOne = "https://secure.php.net/manual/en/funcref.php";
$patOne = '/<ul class=\"chunklist chunklist_set\">(.*?)<\/ul><\/div>/ism';
$getOne = $getPage->returnAll($urlOne, $patOne);

$getArr = getPageOne($getOne, $conn);
//print_r($getArr);

/**
 * 第二个表
 */
foreach ($getArr as $value) {
    preg_match_all("/href=\"(.*?)\"/ism", $value, $getArrT);
    $urlTwo = "https://secure.php.net/manual/en/" . $getArrT[1][0];
//    var_dump($urlTwo);exit;
    $getTwo = $getPage->returnAll($urlTwo, $patOne);
    $getArr2 = getPageTwo($getTwo, $conn);
    $getArr3[] = $getArr2;
}

/**
 * 第三个表
 */

$patThree = '/<ul class=\"chunklist chunklist_book chunklist_children\">.*?<\/ul>/ism';
foreach ($getArr3 as $k => $dd) {
    foreach ($dd as $item) {
        $urlThree = "https://secure.php.net/manual/en/".$item;
        $getThree = $getPage->returnAll($urlThree, $patThree);
//        print_r($getThree);exit;
        $getArr4 = getPageThree($getThree, $conn);
    }
}


