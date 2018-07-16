<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/6/28
 * Time: 上午8:55
 */

/**
 * 下载所有PHP 函数相关页面包括(function,ref,refs,book)
 */
require './vendor/autoload.php';

use phpspider\core\phpspider;
use phpspider\core\selector;
use phpspider\core\log;

/* Do NOT delete this comment */
/* 不要删除这段注释 */

$config = array(
    'name' => 'PHP 函数',
    'log_show' => true,
    'log_file' => 'data/log/download.log',
    'input_encoding' => 'UTF-8',
    'output_encoding' => 'UTF-8',
    'user_agent' => phpspider::AGENT_PC,
    'domains' => array(
        'secure.php.net'
    ),
    'scan_urls' => array(
        'https://secure.php.net/manual/en/funcref.php'
    ),
    'list_url_regexes' => array(
        "refs.[a-zA-Z_.0-9\-]+.php$",
        "book.[a-zA-Z_.0-9\-]+.php$",
        "ref.[a-zA-Z_.0-9\-]+.php$",
        "set.[a-zA-Z_.0-9\-]+.php$",
    ),
    'content_url_regexes' => array(
        'function.[a-zA-Z_0-9.\-]+.php$'
    ),
    'fields' => array(
    ),
    'page_path' => realpath(__DIR__) . '/data/page/',

);

$spider = new phpspider($config);

$spider->on_fetch_url = function ($url, phpspider $spider) {

    //判断URL 中是否包含以下4个关键字 (ref,refs,book,function),如果包含则处理 URL否则抛弃。
    if (preg_match('/\/(set|ref|refs|book|function)\./i', $url)) {
        if (strpos($url, '?') === false) {
            $man = "manual/";
            // 如果URL 不包含 en/ 关键字，则补上
            if (($pos = strpos($url, 'en/')) === false && ($man_pos = strpos($url, $man)) !== false) {
                $new_url = substr($url, 0, $man_pos + strlen($man))
                    . 'en/'
                    . substr($url, $man_pos + strlen($man));

                $log = sprintf("Url not include 'en':%s,New url:%s\n", $url, $new_url);
                log::warn($log);
                $url = $new_url;
            }

            return $url;
        }
    } else {
        //记录到URL日志里
        $log = sprintf("Url not include key words:%s\n", $url);
        log::warn($log);
    }

    return false;
};

// 如果响应代码时200,则继续处理页面，否则抛弃
$spider->on_status_code = function ($status_code, $url, $content, phpspider $spider) {
    if ($status_code == '200') {
        return $content;
    } else {
        //记录到响应状态日志里
        $log = sprintf("Error status url:%s, Status_code:%s\n", $url, $status_code);
        log::warn($log);
    }

    return false;
};

//URL里包含以下关键字 (ref,refs,book) 时才继续爬页面里的 url
$spider->on_content_page = function ($page, $content, phpspider $spider) {
    if (!preg_match('/(ref|refs|book|set)\./i', $page['url'])) {
        return false;
    }
};

// 从页面内容去掉右侧菜单栏部分
$spider->on_download_page = function ($page, phpspider $spider) {

    $page['raw'] = selector::remove($page['raw'], "//aside[@class='layout-menu']");
    $url = $page['url'];
    if (($pos = strpos($url, 'en/')) !== false) {
        $file_name = substr($url, $pos + 3) . ".html";

        if (($dot_pos = strpos($file_name, '.')) !== false) {
            $dir = substr($file_name, 0, $dot_pos);
            $file_name = $dir . "/" . substr($file_name, $dot_pos + 1);
        }
        $file_name = $spider->get_config('page_path') . $file_name;

        file_put_contents($file_name, $page['raw']);
    }

    return $page;
};

$spider->start();