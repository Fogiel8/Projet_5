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
        // I.Vérification si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // I.1.Récupération des valeurs du formulaire
            $nom = $_POST["lastname"];
            $prenom = $_POST["firstname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            // I.2.Verrification si les valeurs respectent les contraintes
            if (strlen($nom) < 3) {
                $_SESSION['errors']['erreurNom'] = "Le nom d'utilisateur doit avoir au moins 3 caractères.";
            }
            exit;
            if (strlen($prenom) < 3) {
                $_SESSION['errors']['erreurPrenom'] = "Le prenom d'utilisateur doit avoir au moins 3 caractères.";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['errors']['erreurEmail'] = 'L\'adresse email est invalide, elle doit être sous la forme : adresse@mail.com.';
            }
            if (!empty($_SESSION['errors'])) {
                header('Location:index.php?action=signup');
                exit;
            }
        }
        // II.Rangement des valeurs "correctes" dans un tableau associatif (avec mot de passe hashé)
        $data = [
            'nom' => $nom,
            'prenom' => $prenom,
            'mot_de_passe' => PasswordManager::hashPassword($password),
            'email' => $email,
            'statut' => 'inscrit'
        ];
        // III. Création de l'objet User et attribution des données du tableau associatif
        $user = new User($data);

        // IV. Introduction des données dans la BDD
        $manager = new UserManager();
        $manager->createUser($user);

        // V. Rendre la vue avec $user qui est l'objet User, dont la variable twig s'appelle user
        echo $this->twig->render('signup-submit.html.twig', ['user' => $user]);
    }
}
