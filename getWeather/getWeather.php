<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/20
 * Time: 14:03
 */

header('Access-Control-Allow-Origin:*');//允许跨域
$theCityCode = addslashes($_POST["city"]);
$data = "theCityCode=$theCityCode&theUserID=";
$ch = curl_init();
$ip = "192.". rand(1, 255) .".". rand(1, 255) . "." . rand(1, 255);
$address = GetIpFrom($ip);
$arr = json_decode($address);
print_r( "当前随机IP为:".$arr->data->ip);
print_r(" 地址定位到:".$arr->data->country);
echo "<br>";

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
function GetIpFrom($ip = ''){
    if(empty($ip)){
        $ip = '';
    }
    $res = @file_get_contents('http://ip.taobao.com/service/getIpInfo.php?ip='.$ip);
    return $res;
}