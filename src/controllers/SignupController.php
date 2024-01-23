<?php

namespace Controllers;

use App\PasswordManager;
use Models\User;
use Models\UserManager;

class SignupController extends Controller
{
    public function signup()
    {
        if (true === $this->isSubmit() && true === $this->validateForm()) {
            // III. Création de l'objet User et attribution des données du tableau associatif
            $user = new User([
                'nom' => $_POST["lastname"],
                'prenom' => $_POST["firstname"],
                'mot_de_passe' => PasswordManager::hashPassword($_POST["password"]),
                'email' => $_POST["email"],
                'statut' => 'inscrit'
            ]);

            // IV. Introduction des données dans la BDD
            $manager = new UserManager();
            $manager->createUser($user);

            $user = $manager->getUserByEmail($user->email());

            $user->authenticate($_POST["password"]);

            $this->redirectTo('signup-submit');
        }

        echo $this->twig->render('signup.html.twig', ['errors' => []]);
    }

    private function validateForm(): bool
    {
        $_SESSION['errors'] = [];

        $nom = $_POST["lastname"];
        $prenom = $_POST["firstname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';

        // I.2.Verrification si les valeurs respectent les contraintes
        if (mb_strlen($nom) < 3) {
            $_SESSION['errors']['nom'] = "Le nom d'utilisateur doit avoir au moins 3 caractères.";
        }
        if (mb_strlen($prenom) < 3) {
            $_SESSION['errors']['prenom'] = "Le prenom d'utilisateur doit avoir au moins 3 caractères.";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errors']['email'] = 'L\'adresse email est invalide, elle doit être sous la forme : adresse@mail.com.';
        }
        if (!preg_match($regex, $password)) {
            $_SESSION['errors']['password'] = 'Le mot de passe requiert au moins une lettre minuscule, une lettre majuscule, un chiffre et une longueur minimale de 8 caractères.';
        }

        return true === empty($_SESSION['errors']);
    }
}
