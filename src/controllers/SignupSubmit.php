<?php

namespace Controllers;

use App\PasswordManager;
use Models\UserManager;
use Models\User;

class SignupSubmit extends Controller
{
    //Vérification si le formulaire a été soumis CORRECTEMENT
    public function signupSubmit()
    {
        $userManager = new UserManager();

        $user = $userManager->getUserById($_SESSION['user_id']);

        // V. Rendre la vue avec $user qui est l'objet User, dont la variable twig s'appelle user
        echo $this->twig->render('signup-submit.html.twig', ['user' => $user]);
    }
}
