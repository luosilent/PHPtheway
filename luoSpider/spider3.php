<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/10
 * Time: 9:49
 */

require "spider4.php";
$sql = "select * from luoSpider3 where 1=1 limit 4000";
$array = select($sql);

foreach ($array as $v) {
    $url = "http://php.net/manual/en/" . $v['url'];
    $content = file_get_contents("$url");

    /**/
    //description
    $pattern = '/<div class=\"refsect1 description\".*?>.*?<div.*?>.*?<\/div>.*?<\/div>/is';
    $description = returnStr($pattern, $content);

    //parameters
    $pattern = '/<div class=\"refsect1 parameters\".*?>.*?<\/div>/s';
    $parameters = returnStr($pattern, $content);


    //return Values
    $pattern = '/<div class=\"refsect1 returnvalues\".*?>.*?<\/div>/s';
    $returnValues = returnStr($pattern, $content);


    //Changelog
    $pattern = '/<div class=\"refsect1 changelog\".*?>.*?<\/div>/s';
    $changeLog = returnStr($pattern, $content);


    //Notes
    $pattern = '/<div class=\"refsect1 notes\".*?>.*?<\/div>/s';
    $notes = returnStr($pattern, $content);


    //See Also
    $pattern = '/<div class=\"refsect1 seealso\".*?>.*?<\/div>/s';
    $seeAlso = returnStr($pattern, $content);

    //echo $description,$parameters,$returnValues,$changeLog,$notes,$seeAlso;
    $conn = conn();
    $sql = "insert into luoSpider4 (aid,function,description,parameters,returnValues,changeLog,notes,seeAlso)
            values(:aid,:function,:description,:parameters,:returnValues,:changeLog,:notes,:seeAlso) ";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":aid", $v['id']);
    $stmt->bindParam(":function", $v['function']);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":parameters", $parameters);
    $stmt->bindParam(":returnValues", $returnValues);
    $stmt->bindParam(":changeLog", $changeLog);
    $stmt->bindParam(":notes", $notes);
    $stmt->bindParam(":seeAlso", $seeAlso);
    $stmt->execute();
    $res = $conn->lastInsertId();

    $stmt = '';
    $conn = "";
//    if($res)
//        echo 'yes - ',$v['function']."</br>";

}



