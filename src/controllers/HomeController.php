<?php

namespace Controllers;

use Models\ArticleManager;

class HomeController extends Controller
{
    public function homePage()
    {

        $articleManager = new ArticleManager();

        $latestArticles = $articleManager->getLatestArticles();

        echo $this->twig->render('homepage.html.twig', ['latestArticles' => $latestArticles]);
    }
}
