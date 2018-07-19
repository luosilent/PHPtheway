<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/18
 * Time: 8:54
 */
header('Content-Type:text/html;charset=utf-8');


function getPage1($reg1,$html1)
{
    preg_match_all($reg1, $html1, $pat1);

    foreach ($pat1[0] as $value) {
        preg_match_all("/>(.*?)<\/a>/ism", $value, $pat2);
        preg_match_all("/<a .* href=\"(.*)\">/ism", $pat2[0][0], $pat3);
        preg_match_all("/<.*>(.*?)<\/a>/ism", $pat2[0][0], $pat4);

        $url1 = "http://www.zjpp.com.cn" . $pat3[1][0]; // 首页的视频链接
        $title1 = trim($pat4[1][0]); // 首页的视频标题


//        if ($title1) {
//            $conn = conn();
//            $sql = "insert into spider_zj1 (title,url) values (:title,:url) ";
//            $stmt = $conn->prepare($sql);
//            $stmt->bindParam(':title', $title1);
//            $stmt->bindParam(':url', $url1);
//            $stmt->execute();
//            $id = $conn->lastInsertId();//
////            echo "第" . $id . "条数据抓取成功，视频为:" . $title1 . '<br>';
//            $stmt = null;
//        }
        $reArr[] = array($title1 => $url1);
    }
    $conn = null;
    return $reArr;
}