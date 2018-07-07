<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/6/27
 * Time: 13:36
 */
require_once 'Connect.php';
require_once "phpSpider.php";
require_once "getPageOne.php";
require_once "getPageTwo.php";

$urlOne = "https://secure.php.net/manual/en/funcref.php";
$patOne = '/<ul class=\"chunklist chunklist_set\">(.*?)<\/ul><\/div>/ism';
$connect = new Connect();
$conn = $connect->conn();
$getPage = new Spider();


$getOne = $getPage->returnAll($urlOne, $patOne);

$getArr = getPageOne($getOne, $conn);
//print_r($getArr);


foreach ($getArr as $value) {
    preg_match_all("/href=\"(.*?)\"/ism", $value, $getArrT);
    $urlTwo = "https://secure.php.net/manual/en/" . $getArrT[1][0];
//    var_dump($urlTwo);exit;
    $getTwo = $getPage->returnAll($urlTwo, $patOne);
    $getArr2 = getPageTwo($getTwo, $conn);
}




