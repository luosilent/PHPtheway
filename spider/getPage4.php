<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/11
 * Time: 10:10
 */
require "Connect.php";
require "phpSpider.php";
$connect = new Connect();
$getPage = new Spider();
$conn = $connect->conn();

$sql = "select * from spider3 where 1=1 ";
$stmt = $conn->prepare($sql);
$stmt->execute();
$res = array();
while ($obj = $stmt->fetch()) {
    $res[] = $obj;
}

foreach ($res as $re) {
    $url = "http://php.net/manual/en/" . $re['url'];
    $pat1 = '/<div class=\"refsect1 description\".*?>(.*)<div class=\"refsect1 parameters\" .*?>/ism';
    $description = $getPage->returnAll($url, $pat1);
    if ($description) {
        $des = htmlRe($description[0]);
    } else {
        $des = "null";
    }

    $pat2 = '/<div class=\"refsect1 parameters\".*?>(.*?)<\/div>/s';
    $parameters = $getPage->returnAll($url, $pat2);
    if ($parameters) {
        $par = htmlRe($parameters[0]);
    } else {
        $par = "null";
    }

    $pat3 = '/<div class=\"refsect1 returnvalues\".*?>.*?<\/div>/s';
    $returnValues = $getPage->returnAll($url, $pat3);
    if ($returnValues) {
        $ret = htmlRe($returnValues[0]);
    } else {
        $ret = "null";
    }

    $pat4 = '/<div class=\"refsect1 changelog\".*?>.*?<\/div>/s';
    $changeLog = $getPage->returnAll($url, $pat4);
    if ($changeLog) {
        $cha = htmlRe($changeLog[0]);
    } else {
        $cha = "null";
    }

    $pat5 = '/<div class=\"refsect1 notes\".*?>.*?<\/div>/s';
    $notes = $getPage->returnAll($url, $pat5);
    if ($notes) {
        $not = htmlRe($notes[0]);
    } else {
        $not = "null";
    }

    $pat6 = '/<div class=\"refsect1 seealso\".*?>.*?<\/div>/s';
    $seeAlso = $getPage->returnAll($url, $pat6);
    if ($seeAlso) {
        $see = htmlRe($seeAlso[0]);
    } else {
        $see = "null";
    }

    $sql2 = "insert into spider4 (aid,function,description,parameters,returnValues,changeLog,notes,seeAlso) 
        values (:aid,:function,:description,:parameters,:returnValues,:changeLog,:notes,:seeAlso);";
    $conn = $connect->conn();
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bindParam(":aid", $re['id']);
    $stmt2->bindParam(":function", $re['name']);
    $stmt2->bindParam(":description", $des);
    $stmt2->bindParam(":parameters", $par);
    $stmt2->bindParam(":returnValues", $ret);
    $stmt2->bindParam(":changeLog", $cha);
    $stmt2->bindParam(":notes", $not);
    $stmt2->bindParam(":seeAlso", $see);
    $stmt2->execute();
//
//    $stmt2 = '';
//    $conn = "";


}

function htmlRe($a)
{
    if (strpos($a, '<', 0) === false) {
        $a = str_replace("\n", "", $a);
        echo $a;
    } else {
        while (strpos($a, '<', 0) >= 0) {
            if (strpos($a, '<', 0) === false)
                break;
            $x1 = strpos($a, '<', 0);
            $x2 = strpos($a, '>', 0);
            if ($x2 === false)
                $x2 = strlen($a);
            $t = substr($a, $x1, $x2 - $x1 + 1);
            $a = str_replace($t, '', $a);
            $a = str_replace("\n", "", $a);
        }

        return $a;
    }

}
