<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/9/6
 * Time: 16:15
 */



$password = "qwe123";
// 计算密码的哈希值。$hashedPassword 是一个长度为 60 个字符的字符串.
$hashedPassword = password_hash($password,PASSWORD_DEFAULT);
// 你现在可以安全地将 $hashedPassword 保存到数据库中!
echo $hashedPassword;
echo "<br>";
//echo password_hash("qwe123", PASSWORD_DEFAULT);
//密码验证
if(password_verify($password, $hashedPassword)) {
    echo 'same';
}