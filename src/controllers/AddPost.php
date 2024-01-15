<?php

namespace Controllers;

class AddPost extends Controller
{
    public function addPost()
    {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }

        echo $this->twig->render('addPost.html.twig');
    }
}
