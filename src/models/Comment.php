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
    private DateTime $date;


    public function __construct(array $data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}
