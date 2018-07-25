<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/19
 * Time: 9:01
 */

class fetchData {

    public function tuandai($url){

        $fcontents=file_get_contents($url);
        preg_match_all('/<table class=\"auto-style4\">(.*?) <\/table>/si',$fcontents,$match);
        $table_data = $match[0][0];
//        print_r($table_data);exit;
        return $table_data;

    }

}
$da = new fetchData;
$arr = $da ->tuandai("https://www.lotto-8.com/listltohk.asp");
preg_match_all('/<td class=\".*\" .*>(.*?)<\/td>/si',$arr,$ma);
//        print_r($ma);exit;
preg_match_all('/<tr style=\"text-align:center; .*\">(.*?)<\/tr>/si',$ma[0][0],$ma1);
preg_match_all('/<td .*>(.*?)<\/td>/si',$ma1[0][0],$ma2);

print_r($ma2);