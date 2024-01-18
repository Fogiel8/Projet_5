<?php

namespace Controllers;

use Models\UserManager;

class Home extends Controller
{
    public function home()
    {
        echo $this->twig->render('homepage.html.twig');
    }
}
