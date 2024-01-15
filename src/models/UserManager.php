<?php

namespace Models;

use App\PasswordManager;

class UserManager extends DataBaseConnection
{
    public function createUser(User $user)
    {
        $requete = $this->db->prepare('INSERT INTO users (nom, prenom, mot_de_passe, email, statut) VALUES (?, ?, ?, ?, "inscrit") ');
        $requete->execute([$user->nom(), $user->prenom(), $user->motDePasse(), $user->email()]);
    }

    public function getUserByEmail($email)
    {
        $requete = $this->db->prepare('SELECT * FROM users WHERE email = ?');
        $requete->execute([$email]);

        $userData = $requete->fetch();

        if (!$userData) {
            header('Location: index.php?action=login');
            echo 'L\'adresse email est inconnue.';
        }
    }

    public function authenticate($email, $password)
    {
        $userData = $this->getUserByEmail($email);

        if ($userData && PasswordManager::verifyPassword($password, $userData['mot_de_passe'])) {
            session_start();
            $_SESSION['user_id'] = $userData['id'];
            return true;
        } else {
            header('Location: index.php?action=login');
            echo 'Le mot de passe est incorrect.';
            return false;
        }
    }
}
