<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/6
 * Time: 15:29
 */
require_once 'Connect.php';
require_once "phpSpider.php";


$url = "https://secure.php.net/manual/en/funcref.php";
$patOne = '/<ul class=\"chunklist chunklist_set\">(.*?)<\/ul><\/div>/ism';
$patOneN = '/<li>.*?<\/ul><\/li>/ism';

$connect = new Connect();
$conn = $connect->conn();
$getOne = new Spider();
$getOne = $getOne -> returnAll($url, $patOne);


//print_r($getOne);exit;
preg_match_all($patOneN, $getOne[0], $getOneNa);
foreach($getOneNa[0] as $value) {
    preg_match_all("/>(.*)<\/a><ul/ism", $value, $getOneNam);
    preg_match_all("/>(.*)/ism", $getOneNam[1][0], $getOneName);
    $name = $getOneName[1][0];
//    print_r($name); echo '<br>';
    $getArr[] = $getOneNam[1][0];


    if ($name) {
        $sql = "insert into spiderOne (name) values  (:name) ";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        $id = $conn->lastInsertId();//返回inert的id值
        $stmt = null;
    } else {
        echo "抓取失败";
    }
}
$conn = null;