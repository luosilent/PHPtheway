<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/25
 * Time: 22:38
 */
require_once "simple_html_dom.php";
require_once "Connect.php";
$conn = conn();

$html = get_url("https://www.lotto-8.com/listltohk.asp");
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
foreach ($arrR as $key => $value) {
    $arr[] = $value;
    $arr1 = array_chunk($arr, 5);
}
$i = 0;$j = 0;
foreach ($arr1 as  $v) {

//    echo $v[$i+1],$v[$i+2],$v[$i+3],$v[$i+4],"<br>";

        $j++;
        $sql = "INSERT INTO `liu` (id, stime,small,big,etime)
            VALUES ('" . $j . "','" . $v[$i + 1] . "','" . $v[$i + 2] . "','" . $v[$i + 3] . "','" . $v[$i + 4] . "')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

}


//print_r($arrR);
//file_put_contents("result.csv", $result);

function get_url($url)
{

    $fcontents = file_get_contents($url);
    preg_match_all('/<table class=\"auto-style4\">(.*?) <\/table>/si', $fcontents, $match);
    $table_data = $match[0][0];
    return $table_data;


}