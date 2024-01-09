<?php

namespace Controllers;

class SignupController extends Controller
{
    public function signup()
    {
        echo $this->twig->render('signup.html.twig');
    }
}
