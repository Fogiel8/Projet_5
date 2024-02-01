<?php

namespace Controllers;

use Models\Comment;
use Models\CommentManager;

class CommentController extends Controller
{
    public function createComment()
    {
        if (empty($_SESSION['user_id'])) {
            return $this->redirectTo('login');
        }

        $comment = new Comment(['commentaire' => $_POST['comment']]);
        $commentManager = new CommentManager;
        $commentManager->addComment($comment);
    }
}
