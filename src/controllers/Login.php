<?php

namespace Controllers;

class Login extends Controller
{
    public function login()
    {
        echo $this->twig->render('login.html.twig');
    }
}
