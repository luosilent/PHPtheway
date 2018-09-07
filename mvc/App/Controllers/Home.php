<?php

namespace App\Controllers;

use Core\Controller;
use Core\View;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/11
 * Time: 15:27
 */
class Home extends Controller
{
    public function indexAction()
    {
        //echo "Home controller's index method";
        //throw new \Exception("test error");

        View::renderTemplate(
            'Home/index.html',
            [
                'name'   => 'luo silent',
                'colors' => ['white', 'black', 'blue']
            ]
        );
    }

    protected function before()
    {
        //        echo "home [before]";
        //        return false;
    }
}
