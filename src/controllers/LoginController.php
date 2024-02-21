<?php

namespace Controllers;

use App\PasswordManager;
use Models\User;
use Models\UserManager;
use Models\ArticleManager;

class LoginController extends Controller
{
    public function login(): void
    {
        if ($this->isSubmit()) {
            $this->isValidateLoginForm();

            if ($this->isValidForm()) {
                $email = $_POST['loginEmail'];
                $password = $_POST['loginPassword'];

                $userManager = new UserManager();
                $user = $userManager->getUserByEmail($email);

                if ($user !== null && $user->authenticate($password)) {
                    $this->addFlashMessage('success', 'Connexion réussie !');
                    $this->redirectTo('');
                }
            }

            $this->addFlashMessage('failed', 'Erreur de connexion !');
        }
        // Si le formulaire n'est pas soumis ou la validation échoue, afficher la page avec les erreurs
        echo $this->twig->render('login/login.html.twig', ['errors' => []]);
    }

    public function profile(): string
    {
        if (empty($_SESSION['user_id'])) {
            $this->addFlashMessage('failed', 'Vous devez vous connecter pour accéder à cette page !');

            return $this->redirectTo('login');
        }

        $userId = $_SESSION['user_id'];

        $articleManager = new ArticleManager();
        $userArticles = $articleManager->getArticlesByUserId($userId);

        echo $this->twig->render('login/profile.html.twig', ['userArticles' => $userArticles]);
    }

    public function logout(): string
    {
        session_unset();

        session_destroy();

        return $this->redirectTo('login');
    }

    public function signup(): void
    {
        //Vérification si le formulaire a été soumis CORRECTEMENT
        if ($this->isSubmit()) {
            $this->isValidateSignupForm();

            if ($this->isValidForm()) {
                //Création de l'objet User et attribution des clés-valeurs du tableau associatif
                $user = new User([
                    'nom' => $_POST["lastname"],
                    'prenom' => $_POST["firstname"],
                    'mot_de_passe' => PasswordManager::hashPassword($_POST["password"]),
                    'email' => $_POST["email"],
                    'statut' => 'inscrit'
                ]);

                //Introduction des données dans la BDD
                $manager = new UserManager();
                $manager->createUser($user);

                $user = $manager->getUserByEmail($user->getEmail());

                $user->authenticate($_POST["password"]);

                $this->addFlashMessage('success', 'Inscription réussie !'); //flash message en session avec type et message ou type est le nom de la clé du tableau associatif

                $this->redirectTo('signup-submit');
            }

            // Ajouter ton flash message error inscription
            $this->addFlashMessage('failed', 'Erreur d\'inscription !'); //flash message en session avec type et message ou type est le nom de la clé du tableau associatif
            $this->redirectTo('signup');
        }

        echo $this->twig->render('login/signup.html.twig');
    }

    public function signupSubmit(): void
    {
        $userId = $_SESSION['user_id'];
        $articleManager = new ArticleManager();
        $userArticles = $articleManager->getArticlesByUserId($userId);

        echo $this->twig->render('login/profile.html.twig', ['userArticles' => $userArticles]);
    }

    private function isValidateLoginForm(): bool
    {
        $_SESSION['errors'] = [];
        $_SESSION['flashMessage'] = [];

        $email = $_POST['loginEmail'];
        $password = $_POST['loginPassword'];

        // Validation de l'e-mail
        $userManager = new UserManager();
        $user = $userManager->getUserByEmail($email);

        if ($user === null) {
            $_SESSION['errors']['email'] = 'L\'adresse e-mail n\'existe pas.';
        }

        return empty($_SESSION['errors']);
    }

    private function isValidateSignupForm(): bool
    {
        $_SESSION['errors'] = [];
        $_SESSION['flashMessage'] = [];

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

        return empty($_SESSION['errors']);
    }
}
