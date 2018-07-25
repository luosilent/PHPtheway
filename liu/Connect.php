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
