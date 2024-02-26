-- Set the time zone for the MySQL session
SET time_zone = "Europe/Paris";

-- Create the 'users' table
CREATE TABLE users (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    commentaires BIGINT,
    articles BIGINT,
    email VARCHAR(100) UNIQUE NOT NULL,
    statut ENUM('inscrit', 'valide')
);


-- Create the 'articles' table
CREATE TABLE articles (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    user_id BIGINT NOT NULL,
    titre VARCHAR(255) NOT NULL,
    date_creation DATETIME NOT NULL,
    commentaires BIGINT,
    chapo TEXT NOT NULL,
    contenu TEXT NOT NULL,
    date_maj DATETIME,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Create the 'comments' table
CREATE TABLE comments (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    article_id BIGINT NOT NULL,
    user_id BIGINT NOT NULL,
    commentaire TEXT NOT NULL,
    date_comment DATETIME NOT NULL,
    approbation BOOLEAN NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (article_id) REFERENCES articles(id) ON DELETE CASCADE
);
