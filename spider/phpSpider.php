<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/6/27
 * Time: 13:36
 */
header('Content-type:text/html;charset=utf-8');



$url = $_GET['url'];
$pattern = $_GET['pattern'];


/**
 * Class Spider
 */
class Spider {

    /**
     * @param $url
     * @return bool|string
     */
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
    public function extract($content,$pattern){
        $matches = array();
        preg_match_all($pattern,$content,$matches);
        // preg_match 函数的结果是数组的形式
        return $matches;
    }

    /**
     * @param $reArr
     * @param $fen
     */
    public function saveInfo($reArr,$fen){
        $myFile = fopen('result.txt','w') or die ("Unable to open file!");
        for($i=0;$i<count($reArr);$i++){
            fwrite($myFile,$reArr[$i].$fen);
        }
        fclose($myFile);
    }

    /**
     * @param $username
     * @param $password
     * @param $dbName
     */ 
    public function connect($username,$password,$dbName){
        $link = mysqli_connect('localhost',$username,$password);
        $choose = mysqli_select_db($dbName,$link);
        if (!$choose) {
            die("Connection failed: " . mysqli_connect_error());
        }

    }


    /**
     * @param $link
     * @param $sql
     * @return string
     */
    public function insetInfo($link,$sql){
        $query = mysqli_query($link,$sql);
        if($query && mysqli_affected_rows($link)>0){
            return "数据添加成功";
        }else{
            return "数据添加失败";
        }
    }

    /**
     * @param $pattern
     * @return int
     */
    public function countPat($pattern){
        $reCount = substr_count($pattern,'(.*?)');
        return $reCount;
    }

    /**
     * @return array|mixed
     */
    public function testDemo(){
        $url = "http://php.net/manual/zh/funcref.php";
        $op =  self::getContent($url);
        $pattern =  '/<a href="(.*?)">(.*?)<\/a>/';
        $reinFo = self::extract($op,$pattern);
        $countNum = self::countPat($pattern);
        $reinFo = $reinFo[$countNum];
        return $reinFo;
    }

    /**
     * @param $url
     * @param $pattern
     * @return mixed
     */
    public function returnAll($url,$pattern){
        
        $serverName = "localhost";
        $username = "root";
        $password = "root";
        $dbName = "spider";
        $charset = 'utf8';


        $op = self::getContent($url);
        $reinFo = self::extract($op,$pattern);
        $countNum = self::countPat($pattern);
        $reinFo = $reinFo[$countNum];
//        $reinFo = $reinFo[1];
        $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $username, $password);
        $conn->query("set NAMES $charset");
        $i = 0;
        foreach ($reinFo as $key => $value) {
           
           // $arr[$i] = $value;
            // $i++;
            //$v = $value;
            // $sql = "INSERT INTO dy (id,user)
            // VALUES ('".$i."', '".$v."')";

            // $sql = "INSERT INTO dyView (id, view)
            // VALUES ('".$i."','".$v."')";

            // /<span class="impress-tag-item" .*?[^>]*>(.*?)<\/span>/i

            // $sql = "INSERT INTO dyKey(id, kw)
            // VALUES ('".$i."','".$v."')";


            //echo $sql;
            echo ($key+1).'.'.$value."<br>";
            //$sth = $conn->prepare($sql);
             //$sth->execute();        
        }
            
       
             
             
    }

}


$crawler = new Spider();
$re = $crawler -> returnAll($url,$pattern);
