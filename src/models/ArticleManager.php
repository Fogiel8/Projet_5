<?php

namespace Models;

use PDO;

require_once 'DataBaseConnection.php';

// creation d'un article
class ArticleManager extends DataBaseConnection
{
    public function createArticle(Article $article)
    {
        $requete = $this->db->prepare('INSERT INTO articles (titre, chapo, contenu, date_creation, date_maj, user_id) VALUES (?,?,?,NOW(),NOW(),1) ');
        $requete->execute([$article->titre(), $article->chapo(), $article->contenu()]);
    }
}
