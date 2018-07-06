<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/6/26
 * Time: 14:51
 */



/**
 * Class DySpider
 */
class Spider
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

        return $matches;
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
     * @param $pat
     * @return array|mixed
     */
    public function returnAll($url, $pat)
    {
        $op = self::getContent($url);
        $reinFo = self::extract($op, $pat);
        $countNum = self::countPat($pat);
        $reinFo = $reinFo[$countNum];

        return $reinFo;

    }

}



