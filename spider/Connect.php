<?php

/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/6/27
 * Time: 15:47
 */
class Connect {
    public function conn()
    {
        $host = '127.0.0.1';
        $dbName = 'spider';
        $charset = 'utf8';
        $dsn = "mysql:host=$host;dbName=$dbName;charset=$charset";
        $uerName = "root";
        $password = "root";

        try {
            $conn = new PDO($dsn, $uerName, $password);
            $conn->query("set NAMES $charset");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //添加使用数据库
            $str = "use $dbName";
            $conn->exec($str);
        } catch (PDOException $e) {
            $error = "Access denied! ";
            $ext = $e->getMessage();
            echo $error . $ext;
        }

        return $conn;

    }
}
