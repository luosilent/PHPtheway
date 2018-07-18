<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/18
 * Time: 8:54
 */
header('Content-Type:text/html;charset=utf-8');

date_default_timezone_set('Asia/Shanghai');

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
        $conn->query("set names utf8;");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $str = "use $dbName";
        $conn->exec($str);
    } catch (PDOException $e) {
        $error = $e->getMessage();
        echo $error;
    }

    return $conn;
}


function getHtml($url)
{
    $ch = curl_init();
    $timeout = 10;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.131 Safari/537.36');
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $html = curl_exec($ch);

    return $html;
}
