<?php

namespace Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Controller
{

    protected Environment $twig;

    public function __construct()
    {
        $twigloader = new FilesystemLoader('../src/templates');
        $this->twig = new Environment($twigloader);
    }
}
