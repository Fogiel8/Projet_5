<?php

namespace Controllers;

use Models\ArticleManager;

class PostController extends Controller
{
    public function post()
    {
        $id = $_GET['id'];

        $articleManager = new ArticleManager;
        $article = $articleManager->getArticle($id);

        dd($article);
    }
}
