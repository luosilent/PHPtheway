<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/19
 * Time: 14:01
 */
require_once "Connect.php";

/**
 * 视频地址抓不到-，-，以后研究
 */
$sql = "select * from spider_zj2 where 1=1 limit 10";
$array = select($sql);
foreach ($array as $item){
    $url = $item['url'];
    $html = getHtml($url);
    $reg = '/<div style=\"width: 100%;\">.*<\/div>/ism';
    preg_match_all($reg, $html, $pat1);
    print_r($pat1);exit;

}