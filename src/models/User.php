<?php

namespace Models;

use DateTime;

class User
{
    private int $id;
    private string $nom;
    private string $prenom;
    private string $mot_de_passe;
    private string $email;
    private string $statut;
    private array $commentaire;
    private array $article;
}
