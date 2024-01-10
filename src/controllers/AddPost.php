<?php

namespace Controllers;

class AddPost extends Controller
{
    public function addPost()
    {
        echo $this->twig->render('addPost.html.twig');
    }
}
