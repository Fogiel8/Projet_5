<?php

namespace Controllers;

use Models\UserManager;
use Twig\Environment;
use Twig\Extension\CoreExtension;
use Twig\Extension\DebugExtension;
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
            return $_SESSION[$what] ?? null;
        });

        $this->twig->addFunction($session);

        $this->twig->addFunction(new \Twig\TwigFunction('flashMessages', function () {
            $messages =  $_SESSION['flashMessages'] ?? [];

            unset($_SESSION['flashMessages']);

            return $messages;
        }));
    }


    // Créer une function twig flash avec en argument $type égale soit success ou danger, lorsqu'un utilisateur est enregistré il faudrais mettre un message alert representant le type success ou danger. 

    public function addFlashMessage(string $type, string $message): void
    {
        $_SESSION['flashMessages'][] = ['type' => $type, 'message' => $message];
    }

    public function isValidForm(): bool
    {
        return empty($_SESSION['errors']) === true;
    }
}
