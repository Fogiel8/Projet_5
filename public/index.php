<?php
// autoload
require '../vendor/autoload.php';

session_start();

use Controllers\ArticleController;
use Controllers\CommentController;
use Controllers\Controller;
use Controllers\ErrorController;
use Controllers\HomeController;
use Controllers\LoginController;

$action = $_GET['action'] ?? '';

try {
    switch ($action) {
        case '':
            $controller = new HomeController();
            $controller->homePage();
            break;
        case 'contact':
            $controller = new HomeController();
            $controller->sendEmail();
            break;
        case 'list-articles':
            $controller = new ArticleController();
            $controller->listArticles();
            break;
        case 'add-article':
            $controller = new ArticleController();
            $controller->createArticle();
            break;
        case 'show-article':
            $controller = new ArticleController();
            $controller->showArticle();
            break;
        case 'edit-article':
            $controller = new ArticleController();
            $controller->editArticle();
            break;
        case 'delete-article':
            $controller = new ArticleController();
            $controller->deleteArticle();
            break;
        case 'comment':
            $controller = new CommentController();
            $controller->createComment();
            break;
        case 'admin':
            $controller = new CommentController();
            $controller->adminPage();
            break;
        case 'approve-comment':
            $controller = new CommentController();
            $controller->approveComment();
            break;
        case 'disapprove-comment':
            $controller = new CommentController();
            $controller->disapproveComment();
            break;
        case 'login':
            $controller = new LoginController();
            $controller->login();
            break;
        case 'profile':
            $controller = new LoginController();
            $controller->profile();
            break;
        case 'logout':
            $controller = new LoginController();
            $controller->logout();
            break;
        case 'signup':
            $controller = new LoginController();
            $controller->signup();
            break;
        case 'signup-submit':
            $controller = new LoginController();
            $controller->signupSubmit();
            break;
        case 'legals':
            $controller = new Controller();
            $controller->legals();
            break;
        case 'privacy-policy':
            $controller = new Controller();
            $controller->privacyPolicy();
            break;
        case 'cookies-policy':
            $controller = new Controller();
            $controller->cookiesPolicy();
            break;
        default:
            header("HTTP/1.0 404 Not Found");
            $controller = new ErrorController();
            $controller->error404();
            break;
    }
} catch (\Exception $exception) {
    $controller = new ErrorController();
    $controller->error500($exception);
}

$_SESSION['errors'] = [];
