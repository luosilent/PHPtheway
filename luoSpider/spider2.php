<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/10
 * Time: 9:49
 */
require "spider4.php";
header("Content-Type: text/html; charset=utf-8;");

$sql = "select * from luoSpider2 where 1=1 limit 200";
$array = select($sql);

foreach ($array as $v) {
    $aid = $v['id'];
    $url = "https://secure.php.net/manual/en/" . $v['url'];
    $content = file_get_contents("$url");
    //print_r($content);exit;

    $pattern = '/Functions<\/a><ul class=\"chunklist chunklist_book chunklist_children\">.*?<\/ul>/is';
    $data = returnStr($pattern, $content);
    //print_r($data);

    $pattern = '/<li><a href=\"(.*)\">(.*)<\/a>(.*)<\/li>/isU';
    preg_match_all($pattern, $data, $final);
    //print_r($final);
    foreach ($final[1] as $k => $value) {
        $conn = conn();
        $sql = "insert into luoSpider3 (aid,function,url)values(:aid,:function,:url) ";
        //echo $sql;exit;
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":aid", $aid);
        $stmt->bindParam(":function", $final[2][$k]);
        $stmt->bindParam(":url", $value);
        $stmt->execute();
        $res = $conn->lastInsertId();

        $stmt = '';
        $conn = "";
//        if($res)
//            echo 'yes - ',$final[2][$k]."</br>";
    }
}



