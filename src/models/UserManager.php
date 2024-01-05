<?php

namespace Models;

use PDO;
use DataBaseConnection;

// creation d'un user
class UserManager extends DataBaseConnection
{
    public function createUser(User $user)
    {
        $requete = $this->db->prepare('INSERT INTO users (nom, prenom, mot_de_passe, email, statut) VALUES ((?, ?, ?, ?, ?) ');
        $requete->execute([$user->nom(), $user->prenom(), $user->mot_de_passe(), $user->email()]);
    }
}
