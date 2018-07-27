<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/27
 * Time: 21:10
 */
function conn()
{
    $driver = 'mysql';
    $host = 'localhost';
    $dbName = 'test';
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

$conn = conn();
echo "ok";
$sql = "INSERT INTO `tetst` (test)
        VALUES (1)";
$stmt = $conn->prepare($sql);
$stmt->execute();