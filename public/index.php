<?php

// autoload

require '../vendor/autoload.php';

use Controllers\AddPost;
use Controllers\AdminPage;
use Controllers\EditPost;
use Controllers\Home;
use Controllers\PostsList;
use Controllers\Login;
use Controllers\Post;
use Controllers\Error;

$action = $_GET['action'] ?? '';


// ou match ? avec php 8

// match ($action) {
//     'Post' => (new Post())->postAction(),
//     default => (new Home())->home(),
// };
switch ($action) {
    case '':
        $controller = new Home();
        $controller->home();
        break;
    case 'postsList':
        $controller = new PostsList();
        $controller->postsList();
        break;
    case 'login':
        $controller = new Login();
        $controller->login();
        break;
    case 'adminPage':
        $controller = new AdminPage();
        $controller->adminPage();
        break;
    case 'post':
        $controller = new Post();
        $controller->post();
        break;
    case 'editPost':
        $controller = new EditPost();
        $controller->editPost();
        break;
    case 'addPost':
        $controller = new AddPost();
        $controller->addPost();
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        $controller = new Error();
        $controller->error404();
        break;
}
