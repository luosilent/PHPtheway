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
    <link rel="stylesheet"
          href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">

</head>
<body>

<div class="container">                
    <div class="list-group">
        <h3 class="text-center">最新开奖</h3>
        <table class="table table-bordered table-striped ">
            <tr><th class="success ">开奖日期</th>
                <th class="success ">小码</th>
                <th class="success ">特码</th>
                <th class="success ">下期开奖</th></tr>
            <?php
            $conn = conn();
            $sql = "SELECT  *  from `liu`  order by `stime` desc limit 0,1 ;";
            $result1 = $conn -> prepare($sql);
            if ($result1->execute())
            {
            while ($row = $result1->fetch()) {
            echo '<tr><td>' . $row['stime'] . '</td>';
            echo '<td>' . $row['small'] . '</td>';
            echo '<td>' . $row['big'] . '</td>';
            echo '<td >' . $row['etime'] . '</td></tr>';
            }
            }
            ?>
        </table>

        <h3 class="text-center">查询信息</h3>
            <table class="table table-bordered table-striped ">

                <tr><th>开奖日期</th>
                    <th>小码</th>
                    <th>特码</th></tr>

                <?php
                if(!$_GET["word1"] && !$_GET["word2"]){
                    $sql2 = "SELECT  *  from `liu`  order by `stime` desc limit 1,5;";
                }else {
                    $sql2 = "SELECT * FROM `liu` where 1 = 1 ";
                    if ($_GET["word1"]) {
                        $sql2 .= "and stime ='{$_GET['word1']}' limit 0,5";
                    }
                    if ($_GET['word2']) {
                        $sql2 .= "and big ='{$_GET['word2']}' limit 0,5";
                    }

                }
                try {
                    $result = $conn->prepare($sql2);
                    $res = $result->execute();

                    if ($result->rowCount()) {
                        while ($row = $result->fetch()) {
                            echo '<tr><td>' . $row['stime'] . '</td>';
                            echo '<td>' . $row['small'] . '</td>';
                            echo '<td>' . $row['big'] . '</td></tr>';
                        }
                    }else{
                        echo("<td> 输入错误 </td><td>请重新输入</td><td>找不到数据</td></tr>");
                    }
                }catch(PDOException $e){
                    echo("<td> 输入错误 </td><td>请重新输入</td><td>找不到数据</td></tr>");
                }

                ?>
            </table>
            <h2>开奖查询</h2>
            <form id="input" method="get" style="margin-top: 20px;">

                <div>
                    <label >日期查询:</label>
                    <input class="input " style="width: 100%;margin-bottom: 20px" name="word1" placeholder="输入日期，如：2018-07-01">
                </div>

                <div>
                    <label >特码查询:</label>
                    <input  class="input" style="width: 100%;" name="word2" placeholder="输入特码，如：1-49">
                </div>
                <button type="submit"  class="btn btn-primary" style="width: 100%; margin-top: 20px">查询</button>

            </form>



    </div>
</div> 

</body>
</html>
