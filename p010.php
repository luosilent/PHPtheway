<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/20
 * Time: 16:54
 */

/*获取客户端真实的IP*/
function GetIps(){
    $realip = '';
    $unknown = 'unknown';
    if (isset($_SERVER)){
        if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown)){
            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach($arr as $ip){
                $ip = trim($ip);
                if ($ip != 'unknown'){
                    $realip = $ip;
                    break;
                }
            }
        }else if(isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP']) && strcasecmp($_SERVER['HTTP_CLIENT_IP'], $unknown)){
            $realip = $_SERVER['HTTP_CLIENT_IP'];
        }else if(isset($_SERVER['REMOTE_ADDR']) && !empty($_SERVER['REMOTE_ADDR'])
            && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown)){
            $realip = $_SERVER['REMOTE_ADDR'];
        }else{
            $realip = $unknown;
        }
    }
    $realip = preg_match("/[d.]{7,15}/", $realip, $matches) ? $matches[0] : $unknown;
    return $realip;
}

/*把IP传入新浪API返回数据获取ip的真实归属地*/
function GetIpFrom($ip = ''){
    if(empty($ip)){
        $ip = GetIps();
    }
    $res = @file_get_contents('http://ip.taobao.com/service/getIpInfo.php?ip='.$ip);
    return $res;
}
$ip = "192.100." . rand(1, 255) . "." . rand(1, 255);
$address = GetIpFrom($ip);
//print_r($address);
$arr = json_decode($address);
print_r( "IP:".$arr->data->ip);
echo "<br>";
print_r("Address:".$arr->data->country);

