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
                preg_match("/href=\"(.*?)\"/ism", $r, $href4);
                $name2 = addslashes($name4[1]);
                $sql2 = "SELECT * FROM spiderThree WHERE name ='$name2'";
                $stmt2 = $conn->prepare($sql2);
                $stmt2->execute();
                $result1 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                $result2 = array("Requirements", "Installation", "Runtime Configuration", "Resource Types");
                $result3 = strpos($name2, " ");

                if ($result1 && in_array($name2, $result2)) {
                    continue;
                }
                if (!$result3) {
                    $sql3 = "INSERT INTO spider3 (name,url) values (:name,:url)";
                    $stmt3 = $conn->prepare($sql3);
                    $stmt3->bindParam(':name', $name4[1]);
                    $stmt3->bindParam(':url', $href4[1]);
                    $stmt3->execute();
                }
            }
        }
    } else {
        echo "抓取失败";
    }


//    $conn = null;


}