<?php
// autoload
require '../vendor/autoload.php';

session_start();

use Controllers\AddPostController;
use Controllers\ArticleSubmitController;
use Controllers\HomeController;
use Controllers\PostsListController;
use Controllers\PostController;
use Controllers\LoginController;
use Controllers\LoginSubmitController;
use Controllers\LogoutController;
use Controllers\SignupController;
use Controllers\SignupSubmitController;


function dd($data)
{
    echo '<pre>';
    var_dump($data);
    exit;
}
$action = $_GET['action'] ?? '';


switch ($action) {
    case '':
        $controller = new HomeController();
        $controller->home();
        break;
    case 'postsList':
        $controller = new PostsListController();
        $controller->postsList();
        break;
    case 'Post':
        $controller = new PostController();
        $controller->post();
        break;
    case 'login':
        $controller = new LoginController();
        $controller->login();
        break;
    case 'login-submit':
        $controller = new LoginSubmitController();
        $controller->loginSubmit();
        break;
    case 'logout':
        $controller = new LogoutController();
        $controller->logout();
        break;
    case 'signup':
        $controller = new SignupController();
        $controller->signup();
        break;
    case 'signup-submit':
        $controller = new SignupSubmitController();
        $controller->signupSubmit();
        break;
    case 'addPost':
        $controller = new AddPostController();
        $controller->addPost();
        break;
    case 'article-submit':
        $controller = new ArticleSubmitController();
        $controller->articleSubmit();
        break;
        // default:
        // header("HTTP/1.0 404 Not Found");
        // $controller = new Error();
        // $controller->error404();
        // break;
}
