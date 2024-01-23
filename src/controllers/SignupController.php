<?php

namespace Controllers;

class SignupController extends Controller
{
    public function signup()
    {
        $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];

        echo $this->twig->render('signup.html.twig', ['errors' => $errors]);
    }
}
