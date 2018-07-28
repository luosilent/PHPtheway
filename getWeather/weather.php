<!--by luosilent-->
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type"  name="viewport" content="width=device-width, charset=gb2312, initial-scale=1.0"/>
    <title>luosilent天气查询</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!-- 确保无论是宽屏还是窄屏，navbar-brand都显示 -->
        <a class="navbar-brand" href="http://localhost/php/PHPtheway/liu/index.html">Luosilent</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-responsive-collapser">
            <li><a href="http://localhost/php/PHPtheway/getWeather/weather.php">天气查询</a></li>
            <li><a href="http://localhost/php/PHPtheway/liu/index.html">天气查询</a></li>
            <li><a href="http://bbs.luosilent.top/lcg/index.php">开奖查询</a></li>
            <li><a href="#about">待开发</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    个人网站
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="http://luosilent.top/">博客</a></li>
                    <li><a href="http://bbs.luosilent.top/">论坛</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="container"> 
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <form role="form" id="ajaxform" name="ajaxform" method="post" action="getWeather.php">
                <div class="form-group">
                    <div style="margin-top: 35px;">
                        <label>天气查询:</label>
                        <input class="input " style="width:100%;margin-bottom: 10px" name="city" id="city" value="云霄"
                               placeholder="请输入城市">
                    </div>

                    <div>
                        <input style="display:none"><!--防止回车键自动提交表单-->
                    </div>
                    <input class="btn btn-primary" style="width:100%;margin-top: 10px" name="submit" type="button"
                           value="天气查询"
                           onclick="return getWeather()"/>
                    <div style="margin-top: 20px">
                        <p id="msg"></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

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
</body>
</html>
