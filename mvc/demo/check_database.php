<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/12
 * Time: 15:13
 */
$host = "localhost";
$db_name = "mvc";
$user = "root";
$password = "mysql";

/**
 *   Create a connection
 */
$conn =   new
mysqli($host, $user, $password, $db_name);

/**
 * Check the connection
 */
if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
} else {
    echo "Connected successfully, connection data are ok.";
}
