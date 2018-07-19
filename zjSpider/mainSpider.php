<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/19
 * Time: 9:01
 */
require_once("Connect.php");
require_once "spider1.php";
require_once "spider2.php";

/**
 * 首页视频链接抓取
 */
$url = "http://www.zjpp.com.cn/Topic/List?tag=PHP";
$html1 = getHtml($url);
$reg1 = '/<h3>(.*?)<\/h3>/ism';
$getArr1 = getPage1($reg1, $html1);
//print_r($getArr1);

/**
 * 循环得到首页视频标题和链接
 */
$reg2 = '/<ul class=\"c-courselist\">.*<\/ul>/ism';
foreach ($getArr1 as $value){
    foreach ($value as $k => $v){
//        echo $k. "=>" .$v;
        $html2 = getHtml($v);
        preg_match_all($reg2, $html2, $pat3);
        $getArr2 = getPage2($k,$reg2, $html2);

    }
}
