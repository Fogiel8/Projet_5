<?php

namespace Controllers;

use Models\Article;
use Models\ArticleManager;

class ArticleController extends Controller
{
    public function createArticle()
    {
        // 1. Verifier la soumission
        if ($this->isSubmit() && !empty($_SESSION['user_id'])) {
            if ($this->isValidateArticleForm()) {
                // 3. connexion a la bdd
                $article = new Article($_POST);

                // 4. importer les données dans la bdd
                $user_id = $_SESSION['user_id']; // Récupérer l'id de l'utilisateur depuis la session
                $manager = new ArticleManager();
                $article = $manager->createArticle($article, $user_id);

                $this->addFlashMessage('success', 'Article envoyé !');
            } else {
                $this->addFlashMessage('failed', 'Article invalide !');
            }
        }

        echo $this->twig->render('articles/create.html.twig');
    }

    public function listArticles()
    {
        $articleManager = new ArticleManager();

        $articles = $articleManager->getAllArticles();
        echo $this->twig->render('articles/list.html.twig', ['articles' => $articles,]);
    }

    public function showArticle()
    {
        $id = $_GET['id'];
        $articleManager = new ArticleManager;
        $article = $articleManager->getArticle($id);

        echo $this->twig->render('articles/show.html.twig', ['article' => $article]);
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

    public function deleteArticle()
    {
        $id = $_GET['id'];

        $delete = new ArticleManager;
        $delete->deleteLigne($id);
        $this->redirectTo('profile');
    }

    public function editArticle()
    {
        // recupérer l'id de l'article
        //afficher la page avec les données
    }
}
