<?php

namespace Models;

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

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function setDateCreation(string $date_creation): self
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    public function getDateCreation(): string
    {
        return $this->date_creation;
    }

    public function setChapo(string $chapo): self
    {
        $this->chapo = $chapo;

        return $this;
    }

    public function getChapo(): string
    {
        return $this->chapo;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getContenu(): string
    {
        return $this->contenu;
    }

    public function setDateMaj(string $date_maj): self
    {
        $this->date_maj = $date_maj;

        return $this;
    }

    public function getDateMaj(): string
    {
        return $this->date_maj;
    }

    public function setAuteur(User $user): void
    {
        $this->auteur = $user;
    }

    public function getAuteur(): User
    {
        return $this->auteur;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->id = $commentaire;

        return $this;
    }

    public function getCommentaire(): array
    {
        return $this->commentaires;
    }
}
