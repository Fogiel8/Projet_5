<?php

namespace Controllers;

use Models\UserManager;

class LoginController extends Controller
{
    public function login()
    {
        if ($this->isSubmit() === true) {
            // 1. Vérifier que le formulaire a été envoyé
            $email = $_POST['loginEmail'];
            $password = $_POST['loginPassword'];

            // 2. Connexion à la BDD et chercher si l'email existe
            $userManager = new UserManager();
            $user = $userManager->getUserByEmail($email); // recupération de $userData qui contient le tableau avec toutes les données du user            

            if ($user !== null) {
                if ($user->authenticate($password)) { // si le mot de passe correspond
                    $this->redirectTo('');
                }

                //récuperation $email et $password --> mettre dans un tableau $_SESSION

                $this->addFlashMessage('failed', 'erreur de mot de passe');
            } else {
                $this->addFlashMessage('failed', 'erreur email not exist');
            }
        }
        echo $this->twig->render('login.html.twig', ['errors' => []]);
    }
}
