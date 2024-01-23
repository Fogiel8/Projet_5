<?php

namespace Controllers;

use Models\Article;
use Models\ArticleManager;
use Models\DataBaseConnection;

class ArticleSubmit extends Controller
{
    public function articleSubmit()
    {
        // 1. Verifier la soumission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // 2. recuperation des informations du formulaire
            $titlePost = $_POST['titlePost'];
            $chapoPost = $_POST['chapoPost'];
            $contentPost = $_POST['contentPost'];

            // 3. connexion a la bdd
            $dataBaseConnection = new DataBaseConnection();
            $article = new Article(['titre' => $titlePost, 'chapo' => $chapoPost, 'contenu' => $contentPost]);

            // 4. importer les données dans la bdd
            $manager = new ArticleManager($dataBaseConnection->db);
            $manager->createArticle($article);

            echo $this->twig->render('article-submit.html.twig', ['article' => $article]);
        }
    }
}
