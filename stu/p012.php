<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/8/17
 * Time: 16:57
 */
$json_string = file_get_contents("regions11.json");// 从文件中读取数据到PHP变量
$data = json_decode($json_string,true);// 把JSON字符串转成PHP数组
$i=0;
foreach ($data as &$d) {
    if(is_array($d['cities'])){
        foreach ($d['cities'] as &$lc) {
            if(is_array($lc['districts'])){
//                echo $lc['name']."是有第三层"."<br>";
            }else{
                $i++;
                echo $i.".".$lc['name'],"<br>";
            }
        }
    }
}
echo "一共改了".$i."个";