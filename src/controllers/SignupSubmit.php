<?php

namespace Controllers;

use Models\UserManager;
use Models\User;
use Models\DataBaseConnection;

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

            // 2. Se connecter à la BDD (utiliser un modèle ou une classe dédiée)
            $dataBaseConnection = new DataBaseConnection();
            $user = new User(['nom' => $nom, 'prenom' => $prenom, 'mot_de_passe' => $password, 'email' => $email, 'statut' => 'inscrit']);

            // 3. Importer les données dans la BDD
            $manager = new UserManager($dataBaseConnection->db);
            $manager->createUser($user);

            // 4. Récupération des données pour les afficher
            $nom = $_POST['lastname'];
            $prenom = $_POST['firstname'];
            $email = $_POST['email'];

            $userData = [
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
            ];

            $user = new User($userData);

            $_SESSION['user'] = $user;

            echo $this->twig->render('signup-submit.html.twig', ['user' => $user]);
        }
    }
}
