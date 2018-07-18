<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/18
 * Time: 8:54
 */
header('Content-Type:text/html;charset=utf-8');
require_once("Connect.php");

$url = "http://www.zjpp.com.cn/Topic/List?tag=PHP";
$html = getHtml($url);

$reg1 = '/<div class=\"covimg-wrap\">(.*?)<\/div>/ism';
preg_match_all($reg1, $html, $pat1);
//	print_r($pat1);exit;

$reg2 = "/>(.*?)<\/a>/ism";
foreach ($pat1[0] as $value) {
    preg_match_all($reg2, $value, $pat2);
    preg_match_all("/<a href=\"(.*)\">/ism", $pat2[0][0], $pat3);
    preg_match_all("/<img .* alt=\"(.*?)\" .*>/ism", $pat2[0][0], $pat4);
    $url = $pat3[0][0];
    $title = $pat4[1][0];
    //print_r($title);echo "<br>";
    if ($title) {
        $conn = conn();
        $sql = "insert into zj1 (title,url) values (:title,:url) ";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':url', $url);
        $stmt->execute();
        $id = $conn->lastInsertId();//
        echo "第" . $id . "条数据抓取成功" . '<br>';
        $stmt = null;
    }


//    print_r($pat3[0][1]);exit;
//    print_r($pat4[1][0]);exit;


}
$conn = null;
