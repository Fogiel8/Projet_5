<?php

namespace Models;

use DateTime;

class Article
{
    private int $id;
    private string $titre;
    private DateTime $date_creation;
    private string $chapo;
    private string $contenu;
    private DateTime $date_maj;
    private User $auteur;
    private array $commentaire;
}
