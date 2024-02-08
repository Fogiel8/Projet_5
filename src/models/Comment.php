<?php

namespace Models;

use DateTime;

class Comment
{
    private int $id;
    private User $auteur;
    private Article $article;
    private bool $approbation;
    private string $commentaire;
    private string $date;


    public function __construct(array $data = [])
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setAuteur(User $user): self
    {
        $this->auteur = $user;
        return $this;
    }

    public function getAuteur(): User
    {
        return $this->auteur;
    }

    public function setArticle(Article $article): self
    {
        $this->article = $article;
        return $this;
    }

    public function getArticle(): Article
    {
        return $this->article;
    }

    public function setApprobation(bool $approbation): self
    {
        $this->approbation = $approbation;
        return $this;
    }

    public function getApprobation(): bool
    {
        return $this->approbation;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getCommentaire(): string
    {
        return $this->commentaire;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;
        return $this;
    }

    public function getDate(): string
    {
        return $this->date;
    }
}
