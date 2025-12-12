<?php session_start(); 
// Traitement du formulaire de connexion
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Vérification des identifiants
    if ($username === 'admin' && $password === 'admin') {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = 'admin';
        header('Location: admin.php');
        exit;
    } else {
        $error = 'Identifiant ou mot de passe incorrect';
    }
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Connexion Admin - TechSolution</title>
  <style>
    :root{
      --primary:#1ABC9C;
      --primary-dark:#16A085;
      --bg-dark:#0F1419;
      --bg-card:#1a1f2e;
      --bg-light:#262d3d;
      --text-primary:#FFFFFF;
      --text-secondary:#b0b8c1;
      --border:#3a4556;
      --gradient:linear-gradient(135deg,var(--primary) 0%,#0a9d7f 100%)
    }
    *{margin:0;padding:0;box-sizing:border-box}
    html{scroll-behavior:smooth}
    body{font-family:'Segoe UI',Roboto,Helvetica,Arial,sans-serif;background:var(--bg-dark);color:var(--text-primary);line-height:1.6;overflow-x:hidden;min-height:100vh;display:flex;align-items:center;justify-content:center}
    
    .login-container{width:100%;max-width:400px;padding:2rem}
    .login-box{background:var(--bg-card);border:1px solid var(--border);border-radius:12px;padding:3rem;box-shadow:0 10px 40px rgba(26,188,156,0.1)}
    
    .logo-center{display:flex;align-items:center;justify-content:center;gap:0.75rem;margin-bottom:2rem}
    .logo-icon{width:50px;height:50px;background:var(--primary);border-radius:8px;display:flex;align-items:center;justify-content:center;font-weight:bold;color:#000;font-size:1.5rem}
    .logo-text{font-size:1.3rem;font-weight:700}
    
    .login-box h1{text-align:center;margin-bottom:0.5rem;font-size:1.5rem}
    .login-box p{text-align:center;color:var(--text-secondary);margin-bottom:2rem}
    
    .form-group{margin-bottom:1.5rem}
    .form-group label{display:block;margin-bottom:0.5rem;font-weight:600}
    .form-group input{width:100%;padding:0.75rem;background:var(--bg-light);border:1px solid var(--border);border-radius:6px;color:var(--text-primary);font-family:inherit;font-size:1rem}
    .form-group input:focus{outline:none;border-color:var(--primary);box-shadow:0 0 0 2px rgba(26,188,156,0.1)}
    
    .error-message{background:rgba(231,76,60,0.2);border:1px solid #e74c3c;color:#e74c3c;padding:1rem;border-radius:6px;margin-bottom:1.5rem;text-align:center}
    
    .btn{width:100%;padding:0.75rem;border:none;border-radius:6px;cursor:pointer;font-weight:600;transition:all 0.3s;text-decoration:none;display:block;background:var(--gradient);color:white;font-size:1rem}
    .btn:hover{transform:translateY(-2px);box-shadow:0 6px 16px rgba(26,188,156,0.3)}
    
    .back-link{text-align:center;margin-top:1.5rem}
    .back-link a{color:var(--primary);text-decoration:none;font-size:0.9rem}
    .back-link a:hover{text-decoration:underline}
    
    .info-box{background:rgba(26,188,156,0.1);border:1px solid var(--primary);border-radius:6px;padding:1rem;margin-top:2rem;font-size:0.85rem;text-align:center}
    .info-box p{margin:0.5rem 0;color:var(--text-secondary)}
    .info-box code{background:var(--bg-light);padding:0.25rem 0.5rem;border-radius:3px;color:var(--primary)}
  </style>
</head>
<body>
  <div class="login-container">
    <div class="login-box">
      <div class="logo-center">
        <div class="logo-icon">TS</div>
        <div class="logo-text">TechSolution</div>
      </div>
      
      <h1>Connexion</h1>
      <p>Accédez au panneau d'administration</p>
      
      <?php if ($error): ?>
        <div class="error-message">
          ⚠️ <?php echo htmlspecialchars($error); ?>
        </div>
      <?php endif; ?>
      
      <form method="POST">
        <div class="form-group">
          <label for="username">Identifiant</label>
          <input type="text" id="username" name="username" required placeholder="Entrez votre identifiant">
        </div>
        
        <div class="form-group">
          <label for="password">Mot de passe</label>
          <input type="password" id="password" name="password" required placeholder="Entrez votre mot de passe">
        </div>
        
        <button type="submit" class="btn">Se connecter</button>
      </form>
      
      <div class="back-link">
        <a href="index.php">← Retour à l'accueil</a>
        <br style="margin:0.5rem 0">
        <a href="index.php" style="color:var(--text-secondary);font-size:0.8rem">ou accédez au site</a>
      </div>
      
      <div class="info-box">
        <p><strong>Identifiants de test :</strong></p>
        <p>Identifiant : <code>admin</code></p>
        <p>Mot de passe : <code>admin</code></p>
      </div>
    </div>
  </div>
</body>
</html>
