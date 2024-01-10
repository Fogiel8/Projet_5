<?php

namespace Controllers;

use App\PasswordManager;
use Models\UserManager;
use Models\User;

class SignupSubmit extends Controller
{
    // 1. Vérifier les données du formulaire
    public function signupSubmit()
    {
        // Vérification si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupération des valeurs du formulaire
            $nom = $_POST["lastname"];
            $prenom = $_POST["firstname"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['errorEmail'] = 'email incorrect';
                header('location:index.php?action=signup');
                exit;
            }

            // 2. Se connecter à la BDD (utiliser un modèle ou une classe dédiée)
            $user = new User(['nom' => $nom, 'prenom' => $prenom, 'mot_de_passe' => PasswordManager::hashPassword($password), 'email' => $email, 'statut' => 'inscrit']);

            // 3. Importer les données dans la BDD
            $manager = new UserManager();
            $manager->createUser($user);

            echo $this->twig->render('signup-submit.html.twig', ['user' => $user]);
        }
    }
}
