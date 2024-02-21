<?php

namespace Models;

use App\PasswordManager;

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

    public function getId(): int
    {
        return $this->id;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function getMotDePasse(): string
    {
        return $this->mot_de_passe;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getStatut(): string
    {
        return $this->statut;
    }

    public function getCommentaires(): array
    {
        return $this->commentaires;
    }

    public function getArticles(): array
    {
        return $this->articles;
    }



    public function authenticate(string $password): bool // verrification du mot de passe
    {
        if (PasswordManager::verifyPassword($password, $this->getMotDePasse())) {
            $_SESSION['user_id'] = $this->id;
            $_SESSION['statut'] = $this->statut;
            return true;
        }

        return false;
    }
}
