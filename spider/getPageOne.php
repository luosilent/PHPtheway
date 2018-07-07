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
function getPageOne($getOne,$conn)
{
    preg_match_all("/<li>.*?<\/ul><\/li>/ism", $getOne[0], $getOneNa);
    foreach ($getOneNa[0] as $value) {
        preg_match_all("/>(.*)<\/a><ul/ism", $value, $getOneNam);
        preg_match_all("/>(.*)/ism", $getOneNam[1][0], $getOneName);
        $name = $getOneName[1][0];
//        echo $name."<br>";
        echo 1;
        $getArr[] = $getOneNam[1][0];

        if ($name) {
            $sql = "insert into spiderOne (name) values  (:name) ";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
            $stmt = null;
        } else {
            echo "抓取失败";
        }
}

    $conn = null;
    return $getArr;
}
