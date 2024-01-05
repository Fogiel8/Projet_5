<?php

namespace Controllers;

use Models\User;
use Models\UserManager;

class SignupController extends Controller
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

            // 2. Se connecter à la BDD (utiliser un modèle ou une classe dédiée)
            $user = new User(['nom' => $nom, 'prenom' => $prenom, 'mot_de_passe' => $password, 'email' => $email, 'statut' => 'inscrit']);
            $manager = new UserManager();

            // 3. Importer les données dans la BDD
            $manager->createUser($user);
        }
    }
}
