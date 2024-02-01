<?php

namespace Controllers;

class ErrorController extends Controller
{
    public function error404()
    {
        echo $this->twig->render('error404.html.twig');
    }
}
