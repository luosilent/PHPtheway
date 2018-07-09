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
function getPageTwo($getTwo,$conn)
{
//    echo 2;
    preg_match_all("/<li>.*?<\/ul><\/li>/ism",$getTwo[0],$getTwoNa);
    foreach ($getTwoNa[0] as $value) {
        preg_match_all("/<a .*?>.*?<\/a>/is",$value,$getTwoNam);
        preg_match_all("/>(.*)<\/a>/ism", $getTwoNam[0][0], $nameTwo);
        //表单2


//        if ($nameTwo[1][0]) {
//            $sql = "insert into spiderTwo (name) values  (:name) ";
//            $stmt = $conn->prepare($sql);
//            $stmt->bindParam(':name', $nameTwo[1][0]);
//            $stmt->execute();
//            $stmt = null;
//        } else {
//            echo "抓取失败";
//        }


    }
//print_r($nameTwo[1]);
//    echo "<br>";

    $conn = null;
    return $nameTwo[1];




}