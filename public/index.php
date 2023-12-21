<?php

// autoload

use Controllers\Home;

require '../vendor/autoload.php';

$action = $_GET['action'] ?? '';

switch ($action) {
    case '':
        $controller = new Home();
        $controller->home();
        break;
}
