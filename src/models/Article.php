<?php

namespace Models;

use DateTime;

//récuperation des données depuis la BDD
class Article
{
    private int $id;
    private string $titre;
    private string $date_creation;
    private string $chapo;
    private string $contenu;
    private string $date_maj;
    private User $auteur;
    private array $commentaires;

    public function __construct(array $data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    public function setAuteur(User $user)
    {
        $this->auteur = $user;
    }

    public function titre(): string
    {
        return $this->titre;
    }

    public function chapo(): string
    {
        return $this->chapo;
    }

    public function contenu(): string
    {
        return $this->contenu;
    }

    public function auteur(): User
    {
        return $this->auteur;
    }

    public function dateCreation(): string
    {
        return $this->date_creation;
    }
}
