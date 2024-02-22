<?php

namespace Controllers;

use Models\Article;
use Models\ArticleManager;
use Models\CommentManager;

class ArticleController extends Controller
{
    public function createArticle(): bool
    {
        if (empty($_SESSION['statut']) || $_SESSION['statut'] !== 'valide') {
            $this->addFlashMessage('failed', 'Vous n\'avez pas les droits !');

            return $this->redirectTo('list-articles');
        }

        // 1. Verifier la soumission
        if ($this->isSubmit()) {
            if ($this->isValidateArticleForm()) {
                // 3. connexion a la bdd
                $article = new Article($_POST);

                // 4. importer les données dans la bdd
                $user_id = $_SESSION['user_id']; // Récupérer l'id de l'utilisateur depuis la session
                $manager = new ArticleManager();
                $article = $manager->createArticle($article, $user_id);

                $this->addFlashMessage('success', 'L\'article à bien été créé !');
            } else {
                $this->addFlashMessage('failed', 'Article invalide !');
            }
        }

        echo $this->twig->render('articles/create.html.twig');
    }

    public function listArticles(): void
    {
        $articleManager = new ArticleManager();

        $articles = $articleManager->getAllArticles();
        echo $this->twig->render('articles/list.html.twig', ['articles' => $articles,]);
    }

    public function showArticle(): void
    {
        $articleId = $_GET['id'];
        $articleManager = new ArticleManager();
        $article = $articleManager->getArticleById($articleId);

        $commentManager = new CommentManager();
        $comments = $commentManager->getApprovedCommentsByArticleId($articleId);

        echo $this->twig->render('articles/show.html.twig', ['article' => $article, 'comments' => $comments]);
    }

    public function isValidateArticleForm(): bool
    {
        $_SESSION['errors'] = [];
        $titlePost = $_POST['titre'];
        $chapoPost = $_POST['chapo'];
        $contentPost = $_POST['contenu'];

        if (mb_strlen($titlePost) < 5 || mb_strlen($titlePost) > 85) {
            $_SESSION['errors']['title'] = 'Le titre de l\'article doit être compris entre 5 et 85 caractères.';
        }
        if (mb_strlen($chapoPost) < 100 || mb_strlen($chapoPost) > 400) {
            $_SESSION['errors']['chapo'] = 'Le chapô de l\'article doit être compris entre 100 et 400 caractères.';
        }
        if (mb_strlen($contentPost) < 400) {
            $_SESSION['errors']['content'] = 'Le contenu de l\'article doit être d\'au moins 400 caractères.';
        }

        return empty($_SESSION['errors']); // si return true, le formulaire est valide car vide, sinon false et return les messages
    }

    public function deleteArticle(): bool
    {
        if (empty($_SESSION['statut']) || $_SESSION['statut'] !== 'valide') {
            $this->addFlashMessage('failed', 'Vous n\'avez pas les droits !');

            return $this->redirectTo('');
        }

        $id = $_GET['id'];

        $delete = new ArticleManager();
        $delete->deleteLigne($id);
        $this->redirectTo('profile');
    }

    public function editArticle(): bool
    {
        if (empty($_SESSION['statut']) || $_SESSION['statut'] !== 'valide') {
            $this->addFlashMessage('failed', 'Vous n\'avez pas les droits !');
            $this->redirectTo('');

            return false;
        }

        $articleId = $_GET['id'];
        $articleManager = new ArticleManager();
        $article = $articleManager->getArticleById($articleId);

        // 1. Verifier la soumission
        if ($this->isSubmit()) {
            if ($this->isValidateArticleForm()) {
                $article->setTitre($_POST['titre']);
                $article->setChapo($_POST['chapo']);
                $article->setContenu($_POST['contenu']);

                $articleManager->updateArticle($article);

                $this->addFlashMessage('success', 'L\'article à bien été modifé !');

                $this->redirectTo('show-article', ['id' => $article->getId()]);
            } else {
                $this->addFlashMessage('failed', 'Article invalide !');
            }
        }

        echo $this->twig->render('articles/edit.html.twig', ['article' => $article]);

        return true;
    }
}
