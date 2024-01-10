<?php

namespace Controllers;

class SignupController extends Controller
{
    public function signup()
    {
        $emailerror = $_SESSION['errorEmail'] ?? '';
        echo $this->twig->render('signup.html.twig', ['error' => $emailerror]);
    }
}
