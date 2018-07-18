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
//$reg1 = '/<div class=\"covimg-wrap\">(.*?)<\/div>/ism';
$reg1 = '/<h3>(.*?)<\/h3>/ism';
preg_match_all($reg1, $html, $pat1);
//	print_r($pat1);exit;
$reg2 = "/>(.*?)<\/a>/ism";
foreach ($pat1[0] as $value) {
//    echo $value;exit;
    preg_match_all($reg2, $value, $pat2);
//    print_r($pat2);exit;
    preg_match_all("/<a .* href=\"(.*)\">/ism", $pat2[0][0], $pat3);
//    print_r($pat3[1][0]);exit;
    preg_match_all("/<.*>(.*?)<\/a>/ism", $pat2[0][0], $pat4);
//    print_r($pat4[1][0]);exit;
    $url = $pat3[1][0];
    $title = trim($pat4[1][0]);
//    $encode = mb_detect_encoding($title, "UTF-8");

//    $title1 = mb_convert_encoding($title, 'UTF-8','ASCII,GB2312,gbk,UTF-8');
//    echo mb_detect_encoding($title1);

    echo $title;

    echo "<br>";
    if ($title) {
        $conn = conn();
        $sql = "insert into luo_zj2 (title,url) values (:title,:url) ";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':url', $url);
        $stmt->execute();
        $id = $conn->lastInsertId();//
        echo "第" . $id . "条数据抓取成功" . '<br>';
        $stmt = null;
    }

    $conn = null;
}