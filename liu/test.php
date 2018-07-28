<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/27
 * Time: 21:10
 */
function conn()
{
    $driver = 'mysql';
    $host = 'localhost';
    $dbName = 'spider';
    $charset = 'utf8';
    $dsn = "$driver:host=$host;dbName=$dbName;$charset";
    $uName = "root";
    $pWord = "root";
    try {
        $conn = new PDO($dsn, $uName, $pWord);
        $conn->exec("set names utf8;");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("use $dbName");
    } catch (PDOException $e) {
        $error = $e->getMessage();
        echo $error;
    }

    return $conn;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP爬虫数据</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="navbar navbar-inverse navbar-static-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!-- 确保无论是宽屏还是窄屏，navbar-brand都显示 -->
        <a class="navbar-brand" href="#">Luosilent</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-responsive-collapser">
            <li><a href="http://bbs.luosilent.top/getWeather/weather.php">天气查询</a></li>
            <li class="active dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    开奖信息
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="http://localhost/PHPtheway/liu/index.php">开奖查询</a></li>
                    <li><a href="http://localhost/PHPtheway/liu/test.php">更多信息</a></li>
                </ul>
            </li>
            <li><a href="#about">待开发</a></li>
        </ul>
    </div>
</div>

<div class="container">                
    <div class="list-group">
        <h3 class="text-center">更多信息</h3>
        <table class="table table-bordered table-striped ">

            <?php
            $conn = conn();
            for ($i = 1; $i < 50; $i++) {
                $sql = "SELECT  *  from `liu` where `big` = '{$i}' limit 0,1 ;";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                while ($row = $stmt->fetch()) {

                    $sTime = strtotime($row['stime']);
                    $now = strtotime(date("y-m-d"));
                    $dDime = ceil($now - $sTime) / 86400;
                    echo "<tr><th>开奖时间</th>
                        <th>小码</th>
                        <th>特码</th></tr>";
                    echo '<tr><td>' . $row['stime'] . '  距今' . $dDime . '天</td>';
                    echo '<td>' . $row['small'] . '</td>';
                    echo '<td>' . $row['big'] . '</td></tr>';
                }

            }

            ?>

        </table>
    </div>
</div>
 


</body>
</html>
