<?php

namespace Models;

// creation d'un article
class ArticleManager extends DataBaseConnection
{
    public function createArticle(Article $article)
    {
        $requete = $this->db->prepare('INSERT INTO articles (titre, chapo, contenu, date_creation, date_maj, user_id) VALUES (?,?,?,NOW(),NOW(),1) ');
        $requete->execute([$article->titre(), $article->chapo(), $article->contenu()]);
    }

    public function getAllArticles()
    {
        $requete = $this->db->query('SELECT * FROM articles ORDER BY date_creation DESC');
        $articles = $requete->fetchAll();
        $posts = [];
        foreach ($articles as $article) {
            $post = new Article($article);
            $userManager = new UserManager;
            $user = $userManager->getUserById($article['user_id']);

            $post->setAuteur($user);
            $posts[] = $post;
        }
        return $posts;
    }
}
