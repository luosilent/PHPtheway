<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/11
 * Time: 17:18
 */

namespace Core;

use Twig_Environment;
use Twig_Loader_Filesystem;

class View
{
    /**
     * Render a view file
     *
     * @param string $view The view file
     * @param array  $args Associative array of data to display in the view
     *
     * @return void
     *
     * @throws \Exception
     */

    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);

        // relative to Core Directory
        $file = "../App/Views/$view";
        if (is_readable($file)) {
            require $file;
        } else {
            throw new \Exception("$file Not found");
        }
    }

    /**
     * Render a view template using Twig
     *
     * @param  string $template The view file
     * @param array   $args     Associative array of data to display in the view
     */
    public static function renderTemplate($template, $args = [])
    {
        static $twig = null;
        if ($twig === null) {
            $template_dir = dirname(__DIR__) . '/App/Views/';
            $cache_dir = $template_dir . '/twig_cache/';

            $loader = new Twig_Loader_Filesystem($template_dir);
            $twig = new Twig_Environment($loader, array(
                'cache' => $cache_dir,
            ));
            $twig = new Twig_Environment($loader);
        }
        echo $twig->render($template, $args);
    }
}
