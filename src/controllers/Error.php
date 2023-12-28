<?php

namespace Controllers;

class Error
{
    public function error404()
    {
        include '../src/templates/error404.php';
    }
}
