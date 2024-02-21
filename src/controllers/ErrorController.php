<?php

namespace Controllers;

class ErrorController extends Controller
{
    public function error404(): void
    {
        echo $this->twig->render('error404.html.twig');
    }


    public function error500(\Exception $exception): void
    {
        echo $this->twig->render('error500.html.twig', [
            'exception' => $exception
        ]);
    }
}
