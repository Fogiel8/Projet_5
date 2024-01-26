<?php

namespace Controllers;

class LogoutController
{

    public function logout()
    {
        session_unset();

        session_destroy();

        header('Location: index.php?action=login');
        exit();
    }
}
