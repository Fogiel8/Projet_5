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

        // Ajoute cette partie pour la gestion des sessions flash
        if (!isset($_SESSION['errors'])) {
            $_SESSION['errors'] = [];
        }

        $session = new \Twig\TwigFunction('session', function ($what) {
            if (isset($_SESSION[$what])) {
                $value = $_SESSION[$what];
                unset($_SESSION[$what]); // Supprime la session flash après utilisation
                return $value;
            }
        });

        $this->twig->addFunction($session);
    }
}
