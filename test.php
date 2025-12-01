<!-- index.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TechSolution - Accueil</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>TechSolution</h1>
    <nav>
      <a href="index.php">Accueil</a>
      <a href="news.php">Actualités</a>
      <a href="contact.php">Contact</a>
      <a href="admin.php">Admin</a>
    </nav>
  </header>

  <section>
    <h2>Bienvenue chez TechSolution</h2>
    <p>TechSolution est une entreprise de services informatiques spécialisée dans le développement logiciel, le support technique et la transformation digitale.</p>
  </section>

  <footer>
    <p>© 2025 TechSolution</p>
  </footer>
</body>
</html>

<!-- news.php -->
<?php
$news = [
  ["titre" => "Nouveau service cloud", "contenu" => "TechSolution propose maintenant des infrastructures cloud sur mesure."],
  ["titre" => "Partenariat annoncé", "contenu" => "Nous avons conclu un partenariat stratégique avec DataCorp."],
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualités</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Actualités TechSolution</h1>
  </header>

  <section>
    <?php foreach($news as $article): ?>
      <article>
        <h3><?= $article['titre'] ?></h3>
        <p><?= $article['contenu'] ?></p>
      </article>
    <?php endforeach; ?>
  </section>
</body>
</html>

<!-- contact.php -->
<?php
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nom = trim($_POST['nom'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $msg = trim($_POST['message'] ?? '');

  if ($nom && $email && $msg) {
    $message = "Merci $nom, votre message a bien été envoyé !";
  } else {
    $message = "Veuillez remplir tous les champs.";
  }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact TechSolution</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Contactez-nous</h1>
  <form method="POST">
    <input type="text" name="nom" placeholder="Votre nom" required>
    <input type="email" name="email" placeholder="Votre email" required>
    <textarea name="message" placeholder="Votre message" required></textarea>
    <button type="submit">Envoyer</button>
  </form>
  <p><?= $message ?></p>
</body>
</html>

<!-- admin.php -->
<?php
$contentFile = 'content.txt';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  file_put_contents($contentFile, $_POST['content']);
}
$currentContent = file_exists($contentFile) ? file_get_contents($contentFile) : "Contenu par défaut";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin TechSolution</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Interface Administrateur</h1>
  <form method="POST">
    <textarea name="content" rows="6" cols="60"><?= $currentContent ?></textarea>
    <button type="submit">Mettre à jour</button>
  </form>

  <h3>Contenu actuel :</h3>
  <p><?= $currentContent ?></p>
</body>
</html>

/* style.css */
body {
  font-family: Arial, sans-serif;
  padding: 20px;
}
header nav a {
  margin-right: 15px;
  text-decoration: none;
  font-weight: bold;
}
article {
  border: 1px solid #ccc;
  padding: 10px;
  margin-bottom: 10px;
}
form input, form textarea {
  display: block;
  margin-bottom: 10px;
  width: 300px;
}
