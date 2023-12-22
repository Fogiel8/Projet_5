<?php include 'partials/header.php'; ?>

<main>
    <section id="profil">
        <div><img src="images/1697044074517.jpg" alt="Photo de profil"></div>
        <h1>Delattre Thibault</h1>
    </section>
    <section id="articles_cv">
        <div id="articles">
            <div class="post"><a href="#">
                    <img src="../public/images/post1.png" alt="Image du post 1">
                    <div class="titre_chapo">
                        <div class="titre">Les Clés du Succès Professionnel</div>
                        <div class="chapo">Explorez les stratégies incontournables pour atteindre le sommet de votre carrière. Découvrez les conseils pratiques et les histoires inspirantes qui vous guideront vers le succès professionnel.</div>
                    </div>
                </a>
            </div>
            <div class="post"><a href="#">
                    <img src="../public/images/post2.png" alt="Image du post 2">
                    <div class="titre_chapo">
                        <div class="titre">Innovation dans le Monde du Travail</div>
                        <div class="chapo">Plongez dans l'univers dynamique de l'innovation professionnelle. De nouvelles tendances, des technologies émergentes aux méthodes de travail novatrices, tout ce que vous devez savoir pour rester à la pointe.</div>
                    </div>
                </a>
            </div>
            <div class="post"><a href="#">
                    <img src="../public/images/post3.png" alt="Image du post 3">
                    <div class="titre_chapo">
                        <div class="titre">Bien-être au Travail : Équilibre et Productivité</div>
                        <div class="chapo">Priorisez votre bien-être tout en maximisant votre productivité. Explorez des conseils pratiques, des routines de travail saines et des astuces pour maintenir un équilibre harmonieux entre vie professionnelle et personnelle.</div>
                    </div>
                </a>
            </div>
            <div id="plus_articles"><a href="#">Voir tous les articles</a></div>
        </div>
        <div id="cv">
            <h2>Mon parcours</h2>
            <div id="cv_img"><a href="#" target="_blank"><img src="../public/images/cv.png" alt="Image d'illustration du CV"></a></div>
            <p>Transformons nos idées en lignes de code</p>
        </div>
    </section>
    <section id="contact">
        <h2>Contactez-moi</h2>
        <form method="post">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" required>

            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" required>

            <label for="email">E-mail :</label>
            <input type="email" name="email" required>

            <label for="message">Message :</label>
            <textarea name="message" required></textarea>

            <input class="bouton" type="submit" value="Envoyer">
        </form>
    </section>

</main>

<?php include 'partials/footer.php'; ?>