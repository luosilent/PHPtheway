<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/18
 * Time: 8:54
 */
header('Content-Type:text/html;charset=utf-8');
//date_default_timezone_set('Asia/Shanghai');
function conn()
{
    $driver = 'mysql';
    $host = 'localhost';
    $dbName = 'spider';
    $charset = 'utf8';
    $dsn = "$driver:host=$host;dbName=$dbName;$charset";
    $uName = "root";
    $pWord = "root";
    try {
        $conn = new PDO($dsn, $uName, $pWord);
        $conn->exec("set names utf8;");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("use $dbName");
    } catch (PDOException $e) {
        $error = $e->getMessage();
        echo $error;
    }
    return $conn;
}
function getHtml($url)
{
    $ch = curl_init();
    curl_setopt( $ch,CURLOPT_URL, $url );
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
    curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, 
    like Gecko) Chrome/67.0.3396.99 Safari/537.36');
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, 1 );
    $curl_result = curl_exec ( $ch );
    $curl_result = html_entity_decode($curl_result,ENT_QUOTES, 'UTF-8');
//    mb_convert_encoding($curl_result, 'utf-8', 'utf-8');
    curl_close( $ch );

    return $curl_result;
}
