<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/12
 * Time: 下午4:50
 */

require './vendor/autoload.php';

use phpspider\core\requests;
use phpspider\core\selector;

//https://secure.php.net/manual/en/indexes.functions.php
/* Do NOT delete this comment */
/* 不要删除这段注释 */

require './vendor/autoload.php';
use phpspider\core\db;

//------------- 数据库配置部分------------------

$db_config = array(
    'host' => '127.0.0.1',
    'port' => 3306,
    'user' => 'root',
    'pass' => 'root',
    'name' => 'php',
);

// 数据库配置
db::set_connect('default', $db_config);

// 数据库链接
db::init_mysql();
//------------数据库配置部分结束---------------

$file = "./data/functions.php.html";

if (!file_exists($file)) {
    $html = requests::get('https://secure.php.net/manual/en/indexes.functions.php');
    file_put_contents($file, $html);
}
$html = file_get_contents($file);

//$data = selector::select($html, "//ul[contains(@class,'index-for-refentry')]//li//ul/li");
$pattern = '#<li><a href="([^\s]+)?"\s+class="index">(.*)<\/a>\s+-\s(.+)<\/li>#iu';
$data = preg_match_all($pattern, $html, $matches);

for ($i = 0; $i < count($matches[1]); $i++) {
    $columnData = [
        'uri' =>$matches[1][$i],
        'name' =>$matches[2][$i],
        'description' =>$matches[3][$i],
    ];
    $row = db::insert('function_list', $columnData);
}






