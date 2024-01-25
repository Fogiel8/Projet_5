<?php

namespace Controllers;

use App\PasswordManager;
use Models\UserManager;
use Models\User;

class SignupSubmit extends Controller
{
    public function signupSubmit()
    {
        $userManager = new UserManager();

        $user = $userManager->getUserById($_SESSION['user_id']);

        echo $this->twig->render('signup-submit.html.twig', ['user' => $user]);
    }
}
