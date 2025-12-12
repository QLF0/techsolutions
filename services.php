<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $siteTitle ?> - Services</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <div class="logo">TS</div>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="services.php">Services</a>
        <a href="contact.php">Contact</a>
    </nav>
</header>

<main>
    <h1>Nos Services</h1>
    <div class="cards">
        <div class="card">
            <h2>Infrastructure IT</h2>
            <p>Architecture système haute performance et évolutive</p>
        </div>
        <div class="card">
            <h2>Cybersécurité</h2>
            <p>Protection avancée contre les menaces modernes</p>
        </div>
        <div class="card">
            <h2>Cloud Computing</h2>
            <p>Migration et optimisation cloud native</p>
        </div>
        <div class="card">
            <h2>Support 24/7</h2>
            <p>Assistance technique disponible en permanence</p>
        </div>
    </div>
</main>

<footer>
    <p>&copy; 2025 <?= $siteTitle ?>. Tous droits réservés.</p>
</footer>
</body>
</html>