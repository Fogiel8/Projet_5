<?php

namespace Controllers;

class AddPostController extends Controller
{
    public function addPost()
    {

        if (!isset($_SESSION['user_id'])) {
            $this->redirectTo('login');
        }

        echo $this->twig->render('addPost.html.twig');
    }
}
