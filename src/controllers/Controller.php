<?php

namespace Controllers;

use DateTime;
use DateTimeZone;
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

    public function showCurrentDate()
    {
        $timezone = new DateTimeZone('Europe/Paris');
        $currentDate = new DateTime('now', $timezone);

        $this->twig->render('header.html.twig', ['currentDate' => $currentDate]);
    }

    protected function isSubmit(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === "POST";
    }

    protected function redirectTo(string $action, array $parameters = []): bool
    {
        $parameters = ['action' => $action] + $parameters;

        $queryString = http_build_query($parameters, '', '&', PHP_QUERY_RFC3986);

        header('Location: index.php?' . $queryString, true, 302);

        return true;
    }


    protected function twigFunction()
    {
        $session = new \Twig\TwigFunction('session', function ($what) {
            return $_SESSION[$what] ?? null;
        });

        $this->twig->addFunction($session);

        $this->twig->addFunction(new \Twig\TwigFunction('flashMessages', function () {
            $messages = $_SESSION['flashMessages'] ?? [];

            unset($_SESSION['flashMessages']);

            return $messages;
        }));

        $this->twig->addFunction(new \Twig\TwigFunction('user', function () {

            $user = null;
            if (!empty($_SESSION['user_id'])) {
                $userManager = new UserManager();
                $user = $userManager->getUserById($_SESSION['user_id']);
            }

            return $user;
        }));
    }

    public function addFlashMessage(string $type, string $message): void
    {
        $_SESSION['flashMessages'][] = ['type' => $type, 'message' => $message];
    }

    public function isValidForm(): bool
    {
        return empty($_SESSION['errors']) === true;
    }

    public function legals()
    {
        echo $this->twig->render('legals.html.twig');
    }

    public function privacyPolicy()
    {
        echo $this->twig->render('privacy-policy.html.twig');
    }

    public function cookiesPolicy()
    {
        echo $this->twig->render('cookies-policy.html.twig');
    }
}
