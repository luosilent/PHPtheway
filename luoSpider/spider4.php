<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/10
 * Time: 9:50
 */
function conn()
{
    $driver = 'mysql';
    $dbName = 'spider';
    $charset = 'utf8';
    $dsn = "$driver:dbName=$dbName;charset=$charset";
    $uName = "root";
    $pWord = "root";

    try {
        $conn = new PDO($dsn, $uName, $pWord);
        $conn->query("set NAMES $charset");
        //添加使用数据库
        $str = "use $dbName";
        $conn->exec($str);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        $error = "Access denied! ";
        $ext = $e->getMessage();
        echo $error . $ext;
    }

    return $conn;

}

function select($sql)
{
    $conn = conn();

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $res = array();
    while ($obj = $stmt->fetch()) {
        $res[] = $obj;
    }

    return $res;
}

function returnStr($pattern, $content)
{
    preg_match($pattern, $content, $result);
    if (count($result) > 0)
        return $result[0];

    return '';
}
