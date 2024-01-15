<?php

namespace Controllers;

use Models\ArticleManager;

class PostsList extends Controller
{
    public function postsList()
    {
        // Instancier le gestionnaire d'articles
        $articleManager = new ArticleManager();

        // Appeler la méthode pour récupérer tous les articles
        $articles = $articleManager->getAllArticles();

        // Afficher la page Twig avec la liste des articles
        echo $this->twig->render('postsList.html.twig', ['articles' => $articles]);
    }
}
