<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/6
 * Time: 17:00
 */

/**
 * @param $id
 * @param $getTwo
 * @param $conn
 * @return mixed
 */
function getPageTwo($getTwo,$conn)
{
    preg_match_all("/<li>.*?<\/ul><\/li>/ism",$getTwo[0],$getTwoNa);
    foreach ($getTwoNa[0] as $value) {
        preg_match_all("/<a .*?>.*?<\/a>/is",$value,$getTwoNam);
        preg_match_all("/>(.*)<\/a>/ism", $getTwoNam[0][0], $name2);
        //表单2
        echo 2;

        if ($name2[1][0]) {
            $sql = "insert into spiderTwo (name) values  (:name) ";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':name', $name2[1][0]);
            $stmt->execute();
            $stmt = null;
        } else {
            echo "抓取失败";
        }


    }

    $conn = null;




}