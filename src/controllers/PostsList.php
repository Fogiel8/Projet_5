<?php

namespace Controllers;

use Models\ArticleManager;

class PostsList extends Controller
{
    public function postsList()
    {
        $articleManager = new ArticleManager();
        $articles = $articleManager->getAll();

        echo $this->twig->render('postsList.html.twig', ['articles' => $articles]);
    }
}
