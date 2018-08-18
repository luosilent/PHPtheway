<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/8/18
 * Time: 9:38
 */
//直接读取json文件，也可以从数据库读取
$json_string = file_get_contents("regions.json");// 从文件中读取数据到PHP变量
//$data = json_decode($json_string,true);// 把JSON字符串转成PHP数组
//$json_strings = json_encode($data);

return $json_string;