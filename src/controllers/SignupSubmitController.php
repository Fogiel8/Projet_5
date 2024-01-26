<?php

namespace Controllers;

use Models\UserManager;

class SignupSubmitController extends Controller
{
    public function signupSubmit()
    {
        $userManager = new UserManager();

        $user = $userManager->getUserById($_SESSION['user_id']);

        echo $this->twig->render('signup-submit.html.twig', ['user' => $user]);
    }
}
