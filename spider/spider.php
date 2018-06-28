<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/6/26
 * Time: 14:51
 */

// 通过 file_get_contents 函数获取页面源码
$html = file_get_contents("https://secure.php.net/manual/en/funcref.php");

// 通过 preg_replace 函数使页面源码由多行变单行
$htmlOneLine = preg_replace("/\r|\n|\t/","",$html);

// 通过 preg_match 函数提取获取页面的标题信息
//preg_match("/<title>(.*)<\/title>/iU",$htmlOneLine,$titleArr);
preg_match("/<\/a><\/dt>(.*)<\/dl>/iU",$htmlOneLine,$linkArr);
preg_match("/<\/a><\/dt><dd><a href='(.*?)'>/iU",$htmlOneLine,$links);

// 由于 preg_match 函数的结果是数组的形式
//$title = $titleArr[1];
//foreach ($linkArr as $item){
//    echo $item;
//}
foreach ($links as $link){
    echo $link;
}

// 通过 echo 函数输出标题信息
//echo $title;

