<?php

namespace Controllers;

use Models\ArticleManager;

class HomeController extends Controller
{
    public function homePage(): void
    {

        $articleManager = new ArticleManager();

        $latestArticles = $articleManager->getLatestArticles();

        echo $this->twig->render('homepage.html.twig', ['latestArticles' => $latestArticles]);
    }

    public function sendEmail(): void
    {
        if ($this->isSubmit()) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $objet = $_POST['objet'];
            $message = $_POST['message'];

            $destinataire = "delattre.thibault8@gmail.com";
            $sujet = "Mon Petit Journal : $prenom vous a envoyé un message";
            $corps = "Nom: $nom\nPrénom: $prenom\nEmail: $email\nObjet: $objet\nMessage: $message";

            if (mail($destinataire, $sujet, $corps)) {
                $this->addFlashMessage('success', 'Le message a été envoyé avec succès !');
            } else {
                $this->addFlashMessage('failed', 'Erreur lors de l\'envoi du message !');
            }
            $this->redirectTo('');
        }
    }
}
