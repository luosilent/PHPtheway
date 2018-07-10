<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/9
 * Time: 10:52
 */
/**
 * @param $getThree
 * @param $conn
 * @return string
 */
function getPageThree($getThree, $conn)
{
    if (isset($getThree)) {
        foreach ($getThree as $value) {
            preg_match_all("/<a.*?>(.*?)<\/a>/ism", $value, $ref2);

            foreach ($ref2[0] as $r) {

                    preg_match("/>(.*?)<\/a>/ism", $r, $name4);

                    //            preg_match("/href=\"(.*?)\"/ism",$r,$href4);
                    $sql3 = "INSERT INTO spiderThree (name) values (:name)";
                    $stmt3 = $conn->prepare($sql3);
                    $stmt3->bindParam(':name', $name4[1]);
                    $stmt3->execute();



            }
        }
    } else {
        echo "抓取失败";
    }


//    $conn = null;


}