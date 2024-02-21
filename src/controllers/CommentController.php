<?php

namespace Controllers;

use Models\ArticleManager;
use Models\Comment;
use Models\CommentManager;
use Models\UserManager;

class CommentController extends Controller
{
    public function createComment(): bool
    {
        if (empty($_SESSION['user_id'])) {
            return $this->redirectTo('login');
        }

        if ($this->isSubmit()) {
            $idArticle = $_GET['id'];

            $articleManager = new ArticleManager();
            $article = $articleManager->getArticleById($idArticle);

            $userManager = new UserManager();
            $user = $userManager->getUserById($_SESSION['user_id']);

            $comment = new Comment();
            $comment->setArticle($article);
            $comment->setAuteur($user);
            $comment->setCommentaire($_POST['comment']);


            $commentManager = new CommentManager();
            $commentManager->addComment($comment);

            $this->addFlashMessage('success', 'Merci pour votre commentaire ! Il sera visible une fois approuvé par un administrateur.');

            $this->redirectTo('show-article', ['id' => $idArticle]);
        }
    }

    public function adminPage(): bool
    {
        if (empty($_SESSION['statut']) || $_SESSION['statut'] !== 'valide') {
            $this->addFlashMessage('failed', 'Vous n\'avez pas les droits !');

            return $this->redirectTo('');
        }
        $commentManager = new CommentManager();
        $commentsList = $commentManager->getCommentsList();

        echo $this->twig->render('adminPage.html.twig', ['commentsList' => $commentsList]);
    }

    public function approveComment(): bool
    {
        if (empty($_SESSION['statut']) || $_SESSION['statut'] !== 'valide') {
            $this->addFlashMessage('failed', 'Vous n\'avez pas les droits !');

            return $this->redirectTo('');
        }

        $idComment = $_GET['id'];

        $commentManager = new CommentManager();
        $commentManager->approve($idComment);

        $this->redirectTo('admin');
    }

    public function disapproveComment(): bool
    {
        if (empty($_SESSION['statut']) || $_SESSION['statut'] !== 'valide') {
            $this->addFlashMessage('failed', 'Vous n\'avez pas les droits !');

            return $this->redirectTo('');
        }

        $idComment = $_GET['id'];

        $commentManager = new CommentManager();
        $commentManager->delete($idComment);

        $this->redirectTo('admin');
    }
}
