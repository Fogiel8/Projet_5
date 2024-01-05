<?php

namespace Controllers;

class PostsList extends Controller
{
    public function postsList()
    {
        echo $this->twig->render('postsList.html.twig');
    }
}
