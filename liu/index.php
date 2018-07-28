<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * 有些PHP版本不同可能有
 * 当前版本 PHP5.6
 */
require_once 'Connect.php';
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
        <h3 class="text-center">最新开奖</h3>
        <table class="table table-bordered table-striped ">
            <tr>
                <th class="success ">开奖日期</th>
                <th class="success ">小码</th>
                <th class="success ">特码</th>
                <th class="success ">下期开奖</th>
            </tr>
            <?php
            $conn = conn();
            $sql = "SELECT  *  from `liu`  order by `stime` desc limit 0,1 ;";
            $result1 = $conn->prepare($sql);
            if ($result1->execute()) {
                while ($row = $result1->fetch()) {
                    echo '<tr><td>' . $row['stime'] . '</td>';
                    echo '<td>' . $row['small'] . '</td>';
                    echo '<td>' . $row['big'] . '</td>';
                    echo '<td >' . $row['etime'] . '</td></tr>';
                }
            }
            ?>
        </table>
        <h3 class="text-center">最长记录</h3>
        <table class="table table-bordered table-striped ">
            <tr>
                <th class="success ">上次开奖</th>
                <th class="success ">小码</th>
                <th class="success ">特码</th>
                <th class="success ">距今</th>
            </tr>
            <?php
            for ($i = 1; $i < 50; $i++) {
            $sql22 = "SELECT  *  from `liu` where `big` = '{$i}' limit 0,1 ;";
            $stmt = $conn->prepare($sql22);
            $stmt->execute();
            while ($row = $stmt->fetch()) {

                $sTime = strtotime($row['stime']);
                $now = strtotime(date("y-m-d"));
                $dDime = ceil($now - $sTime) / 86400;
            }
            $arr[] = $dDime;
            }
            $biggest = max($arr);$key = array_search(max($arr),$arr);
            $num = $key+1;
            $sql33 = "SELECT  *  from `liu` where `big` = '{$num}' limit 0,1 ;";
            $stmt = $conn->prepare($sql33);
            $stmt->execute();
                while ($row = $stmt->fetch()) {
                    echo '<tr><td>' . $row['stime'] . '</td>';
                    echo '<td>' . $row['small'] . '</td>';
                    echo '<td>' . $row['big'] . '</td>';
                    echo '<td >' . $biggest . '天</td></tr>';
                }
            ?>
        </table>

        <h3 class="text-center">查询信息</h3>
        <table class="table table-bordered table-striped ">



            <?php

            $sql2 = "SELECT * FROM `liu` where 1 = 1 ";
            if ($_GET["word1"] && !($_GET["word2"] && !($_GET["word3"]))) {
                $sql2 .= "and stime ='{$_GET['word1']}' limit 0,5";
            } elseif ($_GET["word2"] && !($_GET["word1"] && !($_GET["word3"]))) {
                $sql2 .= "and big ='{$_GET['word2']}' limit 0,5";
            } elseif ($_GET['word3'] && !($_GET["word2"] && !($_GET["word1"]))) {
                $sql2 .= "and big = '{$_GET['word3']}' limit 0,1";
            } else {
                $sql2 .= "order by `stime` desc limit 0,5;";
            }

            try {
                $result = $conn->prepare($sql2);
                $res = $result->execute();
                $row = $result->fetch();
                $num = $result -> rowCount();
                if ($result->rowCount()) {
                    if ($num < 2) {
                        echo "<tr><th>上次的开奖时间</th>
                                    <th>小码</th>
                                    <th>特码</th></tr>";
                        $sTime = strtotime($row['stime']);
                        $now = strtotime(date("y-m-d"));
                        $dDime = ceil($now - $sTime)/86400;
                        echo '<tr><td>' . $row['stime'] . '</td>';
                        echo '<td>' . $row['small'] . '</td>';
                        echo '<td>' . $row['big'] . '</td></tr>';
                        echo "<tr><th>距今</th>
                                    <th>小码</th>
                                    <th>特码</th></tr>";
                        echo "</tr><td>$dDime 天</td>";
                        echo '<td>' .$row['small'] .'</td>';
                        echo '<td>' . $row['big'] .'</td></tr>';
                    }
                    if ($num > 2) {
                        echo "<tr><th>开奖日期</th>
                                    <th>小码</th>
                                    <th>特码</th></tr>";
                        while ($row = $result->fetch()) {
                            echo '<tr><td>' . $row['stime'] . '</td>';
                            echo '<td>' . $row['small'] . '</td>';
                            echo '<td>' . $row['big'] . '</td></tr>';
                        }
                    }
                }
                 else {
                    echo("<td> 输入错误 </td><td>请重新输入</td><td>找不到数据</td></tr>");
                }
            } catch (PDOException $e) {
                echo("<td> 输入错误 </td><td>请重新输入</td><td>找不到数据</td></tr>");
            }

            ?>
        </table>
        <h2>开奖查询</h2>
        <form id="input" method="get" style="margin-top: 20px;">

            <div>
                <label>日期查询:</label>
                <input class="input " style="width: 100%;margin-bottom: 20px" name="word1"
                       placeholder="输入日期，如：2018-07-01">
            </div>

            <div>
                <label>特码查询:</label>
                <input class="input" style="width: 100%;margin-bottom: 20px"" name="word2" placeholder="输入特码，如：1-49">
            </div>
            <div>
                <label>查询特码开奖距离现在多久:</label>
                <input class="input" style="width: 100%;" name="word3" placeholder="输入数据，如：1-49">
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 20px">查询</button>

        </form>


    </div>
</div>
 

</body>
</html>
