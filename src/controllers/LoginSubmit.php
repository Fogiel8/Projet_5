<?php

namespace Controllers;

use App\PasswordManager;
use Models\User;
use Models\UserManager;

class LoginSubmit extends Controller
{
    public function loginSubmit()
    {
        // 1. Vérifier que le formulaire a été envoyé
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // 2. Récupérer les données du formulaire
            $email = $_POST['loginEmail'];
            $password = $_POST['loginPassword'];

            // 3. Connexion à la BDD et chercher si l'email existe
            $userManager = new UserManager;
            $userManager->getUserByEmail($email);

            // 4. Comparer le mot de passe hashé avec le mot de passe envoyé
            $userManager->authenticate($email, $password);

            // 5. Si tout est correct, rediriger l'utilisateur
            if ($userManager->authenticate($email, $password)) {
                header('Location: index.php?action=');
                exit;
            }
        }
    }
}
