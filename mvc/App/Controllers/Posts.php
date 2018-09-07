<?php

namespace App\Controllers;

use App\Models\Post;
use Core\Controller;
use Core\View;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/11
 * Time: 15:07
 */
class Posts extends Controller
{
    public function indexAction()
    {
        $posts = Post::getAll();

        View::renderTemplate('Posts/index.html', ['posts' => $posts]);
    }

    public function addNewAction()
    {
        echo "Hello from the add-new action in the Posts controller!";
    }

    public function editAction()
    {
        echo 'Hello from the edit action in the Posts controller!';
        echo '<p>Route parameters: <pre>'
            . htmlspecialchars(print_r($this->route_params, true))
            . '</pre></p>';
    }
}
