<?php

namespace Controllers;

class HomeController extends Controller
{
    public function home()
    {
        echo $this->twig->render('homepage.html.twig');
    }
}
