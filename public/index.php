<?php
// autoload
require '../vendor/autoload.php';

session_start();

use Controllers\AddPost;
use Controllers\ArticleSubmit;
use Controllers\Home;
use Controllers\PostsList;
use Controllers\Login;
use Controllers\LoginSubmit;
use Controllers\SignupController;
use Controllers\SignupSubmit;


function dd($data)
{
    echo '<pre>';
    var_dump($data);
    exit;
}
$action = $_GET['action'] ?? '';


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
    case 'loginSubmit':
        $controller = new LoginSubmit();
        $controller->loginSubmit();
        break;
    case 'signup':
        $controller = new SignupController();
        $controller->signup();
        break;
    case 'signup-submit':
        $controller = new SignupSubmit();
        $controller->signupSubmit();
        break;
    case 'addPost':
        $controller = new AddPost();
        $controller->addPost();
        break;
    case 'article-submit':
        $controller = new ArticleSubmit();
        $controller->articleSubmit();
        break;
        // default:
        // header("HTTP/1.0 404 Not Found");
        // $controller = new Error();
        // $controller->error404();
        // break;
}
