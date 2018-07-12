<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/6
 * Time: 17:00
 */

/**
 * @param $getTwo
 * @param $conn
 * @return mixed
 */
function getPage2($getTwo, $conn)
{
    preg_match_all("/<li>.*?<\/ul><\/li>/ism", $getTwo[0], $getTwo1);
    foreach ($getTwo1[0] as $value) {
        preg_match_all("/<a .*?>.*?<\/a>/is", $value, $getTwo2);
        preg_match_all("/>(.*)<\/a>/ism", $getTwo2[0][0], $nameTwo);
        preg_match_all("/href=\"(.*?)\"/ism", $getTwo2[0][0], $href);

        if ($nameTwo[1][0]) {
            $sql = "insert into spiderTwo (name) values  (:name) ";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':name', $nameTwo[1][0]);
            $stmt->execute();
            $stmt = null;
        } else {
            echo "抓取失败";
        }

        $getArr[] = $href[1][0];
    }


    $conn = null;

    return $getArr;


}