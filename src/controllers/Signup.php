<?php

namespace Controllers;

class Signup extends Controller
{
    public function signup()
    {
        echo $this->twig->render('signup.html.twig');
    }
}
