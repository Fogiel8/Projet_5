<?php

namespace Models;

class CommentManager extends DataBaseConnection
{
    public function addComment(Comment $comment): void
    {
        $requete = $this->db->prepare('INSERT INTO comments (article_id, user_id, commentaire, date_comment, approbation) VALUES (?, ?, ?, NOW(), 0)');
        $requete->execute([$comment->getArticle()->getId(), $comment->getAuteur()->getId(), $comment->getCommentaire()]);
    }

    public function getCommentsList(): array
    {
        $requete = $this->db->query('SELECT * FROM comments WHERE approbation = 0 ORDER BY date_comment ASC');
        $arrayComments = $requete->fetchAll();

        $commentsList = [];

        foreach ($arrayComments as $arrayComment) {
            $userManager = new UserManager();
            $user = $userManager->getUserById($arrayComment['user_id']);

            $articleManager = new ArticleManager();
            $article = $articleManager->getArticleById($arrayComment['article_id']);

            $comment = new Comment();
            $comment->setId($arrayComment['id']);
            $comment->setAuteur($user);
            $comment->setArticle($article);
            $comment->setCommentaire($arrayComment['commentaire']);
            $comment->setDate($arrayComment['date_comment']);

            $commentsList[] = $comment;
        }

        return $commentsList;
    }

    public function approve(int $idComment): void
    {
        $requete = $this->db->prepare('UPDATE comments SET approbation = 1 WHERE id = ?');
        $requete->execute([$idComment]);
    }

    public function delete(int $idComment): void
    {
        $requete = $this->db->prepare('DELETE FROM comments WHERE id = ?');
        $requete->execute([$idComment]);
    }

    public function getApprovedCommentsByArticleId(int $articleId): array
    {
        $requete = $this->db->prepare('SELECT * FROM comments WHERE article_id = ? AND approbation = 1 ORDER BY date_comment ASC');
        $requete->execute([$articleId]);
        $arrayComments = $requete->fetchAll();

        $commentsList = [];

        foreach ($arrayComments as $arrayComment) {
            $userManager = new UserManager();
            $user = $userManager->getUserById($arrayComment['user_id']);

            $comment = new Comment();
            $comment->setId($arrayComment['id']);
            $comment->setAuteur($user);
            $comment->setCommentaire($arrayComment['commentaire']);
            $comment->setDate($arrayComment['date_comment']);

            $commentsList[] = $comment;
        }

        return $commentsList;
    }
}
