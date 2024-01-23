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

        $this->twigFunction();
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


    // Créer une function twig flash avec en argument $type égale soit success ou danger, lorsqu'un utilisateur est enregistré il faudrais mettre un message alert representant le type success ou danger. 

    public function flashMessage()
    {
        $type = empty($_SESSION['errors']);
        $success = '<div class="success"><p>Success</p>';
        $failed = '<div class="failed"><p>Failed</p>';

        if ($type) {
            echo $success;
        }

        echo $failed;
    }
}
