<?php // actualites.php - page des actualités ?>
<?php session_start(); ?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Actualités - TechSolution</title>
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
    body{font-family:'Segoe UI',Roboto,Helvetica,Arial,sans-serif;background:var(--bg-dark);color:var(--text-primary);line-height:1.6;overflow-x:hidden}
    
    header{background:rgba(15,20,25,0.95);backdrop-filter:blur(10px);border-bottom:1px solid var(--border);position:sticky;top:0;z-index:1000;padding:1rem 0}
    .header-content{max-width:1400px;margin:0 auto;padding:0 2rem;display:flex;justify-content:space-between;align-items:center}
    .logo{display:flex;align-items:center;gap:0.75rem;font-size:1.5rem;font-weight:700;color:var(--text-primary);text-decoration:none}
    .logo-icon{width:40px;height:40px;background:var(--primary);border-radius:8px;display:flex;align-items:center;justify-content:center;font-weight:bold;color:#000}
    nav{display:flex;gap:2rem;align-items:center}
    nav a{color:var(--text-secondary);text-decoration:none;font-weight:500;transition:color 0.3s ease;position:relative}
    nav a:hover,nav a.active{color:var(--primary)}
    nav a.active::after{content:'';position:absolute;bottom:-5px;left:0;width:100%;height:2px;background:var(--primary)}
    
    .container{max-width:1400px;margin:0 auto;padding:0 2rem}
    section{padding:5rem 0}
    .section-label{display:inline-block;background:rgba(26,188,156,0.2);border:1px solid var(--primary);color:var(--primary);padding:0.5rem 1rem;border-radius:20px;font-size:0.85rem;font-weight:600;margin-bottom:1rem}
    .section-title{font-size:2.5rem;font-weight:700;margin:1rem 0 1.5rem;line-height:1.2}
    .highlight{background:var(--gradient);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}
    .section-subtitle{color:var(--text-secondary);font-size:1.1rem;margin-bottom:3rem}
    
    .grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));gap:2rem;margin:2rem 0}
    .card{background:var(--bg-card);border:1px solid var(--border);border-radius:12px;padding:2rem;transition:all 0.3s ease;cursor:pointer;display:flex;flex-direction:column}
    .card:hover{border-color:var(--primary);transform:translateY(-5px);box-shadow:0 10px 40px rgba(26,188,156,0.2)}
    .card-img{width:calc(100% + 4rem);margin:-2rem -2rem 1rem;height:200px;border-radius:10px 10px 0 0;background:linear-gradient(135deg,#1ABC9C 0%,#0a9d7f 100%);display:flex;align-items:center;justify-content:center;font-size:3rem}
    .card h3{font-size:1.3rem;margin:1rem 0;color:var(--text-primary);flex-grow:1}
    .card p{color:var(--text-secondary);font-size:0.95rem;line-height:1.6;flex-grow:1}
    .card-meta{display:flex;justify-content:space-between;align-items:center;margin-top:1rem;padding-top:1rem;border-top:1px solid var(--border);color:var(--text-secondary);font-size:0.85rem}
    .card-link{display:inline-block;margin-top:1rem;color:var(--primary);text-decoration:none;font-weight:600}
    .card-link:hover{color:var(--primary-dark)}
    
    .pagination{text-align:center;margin-top:4rem;padding-top:2rem;border-top:1px solid var(--border);display:flex;justify-content:center;gap:1rem;align-items:center;flex-wrap:wrap}
    .btn{padding:1rem 2rem;border:none;border-radius:8px;font-size:1rem;font-weight:600;cursor:pointer;transition:all 0.3s ease;text-decoration:none;display:inline-block;text-align:center}
    .btn-primary{background:var(--gradient);color:white}
    .btn-primary:hover{transform:translateY(-3px);box-shadow:0 10px 30px rgba(26,188,156,0.3)}
    .btn-secondary{background:transparent;color:var(--primary);border:2px solid var(--primary)}
    .btn-secondary:hover{background:rgba(26,188,156,0.1);transform:translateY(-3px)}
    .btn-pagination{padding:0.5rem 1rem;font-size:0.9rem;width:auto}
    
    .btn-pagination.active{background:var(--primary);color:white;border:none}
    
    .newsletter{background:linear-gradient(135deg,rgba(26,188,156,0.15) 0%,transparent 100%);border:1px solid rgba(26,188,156,0.3);border-radius:12px;padding:4rem 2rem;text-align:center;margin-top:4rem}
    .newsletter h2{font-size:2rem;margin-bottom:0.5rem}
    .newsletter p{color:var(--text-secondary);margin-bottom:2rem}
    .newsletter form{display:flex;gap:1rem;max-width:500px;margin:0 auto}
    .newsletter input{flex:1;padding:0.75rem;background:var(--bg-card);border:1px solid var(--border);border-radius:6px;color:var(--text-primary);font-family:inherit}
    .newsletter input:focus{outline:none;border-color:var(--primary)}
    
    footer{background:var(--bg-card);border-top:1px solid var(--border);padding:3rem 0 1rem;margin-top:5rem}
    .footer-content{display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:2rem;margin-bottom:2rem}
    .footer-section h4{margin-bottom:1rem;color:var(--primary)}
    .footer-section ul{list-style:none}
    .footer-section ul li{margin-bottom:0.75rem}
    .footer-section a{color:var(--text-secondary);text-decoration:none;transition:color 0.3s}
    .footer-section a:hover{color:var(--primary)}
    .footer-bottom{border-top:1px solid var(--border);padding-top:2rem;text-align:center;color:var(--text-secondary);font-size:0.9rem}
    
    @media (max-width:768px){
      .section-title{font-size:1.8rem}
      .grid{grid-template-columns:1fr}
      .newsletter form{flex-direction:column}
    }
  </style>
</head>
<body>
  <header>
    <div class="header-content">
      <a href="index.php" class="logo">
        <div class="logo-icon">TS</div>
        <span>TechSolution</span>
      </a>
      <nav>
        <a href="index.php" class="nav-link">Accueil</a>
        <a href="actualites.php" class="nav-link active">Actualités</a>
        <a href="contact.php" class="nav-link">Contact</a>
        <a href="login.php" class="nav-link">Admin</a>
      </nav>
    </div>
  </header>

  <section style="padding-top:4rem">
    <div class="container">
      <span class="section-label">Actualités & Insights</span>
      <h1 class="section-title" style="font-size:3rem">Restez à la pointe de l'<span class="highlight">innovation</span></h1>
      <p class="section-subtitle">Découvrez nos dernières actualités, innovations et tendances technologiques</p>

      <div class="grid">
        <div class="card">
          <div class="card-img">🤖</div>
          <span class="section-label">Innovation</span>
          <h3>TechSolution lance sa nouvelle plateforme Cloud AI</h3>
          <p>Découvrez notre solution révolutionnaire d'intelligence artificielle intégrée au cloud, conçue pour transformer vos processus métier et augmenter votre productivité de 300%.</p>
          <div class="card-meta">
            <small>📅 8 décembre 2025 | Sophie Laurent</small>
          </div>
          <a href="#" class="card-link">Lire l'article complet →</a>
        </div>

        <div class="card">
          <div class="card-img" style="background:linear-gradient(135deg,#e74c3c 0%,#c0392b 100%)">🔐</div>
          <span class="section-label">Sécurité</span>
          <h3>Certification ISO 27001 : Un nouveau cap franchi</h3>
          <p>TechSolution renforce son engagement en matière de sécurité avec la certification ISO 27001, garantissant les standards les plus élevés de protection des données.</p>
          <div class="card-meta">
            <small>📅 1 décembre 2025 | Marc Dubois</small>
          </div>
          <a href="#" class="card-link">Lire l'article complet →</a>
        </div>

        <div class="card">
          <div class="card-img" style="background:linear-gradient(135deg,#3498db 0%,#2980b9 100%)">☁️</div>
          <span class="section-label">Partenariat</span>
          <h3>Partenariat stratégique avec Microsoft Azure</h3>
          <p>Nous sommes fiers d'annoncer notre statut de partenaire Gold Microsoft Azure pour offrir les meilleures solutions cloud d'entreprise.</p>
          <div class="card-meta">
            <small>📅 25 novembre 2025 | Julie Martin</small>
          </div>
          <a href="#" class="card-link">Lire l'article complet →</a>
        </div>

        <div class="card">
          <div class="card-img" style="background:linear-gradient(135deg,#f39c12 0%,#e67e22 100%)">🏆</div>
          <span class="section-label">Infrastructure</span>
          <h3>Nouveau datacenter à Lyon : Performance maximale</h3>
          <p>Ouverture de notre centre de données ultra-moderne offrant une latence ultra-faible et une disponibilité maximale pour vos applications critiques.</p>
          <div class="card-meta">
            <small>📅 18 novembre 2025 | Thomas Bernard</small>
          </div>
          <a href="#" class="card-link">Lire l'article complet →</a>
        </div>

        <div class="card">
          <div class="card-img" style="background:linear-gradient(135deg,#9b59b6 0%,#8e44ad 100%)">🎓</div>
          <span class="section-label">Services</span>
          <h3>Support Premium Plus : Le summum du service client</h3>
          <p>Notre nouvelle offre garantit un temps de réponse de 5 minutes avec un expert dédié pour résoudre vos enjeux critiques.</p>
          <div class="card-meta">
            <small>📅 10 novembre 2025 | Sophie Laurent</small>
          </div>
          <a href="#" class="card-link">Lire l'article complet →</a>
        </div>

        <div class="card">
          <div class="card-img">📊</div>
          <span class="section-label">Événement</span>
          <h3>Webinaire : Les tendances IT de 2026</h3>
          <p>Rejoignez-nous le 15 décembre pour explorer l'avenir de la technologie d'entreprise avec nos experts et partenaires leaders du secteur.</p>
          <div class="card-meta">
            <small>📅 5 novembre 2025 | Marc Dubois</small>
          </div>
          <a href="#" class="card-link">Lire l'article complet →</a>
        </div>
      </div>

      <div class="pagination">
        <button class="btn btn-secondary btn-pagination">← Précédent</button>
        <div style="display:flex;gap:0.5rem">
          <button class="btn btn-pagination active">1</button>
          <button class="btn btn-secondary btn-pagination">2</button>
          <button class="btn btn-secondary btn-pagination">3</button>
        </div>
        <button class="btn btn-secondary btn-pagination">Suivant →</button>
      </div>
    </div>
  </section>

  <section style="margin-top:4rem">
    <div class="container">
      <div class="newsletter">
        <h2>Ne manquez aucune actualité</h2>
        <p>Recevez nos dernières innovations et insights directement dans votre boîte mail</p>
        <form onsubmit="handleNewsletterSignup(event)">
          <input type="email" placeholder="votre@email.com" required>
          <button type="submit" class="btn btn-primary">S'abonner</button>
        </form>
      </div>
    </div>
  </section>

  <footer>
    <div class="container">
      <div class="footer-content">
        <div class="footer-section">
          <a href="index.php" class="logo" style="margin-bottom:1rem">
            <div class="logo-icon">TS</div>
            <span>TechSolution</span>
          </a>
          <p style="color:var(--text-secondary);margin-bottom:1rem">Excellence technologique au service de votre entreprise. Solutions innovantes et support de qualité.</p>
        </div>
        <div class="footer-section">
          <h4>Navigation</h4>
          <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="actualites.php">Actualités</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="login.php">Admin</a></li>
          </ul>
        </div>
        <div class="footer-section">
          <h4>Contact</h4>
          <ul>
            <li><a href="mailto:contact@techsolution.fr">contact@techsolution.fr</a></li>
            <li><a href="tel:+33123456789">+33 1 23 45 67 89</a></li>
            <li>Paris, France</li>
          </ul>
        </div>
        <div class="footer-section">
          <h4>Légal</h4>
          <ul>
            <li><a href="#">Confidentialité</a></li>
            <li><a href="#">Mentions légales</a></li>
            <li><a href="#">CGU</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        <p>© 2025 TechSolution. Tous droits réservés.</p>
      </div>
    </div>
  </footer>

  <script>
    function handleNewsletterSignup(e){
      e.preventDefault();
      alert('Merci de votre inscription!');
      e.target.reset();
    }
  </script>
</body>
</html>
