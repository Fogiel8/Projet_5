<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon petit journal</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon.png">
</head>

<body>
    <header>
        <div id="top-header">
            <div id="liens_reseaux">
                <a href="https://www.linkedin.com/in/thibault-delattre8/" target="_blank"><img src="../public/images/logo_lkdin.png" alt="logo LinkedIn"></a>
                <a href="https://github.com/ThibDel8" target="_blank"><img src="../public/images/logo_github.png" alt="logo github"></a>
                <a href="https://insight.symfony.com/projects/e6a6f7dc-5196-4777-b491-ef7b49ff1bb6" target="_blank"><img src="../public/images/logo_symfony.png" alt="logo symfony"></a>
                <!--a href="#" target="_blank"><img src="../public/images/logo_share.png" alt="logo partager"></a-->
            </div>
            <div id="date">
                <script>
                    var date = new Date();
                    var options = {
                        weekday: 'long',
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    };

                    var formattedDate = date.toLocaleDateString('fr-FR', options);

                    function capitalizeFirstLetter(str) {
                        return str.charAt(0).toUpperCase() + str.slice(1);
                    }

                    var capitalizedDate = formattedDate.replace(/(\w+)/g, function(match) {
                        return capitalizeFirstLetter(match);
                    });

                    document.getElementById('date').textContent = capitalizedDate;
                </script>
            </div>
        </div>
        <h1>MON PETIT JOURNAL</h1>
        <div id="menu">
            <nav>
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="index.php?action=postsList">Articles</a></li>
                    <li><a href="index.php?action=login">Se connecter</a></li>
                </ul>
            </nav>
        </div>
    </header>