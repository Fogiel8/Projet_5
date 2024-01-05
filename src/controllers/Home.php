<?php

namespace Controllers;

class Home extends Controller
{
    public function home()
    {
        echo $this->twig->render('homepage.html.twig');
    }
}
