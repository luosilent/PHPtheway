<?php

/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/27
 * Time: 15:08
 */
require_once "simple_html_dom.php";
require_once "Connect.php";
$conn = conn();

//$html = get_url("https://www.lotto-8.com/listltohk.asp?indexpage=2&orderby=new");
//    echo $html;exit();
for ($page = 1; $page < 2; $page++) {

    $html = get_url("https://www.lotto-8.com/listltohk.asp?indexpage='$page'&orderby=new");
//    echo $html;exit();
    if (!$html)
        exit("Network Error!!");
    if (strpos($html, "暂无数据") !== false)
        exit("暂无数据 Error!!");


    $dom = new simple_html_dom();
    $dom->load($html);
    $trs = $dom->find("table", 0)->find("tr");

    foreach ($trs as $tr) {
        $arr = [];
        $arrR = [];
        $tds = $tr->find("td");
        foreach ($tds as $td) {
            //过滤结果中的标签
            $arr = strip_tags($td->innertext);
            preg_match_all("/\d+/", $arr, $arr);
            $result .= implode(",", $arr[0]) . "\r\n";
            $arrR = explode("\r\n", $result);
        }

    }
//    $arrRe[]=$arrR;
}
//print_r($arrR);exit;
foreach ($arrR as $key => $value) {
    $arr[] = $value;
    $arr1 = array_chunk($arr, 5);
}

//print_r($arr1);exit;

$a = $arr1[1][1];
$b = $arr1[1][2];
$c = $arr1[1][3];
$d = $arr1[1][4];
//echo $a, $b, $c, $d;

$stime = str_replace(",", "-", $a);
$etime = str_replace(",", "-", $d);
$sql = "INSERT INTO `liu` (stime,small,big,etime,cdate)
        VALUES ('" . $stime . "','" . $b . "','" .$c . "','" . $etime . "',now())";
$stmt = $conn->prepare($sql);
$stmt->execute();


//echo "爬取完成";
//print_r($arrR);
//file_put_contents("result.csv", $result);

function get_url($url)
{

    $fcontents = file_get_contents($url);
    preg_match_all('/<table class=\"auto-style4\">(.*?) <\/table>/si', $fcontents, $match);
    $table_data = $match[0][0];

    return $table_data;


}