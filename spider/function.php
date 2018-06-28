<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/6/27
 * Time: 10:51
 */
header('Content-type:text/html;charset=utf-8');

$url = $_GET['url'];

$pat = $_GET['pat'];

//封装了一些PHP爬虫的类,里面是一些爬虫常用的函数
class cuteCrawler {

    /*
     *@:brief获取网页源代码的函数
     */
    public function getContentByFilegetcontents($url){

        $content = file_get_contents($url);

        return $content;
    }

    /*
     *@:brief进行字符串的匹配的函数
     */
    public function extract($content,$pat){

        $matches = array();

        preg_match_all($pat,$content,$matches);

        return $matches;
        //注意在外边要在这结果的后边加上[0] 或者[1].....
    }

    /*
     *@:brief将最后用正则得到的结果保存到txt文本中
     *@:$reArr 是一个索引数组的资源集合
     *@:$fengefu 是结果集中的中间分隔符号
     */
    public function saveInfo($reArr,$fengefu){

        $myfile = fopen('result.txt','w') or die ("Unable to open file!");

        for($i=0;$i<count($reArr);$i++){

            fwrite($myfile,$reArr[$i].$fengefu);

        }

        fclose($myfile);

    }

    /**
     * @brief:这个是连接数据库的函数
     * @sqlName:是需要你选择的数据库
     */
    public function linkSql($username,$password,$sqlName){

        $link = mysql_connect('localhost',$username,$password);

        $choose = mysql_select_db($sqlName,$link);

        if (!$choose) {
            return  mysql_error();
        }

    }

    /**
     * @brief:这个是向数据库中添加数据的函数
     */
    public function insetInfo($sql){

        $query = mysql_query($sql);

        if($query && mysql_affected_rows()>0){

            return "数据添加成功";
        }else{
            return "数据添加失败";
        }
    }

    /**
     * @brief:判断用户的正则表达式中有多少个(.*?)
     */
    public function countPat($pat){

        $reCount = substr_count($pat,'(.*?)');

        return $reCount;

    }

    /**
     * @brief:测试各个函数并且返回最后的结果(仅供测数据试使用)
     */
    public function testDemo(){

        $url = "http://www.budejie.com/text/4";

        $opop =  self::getContentByFilegetcontents($url);

        $pat =  '/<a href="\/detail-(.*?).html">(.*?)<\/a>/';

        $reinfo = self::extract($opop,$pat);

        $countNum = self::countPat($pat);

        $reinfo = $reinfo[$countNum];

        return $reinfo;
    }

    /**
     * @brief:返回传入值后的最终结果的函数(也就是用户看到的最终数据)
     */
    public function returnAll($url,$pat){

        $opop = self::getContentByFilegetcontents($url);

        $reinfo = self::extract($opop,$pat);

        $countNum = self::countPat($pat);

        $reinfo = $reinfo[$countNum];

        foreach ($reinfo as $key => $value) {

            echo ($key+1).'-->'.$value.'';
        }

    }

}


//类的实例化
$crawler = new cuteCrawler();

///调用结果
$rereop = $crawler -> returnAll($url,$pat);