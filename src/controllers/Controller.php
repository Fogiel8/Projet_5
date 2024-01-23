<?php

namespace Controllers;

use Models\UserManager;
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

    protected function isSubmit(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === "POST";
    }

    protected function redirectTo(string $action): void
    {
        header('Location:index.php?action=' . $action);
        exit;
    }

    protected function twigFunction()
    {
        $session = new \Twig\TwigFunction('session', function ($what) {

            return $_SESSION[$what];
        });

        $this->twig->addFunction($session);
    }
}
