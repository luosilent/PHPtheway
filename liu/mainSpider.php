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
        preg_match_all('/<table[^>]*>(.*?) <\/table>/si',$fcontents,$match);
        $table_data = $match[0][0];

        return $table_data;

    }

}
$da = new fetchData;
$arr = $da ->tuandai("https://www.6494.com:888/history/");
preg_match_all('/<td class=\".*\">(.*?)<\/td>/si',$arr,$ma);

print_r($ma);