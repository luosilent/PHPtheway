<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/6/26
 * Time: 14:51
 */
require_once 'DyConnect.php';
header('Content-type:text/html;charset=utf-8');

$url = $_GET['url'];
$patUser = $_GET['patUser'];
$patView = $_GET['patView'];
$patKey = $_GET['patKey'];

/**
 * Class DySpider
 */
class DySpider
{

    public function getContent($url)
    {
        $content = file_get_contents($url);

        return $content;
    }

    /**
     * @param $content
     * @param $pattern
     * @return array
     */

    public function extract($content, $pattern)
    {
        $matches = array();
        preg_match_all($pattern, $content, $matches);

        return $matches;
    }


    /**
     * @param $pattern
     * @return int
     */
    public function countPat($pattern)
    {
        $reCount = substr_count($pattern, '(.*?)');

        return $reCount;
    }

    /**
     * @param $url
     * @param $patUser
     */
    public function returnUser($url, $patUser)
    {
        $connect = new DyConnect();
        $conn = $connect->conn();
        $op = self::getContent($url);
        $reinFo = self::extract($op, $patUser);
        $countNum = self::countPat($patUser);
        $reinFo = $reinFo[$countNum];
        $i = 0;
        foreach ($reinFo as $key => $value) {
            $i++;
            echo ($key + 1) . '.' . $value . "<br>";

//            插入dyLOL表
            $sql = "INSERT INTO `dyLOL` (id, user)
            VALUES ('".$i."','".$value."')";
//            插入dyJDQS表
//            $sql = "INSERT INTO `dyJDQS` (id, user)
//             VALUES ('".$i."','".$value."')";
//            插入dyYZ表
//            $sql = "INSERT INTO `dyYZ` (id, user)
//             VALUES ('".$i."','".$value."')";
//            更新User表
//             $sql = "UPDATE `dyLOL` set `user` = '" . $value . "'
//               where id= '" . $i . "'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }
    }

    /**
     * @param $url
     * @param $patView
     */
    public function returnView($url, $patView)
    {
        $connect = new DyConnect();
        $conn = $connect->conn();
        $op = self::getContent($url);
        $reinFo = self::extract($op, $patView);
        $countNum = self::countPat($patView);
        $reinFo = $reinFo[$countNum];
        $i = 0;
        foreach ($reinFo as $key => $value) {
            $arr[$i] = $value;
            $i++;
            echo ($key + 1) . '.' . $value . "<br>";
//            更新view
            $sql = "UPDATE `dyLOL` set view = '" . $value . "'
              where id= '" . $i . "'";

            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }
    }

    /**
     * @param $url
     * @param $patKey
     */
    public function returnKey($url, $patKey)
    {
        $connect = new DyConnect();
        $conn = $connect->conn();
        $op = self::getContent($url);
        $reinFo = self::extract($op, $patKey);
        $countNum = self::countPat($patKey);
        $reinFo = $reinFo[$countNum];
        $i = 0;
        foreach ($reinFo as $key => $value) {
            $arr[$i] = $value;
            $i++;
            $arr1 = array_chunk($arr, 4);
        }
        $i = 0;
        foreach ($arr1 as $k => $dd) {
            foreach ($dd as $d) {
                $dd_arr[] = $d;
            }
            $list_dd = join(',', $dd_arr);
            unset($dd_arr);
            $i++;
            $sql = "UPDATE `dyLOL` set `keyWord` = '" . $list_dd . "'
            where id = '" . $i . "'";
            echo $list_dd . "<br>";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }
    }
}




