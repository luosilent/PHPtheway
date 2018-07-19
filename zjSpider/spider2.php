<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/19
 * Time: 8:49
 */
header('Content-Type:text/html;charset=utf-8');


function getPage2($title, $reg2, $html2)
{
    preg_match_all($reg2, $html2, $pat3);
//    print_r($pat3);exit;
    echo "视频：". $title . "<br>";
    foreach ($pat3[0] as $value) {

//        print_r($value);exit;

        preg_match_all("/>(.*?)<\/a>/ism", $value, $pat4);
        foreach ($pat4 as $v) {
//            print_r($v);exit;

            foreach ($v as $item) {

                preg_match_all("/<a .* href=\"(.*)\">/ism", $item, $pat5);
//                print_r($pat5[1][0]);exit;
                preg_match_all("/<.*>(.*?)<\/a>/ism", $item, $pat6);

                $url2 = "http://www.zjpp.com.cn" . $pat5[1][0]; // 视频的目录链接
                $title2 = trim($pat6[1][0]); // 视频的目录标题
//            echo $url2,$title2;exit;
//                if ($title2) {
//                    $conn = conn();
//                    $sql = "insert into spider_zj2 (title,catalog,url) values (:title,:catalog,:url) ";
//                    $stmt = $conn->prepare($sql);
//                    $stmt->bindParam(':title', $title);
//                    $stmt->bindParam(':catalog', $title2);
//                    $stmt->bindParam(':url', $url2);
//                    $stmt->execute();
//                    $id2 = $conn->lastInsertId();
//                    echo "目录为:" . $title2 . '<br>';
//                    $stmt = null;
//                }
            }
//        $reArr[] = array($id => $url2);
        }
    }
    $conn = null;

}