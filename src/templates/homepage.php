<?php include 'partials/header.php'; ?>

<main>
    <section id="profil">
        <div><img src="images/1697044074517.jpg" alt="Photo de profil"></div>
        <h1>Delattre Thibault</h1>
    </section>
    <section id="articles_cv">
        <div id="articles">
            <a href="#">
                <img src="#" alt="alt">
                <div>
                    <div>titre</div>
                    <div>chapo</div>
                </div>
            </a>
            <a href="#">
                <img src="#" alt="alt">
                <div>
                    <div>titre</div>
                    <div>chapo</div>
                </div>
            </a>
            <a href="#">
                <img src="#" alt="alt">
                <div>
                    <div>titre</div>
                    <div>chapo</div>
                </div>
            </a>
        </div>
        <div id="cv">
            <h2>Mon parcours</h2>
            <div><a href="#" target="_blank"><img src="#" alt="alt"></a></div>
            <p>phrase d'accroche</p>
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

            <input type="submit" value="Envoyer">
        </form>
    </section>

</main>

<?php include 'partials/footer.php'; ?>