<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/6/27
 * Time: 13:36
 */
require_once "DySpider.php";

$crawler = new DySpider();

//user正则 /<span class="dy-name ellipsis fl">(.*?)<\/span>/
$user = $crawler -> returnUser($url, $patUser);


//view正则 /<span class="dy-num fr"  >(.*?)<\/span>/
$view = $crawler -> returnView($url,$patView);


//key正则 /<span class="impress-tag-item" .*?[^>]*>(.*?)<\/span>/i
$keyWord = $crawler -> returnKey($url,$patKey);


