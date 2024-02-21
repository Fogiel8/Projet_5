<?php

namespace Models;

// creation d'un article
class ArticleManager extends DataBaseConnection
{
    public function createArticle(Article $article, int $userId): Article
    {
        $requete = $this->db->prepare('INSERT INTO articles (titre, chapo, contenu, date_creation, date_maj, user_id) VALUES (?,?,?,NOW(), "",?)');
        $requete->execute([$article->getTitre(), $article->getChapo(), $article->getContenu(), $userId]);

        $article->setId((int)$this->db->lastInsertId());

        return $article;
    }

    public function updateArticle(Article $article): void
    {
        $requete = $this->db->prepare('UPDATE articles SET titre = ?, chapo = ?, contenu = ?, date_maj = NOW() WHERE id = ?');
        $requete->execute([$article->getTitre(), $article->getChapo(), $article->getContenu(), $article->getId()]);
    }

    public function deleteLigne(int $id): void
    {
        $requete = $this->db->prepare('DELETE FROM articles WHERE id = ? AND user_id = ?');
        $requete->execute([$id, $_SESSION['user_id']]);
    }

    public function getAllArticles(): array
    {
        $requete = $this->db->query('SELECT * FROM articles ORDER BY date_creation DESC');
        $articles = $requete->fetchAll();
        $posts = [];
        foreach ($articles as $article) {
            $post = new Article($article);
            $userManager = new UserManager();
            $user = $userManager->getUserById($article['user_id']);

            $post->setAuteur($user);
            $posts[] = $post;
        }

        return $posts;
    }

    public function getArticlesByUserId(int $userId): array
    {
        $requete = $this->db->prepare('SELECT * FROM articles WHERE user_id = ?');
        $requete->execute([$userId]);
        return $requete->fetchAll();
    }


    public function getArticleById(int $articleId): ?Article
    {
        $requete = $this->db->prepare('SELECT * FROM articles WHERE id = ?');
        $requete->execute([$articleId]);

        $post = $requete->fetch();
        if (empty($post)) {
            return null;
        }

        $article = new Article($post);
        $userManager = new UserManager();
        $user = $userManager->getUserById($post['user_id']);
        $article->setAuteur($user);

        return $article;
    }

    public function getLatestArticles(): array
    {
        $requete = $this->db->query('SELECT * FROM articles ORDER BY date_creation DESC LIMIT 3');
        $articles = $requete->fetchAll();
        $latestArticles = [];

        foreach ($articles as $article) {
            $post = new Article($article);
            $userManager = new UserManager();
            $user = $userManager->getUserById($article['user_id']);

            $post->setAuteur($user);
            $latestArticles[] = $post;
        }

        return $latestArticles;
    }
}
