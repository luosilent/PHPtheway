<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/1
 * Time: 下午2:24
 */
require './vendor/autoload.php';

use phpspider\core\db;
use phpspider\core\log;
use League\HTMLToMarkdown\HtmlConverter;


//配置日志文件位置
log::$log_file = 'data/log/parse.log';

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
//------------数据库配置部分结束-----------------

$dir = __DIR__ . '/data/page/function';
parsePage($dir);

/**
 * 爬函数 HTML 页面
 * @param $dir
 */
function parsePage($dir)
{
    $pages = getPageFiles($dir);
    foreach ($pages as $page) {

        //获取函数 uri
        $uri = substr($page, strrpos($page, '/') + 1);
        $uri = substr($uri, 0, strlen($uri) - strlen('.html'));

        // 获取函数名称
        $name = str_replace('function.', '', $uri);
        $name = str_replace('.php', '', $name);
        $name = str_replace('-', '_', $name);

        $content = file_get_contents($page);
        $refEntryPattern = '#<div id="function\.(.+)?" class="refentry">(.+)<section id="usernotes">#is';
        if (preg_match($refEntryPattern, $content, $refEntryMatches)) {
            //$functionName = $refEntryMatches[1];
            $refEntry = $refEntryMatches[2];

            $breadCrumb = parseBreadCrumbs($page, $content);
            // 函数信息分段
            $entries = explode('refsect1-function', $refEntry);
            $columnContents = getColumnContents($entries);

            $columnContents = db::strsafe($columnContents);

            $columnContents['name'] = $name;
            $columnContents['uri'] = $uri;
            $columnContents['category'] = $breadCrumb['id'];

            db::delete('php_function', "`name`='" . $name . "'");
            db::insert('php_function', $columnContents);

        } else {
            log::warn($uri . ",parse error!");
        }
        echo "parse function:" . $name . "\n";
    }
}

/**
 * 获取所有有效函数文件完整路径
 * @param $dir
 * @return array
 */
function getPageFiles($dir)
{
    $pageFiles = array();
    $fileArray = scandir($dir);
    foreach ($fileArray as $fileName) {
        if ($fileName != '.' && $fileName != '..') {
            $fullName = $dir . "/" . $fileName;
            $pageFiles[] = $fullName;
        }
    }

    return $pageFiles;
}

/**
 * 获取函数详细信息
 *
 * @param $entries
 * @return array
 */
function getColumnContents($entries)
{
    //创建 markdown 转换器
    $converter = new HtmlConverter(array(
            'strip_tags' => true,
            'hard_break' => true
        )
    );
    $columns = [
        'refnamediv',
        'description',
        'parameters',
        'returnvalues',
        'examples',
        'notes',
        'seealso'
    ];

    $columnContents = [];
    foreach ($entries as $entry) {
        foreach ($columns as $index => $column) {
            $columnPattern = '#' . $column . '">(.+)<\/div>\s*(<div class="refsect1|<\/div>\s*$)#isu';
            if (preg_match($columnPattern, $entry, $columnMatches)) {
                $columnContent = $columnMatches[1];
                // 转换为markdown 格式文本
                $columnContents[$column] = $converter->convert($columnContent);
            } else {
                continue;
            }
        }
    }

    return $columnContents;
}

/**
 * 获取函数分类信息
 *
 * @param $uri
 * @param $content
 * @return array
 */
function parseBreadCrumbs($uri, $content)
{
    //1. 获取id=breadcrumbs-inner 的 div 元素的内容
    $pattern = '#<div id="breadcrumbs-inner">(.+?)<ul>(.+?)<\/ul>(.+?)<\/div>\n*<div id="layout"#is';
    preg_match($pattern, $content, $matches);

    if (isset($matches[2])) {
        $breadcrumbs = $matches[2];
        //var_dump($matches);

        //分别解析 分类名称 和对应的 URI
        $uriPattern = "#href='(.+?)'#is";
        $namePattern = "#'>(.+?)<\/a></li>#is";
        preg_match_all($uriPattern, $breadcrumbs, $uriMatches);
        preg_match_all($namePattern, $breadcrumbs, $nameMatches);

        $uris = $uriMatches[1];
        $names = $nameMatches[1];

        $row = [];
        //保存到 function_category 数据表里(需要保证唯一性)
        foreach ($uris as $index => $uri) {
            $row = db::get_one("SELECT * FROM `function_category` WHERE `uri`='" . $uri . "'");
            if (count($row) == 0) {
                $data = array(
                    'name' => $names[$index],
                    'uri' => $uri,
                    'level' => $index,
                    'parent' => '0'
                );
                //获取父类的 ID
                if (isset($uris[$index - 1])) {
                    $parentRow = db::get_one("SELECT * FROM `function_category` WHERE `uri`='" . $uris[$index - 1] . "'");
                    $data['parent'] = $parentRow['id'];
                }
                var_dump($data);
                $row = db::insert('function_category', $data);
            }
        }

        return $row;

    } else {
        log::warn($uri . ",breadcrumbs error!");
    }
}
