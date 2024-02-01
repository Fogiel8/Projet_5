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

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function setAuteur(User $user)
    {
        $this->auteur = $user;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getChapo(): string
    {
        return $this->chapo;
    }

    public function getContenu(): string
    {
        return $this->contenu;
    }

    public function getAuteur(): User
    {
        return $this->auteur;
    }

    public function getDateCreation()
    {
        return $this->date_creation;
    }

    public function getDateMaj()
    {
        return $this->date_maj;
    }
}
