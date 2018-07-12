<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/6
 * Time: 15:29
 */

/**
 * @param $getOne
 * @param $conn
 * @return array
 */
function getPage1($getOne, $conn)
{

    preg_match_all("/<li>.*?<\/ul><\/li>/ism", $getOne[0], $getOne1);
    foreach ($getOne1[0] as $value) {
        preg_match_all("/>(.*)<\/a><ul/ism", $value, $getOne2);
        preg_match_all("/>(.*)/ism", $getOne2[1][0], $getOne3);
        $nameOne = $getOne3[1][0];
        $getArr[] = $getOne3[1][0];

        if ($nameOne) {
            $sql = "insert into spiderOne (name) values  (:name) ";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':name', $nameOne);
            $stmt->execute();
            $stmt = null;
        } else {
            echo "抓取失败";
        }
    }

    $conn = null;

    return $getArr;
}
