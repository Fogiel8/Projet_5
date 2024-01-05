<?php

namespace Controllers;

use Models\Article;
use Models\ArticleManager;

class ArticleController extends Controller
{
    public function addPost()
    {
        $post = new Article(['titre' => 'Mon titre', 'chapo' => 'Mon chapo', 'contenu' => 'Mon contenu']);
        $manager = new ArticleManager();
        $manager->createArticle($post);
    }
}
