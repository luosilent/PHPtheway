<!--by luosilent-->
<?php
require_once "getCity.php";
$ip = $_SERVER['REMOTE_ADDR'];
$address = GetIpFrom($ip);
//print_r($address);
$arr = json_decode($address);
$city=$arr->data->city;
$dip=iconv("utf-8","gb2312",$arr->data->ip);
print_r( "当前IP为 :".$dip);
if ($city == "内网IP"){
    $city="未知城市";
    print_r("当前城市为:未知");
}else{
    print_r("当前城市为:".$city);
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
    <title>luosilent天气查询</title>
    <script type="text/javascript" src="http://libs.baidu.com/jquery/2.1.4/jquery.min.js"></script>
    <script language="javascript">
        function getWeather() {
            if ($('#city').val() == "") {
                $('#msg').html("请输入城市名称再查询!");
                $('#city').focus;
                return false;
            }
            ajax_post();
        }

        function ajax_post() {
            $.post("getWeather.php", {city: $('#city').val()},
                function (data) {
                    //$('#msg').html("please enter the city!");
                    // alert(data);
                    $('#msg').html(data);
                },
                "text");//这里返回的类型有：json,html,xml,text
        }
    </script>
</head>
<body>

<form style="text-align:center;font-size:2rem;" id="ajaxform" name="ajaxform" method="post" action="getWeather.php">
        <p>
            请输入城市名称：<input style="font-size:2rem;" type="text" name="city" id="city" value="<?=$city?>" size="10"/>
        </p>
        <p>
            <input style="display:none"><!--防止回车键自动提交表单-->
        </p>

        <p>
            <input style="font-size:2rem;" name="submit" type="button" value="天气查询" onclick="return getWeather()"/>
        </p>
        <p id="msg"></p>
</form>
</body>
</html>
