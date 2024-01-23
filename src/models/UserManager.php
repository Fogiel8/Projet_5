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

    public function getUserByEmail($email): User // recuperation des données du user
    {
        $requete = $this->db->prepare('SELECT * FROM users WHERE email = ?'); // preparation de la requete
        $requete->execute([$email]); // execution de "prepare" --> recupération de toutes les colonnes specifiques à l'email

        $userData = $requete->fetch(); // stock les données dans un tableau clé-valeur
        $user = new User($userData);
        return empty($userData) === false ? $user : null; // si $userData a des valeurs --> return $userData, sinon null
    }

    public function getUserById($id)
    {
        $requete = $this->db->prepare('SELECT * FROM users WHERE id = ?');
        $requete->execute([$id]);

        $userData = $requete->fetch();
        $user = new User($userData);


        return $user;
    }
}
