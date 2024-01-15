<?php

namespace Models;

use Models\Comment;
use Models\Article;

class User
{
    // Liste des paramètres d'un User
    private int $id;
    private string $nom;
    private string $prenom;
    private string $mot_de_passe;
    private string $email;
    private string $statut;
    private array $commentaires;
    private array $articles;

    // Initialisation des propriétés en leur donnant une valeur
    public function __construct(array $data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    public function nom(): string
    {
        return $this->nom;
    }

    public function prenom(): string
    {
        return $this->prenom;
    }

    public function motDePasse(): string
    {
        return $this->mot_de_passe;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function statut(): string
    {
        return $this->statut;
    }
}
