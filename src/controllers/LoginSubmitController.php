<?php

namespace Controllers;

use Models\UserManager;

class LoginSubmitController extends Controller
{
    public function loginSubmit()
    {
        // 1. Vérifier que le formulaire a été envoyé
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['loginEmail'];
            $password = $_POST['loginPassword'];

            // 2. Connexion à la BDD et chercher si l'email existe
            $userManager = new UserManager;
            $user = $userManager->getUserByEmail($email); // recupération de $userData qui contient le tableau avec toutes les données du user            

            if ($user->authenticate($password)) { // si le mot de passe correspond

                echo $this->twig->render('login-submit.html.twig', ['user' => $user]);
                exit;
            }

            echo $this->twig->render('login.html.twig', ['errors' => $user]);
        }
    }
}
