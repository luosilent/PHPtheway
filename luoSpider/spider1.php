<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/10
 * Time: 9:49
 */
require "spider4.php";
header("Content-Type: text/html; charset=utf-8;");

$url = "https://secure.php.net/manual/en/funcref.php";
$content = htmlspecialchars(file_get_contents("$url"));
//print_r($content);
$pattern = '/&lt;ul class=&quot;chunklist chunklist_set&quot;&gt;(.*)&lt;section id=&quot;usernotes&quot;&gt;/isU';
preg_match_all($pattern, $content, $result);

//print_r($result[0][0]);exit;
$pattern = '/&lt;a href=&quot;(.*)&quot;&gt;(.*)&lt;\/a&gt;/isU';
preg_match_all($pattern, $result[0][0], $result_2);
//print_r($result_2);exit;


foreach ($result_2[1] as $k => $v) {
    if (preg_match("/^refs/", $v)) {
        $conn = conn();
        $sql = "insert into luoSpider1 (function,url)values(:function,:url) ";
        //echo $sql;exit;
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":function", $result_2[2][$k]);
        $stmt->bindParam(":url", $v);
        $stmt->execute();
        $res = $conn->lastInsertId();
        $aid = $res;
        $stmt = '';
        $conn = "";
        if ($res)
            echo 'yes - ', $result_2[2][$k] . "</br>";
    } elseif (preg_match("/^book/", $v)) {
        $conn = conn();
        $sql = "insert into luoSpider2 (aid,function,url)values(:aid,:function,:url) ";
        //echo $sql;exit;
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":aid", $aid);
        $stmt->bindParam(":function", $result_2[2][$k]);
        $stmt->bindParam(":url", $v);
        $stmt->execute();
        $res = $conn->lastInsertId();

        $stmt = '';
        $conn = "";
//        if($res)
//            echo 'yes - ',$result_2[2][$k]."</br>";
    }
}



