<?php

namespace Models;

use Models\User;

class UserManager extends DataBaseConnection
{
    public function createUser(User $user): void
    {
        $requete = $this->db->prepare('INSERT INTO users (nom, prenom, mot_de_passe, email, statut) VALUES (?, ?, ?, ?, "inscrit") ');
        $requete->execute([$user->getNom(), $user->getPrenom(), $user->getMotDePasse(), $user->getEmail()]);
    }

    public function getUserByEmail(string $email): ?User // recuperation des données du user
    {
        $requete = $this->db->prepare('SELECT * FROM users WHERE email = ?'); // preparation de la requete
        $requete->execute([$email]); // execution de "prepare" --> recupération de toutes les colonnes specifiques à l'email

        $userData = $requete->fetch(); // stock les données dans un tableau clé-valeur

        if (empty($userData)) {
            return null;
        }

        return new User($userData);
    }

    public function getUserById(int $id): ?User
    {
        $requete = $this->db->prepare('SELECT * FROM users WHERE id = ?');
        $requete->execute([$id]);

        $userData = $requete->fetch();

        if (!$userData) {
            return null;
        }

        $user = new User($userData);

        return $user;
    }
}
