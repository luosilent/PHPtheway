<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/6/26
 * Time: 14:51
 */

header('Content-type:text/html;charset=utf-8');

$url = $_GET['url'];
$pattern = $_GET['pattern'];

/**
 * Class LuoSpider
 */
class LuoSpider
{


    public function getContent($url)
    {
        $content = file_get_contents($url);

        return $content;
    }

    /**
     * @param $content
     * @param $pattern
     * @return array
     */
    public function extract($content, $pattern)
    {
        $matches = array();
        preg_match_all($pattern, $content, $matches);

        // preg_match 函数的结果是数组的形式
        return $matches;
    }

    /**
     * @return PDO
     */
    public function conn()
    {

        $host = '127.0.0.1';
        $dbName = 'spider';
        $charset = 'utf8';
        $dsn = "mysql:host=$host;dbName=$dbName;charset=$charset";
        $uerName = "root";
        $password = "root";

        try {
            $conn = new PDO($dsn, $uerName, $password);
            $conn->query("set NAMES $charset");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //添加使用数据库
            $str = "use $dbName";
            $conn->exec($str);
        } catch (PDOException $e) {
            $error = "Access denied! ";
            $ext = $e->getMessage();
            echo $error . $ext;
        }

        return $conn;

    }

    /**
     * @param $pattern
     * @return int
     */
    public function countPat($pattern)
    {
        $reCount = substr_count($pattern, '(.*?)');

        return $reCount;
    }

    /**
     * @param $url
     * @param $pattern
     */
    public function returnAll($url, $pattern)
    {

        $conn = self:: conn();
        $op = self::getContent($url);
        $reinFo = self::extract($op, $pattern);
        $countNum = self::countPat($pattern);
        $reinFo = $reinFo[$countNum];
//         $reinFo = $reinFo[1];
        $i = 0;
        foreach ($reinFo as $key => $value) {

            $arr[$i] = $value;
            $i++;
            //$arr1 = array_chunk($arr, 4);

            //echo ($key + 1) . '.' . $value . "<br>";

//            存入user
            //user正则 /<span class="dy-name ellipsis fl">(.*?)<\/span>/
            // $sql = "INSERT INTO dyUser1 (id, user)
            // VALUES ('".$i."','".$v."')";

//            更新user
            $sql = "UPDATE `dyUser1` set `user` = '" . $value . "'
              where id= '" . $i . "'";

//            更新view
            //view正则 /<span class="dy-num fr"  >(.*?)<\/span>/
//            $sql = "UPDATE dyUser1 set view = '".$value."'
//              where id= '".$i."'";

//            更新keyWord
            //key正则 /<span class="impress-tag-item" .*?[^>]*>(.*?)<\/span>/i
            //$sql = "UPDATE dyUser1 set key = '" . $value . "'
            //   where id = '" . $i . "'";
//            echo ($key + 1) . '.' . $value . "<br>";
//            //echo $sql;exit;
            $stmt = $conn->prepare($sql);
            $stmt->execute();

        }
//        $i = 0;
//        foreach ($arr1 as $k => $dd) {
//            foreach ($dd as $d) {
//                $dd_arr[] = $d;
//            }
//            $list_dd = join(',', $dd_arr);
//            unset($dd_arr);
//            $i++;
//            $sql = "UPDATE `dyUser1` set `key` = '" . $list_dd . "'
//            where id = '" . $i . "'";
//            echo $sql;
//            $stmt = $conn->prepare($sql);
//            $stmt->execute();
//        }

    }
}

$crawler = new LuoSpider();
$re = $crawler->returnAll($url, $pattern);


