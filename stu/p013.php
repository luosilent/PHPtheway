<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/9/6
 * Time: 16:15
 */



$password = "qwe123";
// ��������Ĺ�ϣֵ��$hashedPassword ��һ������Ϊ 60 ���ַ����ַ���.
$hashedPassword = password_hash($password,PASSWORD_DEFAULT);
// �����ڿ��԰�ȫ�ؽ� $hashedPassword ���浽���ݿ���!
echo $hashedPassword;
echo "<br>";
//echo password_hash("qwe123", PASSWORD_DEFAULT);
//������֤
if(password_verify($password, $hashedPassword)) {
    echo 'same';
}