<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/20
 * Time: 14:03
 */

header('Access-Control-Allow-Origin:*');//跨域
$theCityCode = addslashes($_POST["city"]);
$data = "theCityCode=$theCityCode&theUserID=";
$ch = curl_init();
$ip = "100.100." . rand(1, 255) . "." . rand(1, 255);
//echo $ip;//加上伪造ip没有24小时点击限制、美滋滋
curl_setopt($ch, CURLOPT_URL, "http://www.webxml.com.cn/WebServices/WeatherWS.asmx/getWeather");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER,
    array("X-FORWARDED-FOR:$ip;", "Content-length: " . strlen($data)));
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');

$rtn = curl_exec($ch);
if (!curl_errno($ch)) {
    echo $rtn;
} else {
    echo 'Curl error: ' . curl_errno($ch);
}
curl_close($ch);