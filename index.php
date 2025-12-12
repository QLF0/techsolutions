
<?php // index.php - page d'accueil moderne ?>
<?php
session_start();
$isAdmin = !empty($_SESSION['is_admin']);
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>TechSolution - Solutions IT Modernes</title>
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
    
    /* HEADER */
    header{background:rgba(15,20,25,0.95);backdrop-filter:blur(10px);border-bottom:1px solid var(--border);position:sticky;top:0;z-index:1000;padding:1rem 0}
    .header-content{max-width:1400px;margin:0 auto;padding:0 2rem;display:flex;justify-content:space-between;align-items:center}
    .logo{display:flex;align-items:center;gap:0.75rem;font-size:1.5rem;font-weight:700;color:var(--text-primary);text-decoration:none}
    .logo-icon{width:40px;height:40px;background:var(--primary);border-radius:8px;display:flex;align-items:center;justify-content:center;font-weight:bold;color:#000}
    nav{display:flex;gap:2rem;align-items:center}
    nav a{color:var(--text-secondary);text-decoration:none;font-weight:500;transition:color 0.3s ease;position:relative}
    nav a:hover,nav a.active{color:var(--primary)}
    nav a.active::after{content:'';position:absolute;bottom:-5px;left:0;width:100%;height:2px;background:var(--primary)}
    .hamburger{display:none;flex-direction:column;gap:5px;cursor:pointer}
    .hamburger span{width:25px;height:3px;background:var(--primary);border-radius:2px;transition:0.3s}
    
    /* CONTAINER */
    .container{max-width:1400px;margin:0 auto;padding:0 2rem}
    section{padding:5rem 0}
    .section-label{display:inline-block;background:rgba(26,188,156,0.2);border:1px solid var(--primary);color:var(--primary);padding:0.5rem 1rem;border-radius:20px;font-size:0.85rem;font-weight:600;margin-bottom:1rem}
    
    /* HERO SECTION */
    .hero{padding:8rem 0;background:linear-gradient(135deg,rgba(26,188,156,0.1) 0%,rgba(15,29,39,0.5) 100%);border-bottom:1px solid var(--border)}
    .hero-content{max-width:800px}
    .hero h1{font-size:3.5rem;font-weight:700;margin-bottom:1.5rem;line-height:1.1}
    .hero h1 .highlight{background:var(--gradient);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}
    .hero p{font-size:1.2rem;color:var(--text-secondary);margin-bottom:2rem}
    .btn-group{display:flex;gap:1rem;flex-wrap:wrap}
    .btn{padding:1rem 2rem;border:none;border-radius:8px;font-size:1rem;font-weight:600;cursor:pointer;transition:all 0.3s ease;text-decoration:none;display:inline-block;text-align:center}
    .btn-primary{background:var(--gradient);color:white}
    .btn-primary:hover{transform:translateY(-3px);box-shadow:0 10px 30px rgba(26,188,156,0.3)}
    .btn-secondary{background:transparent;color:var(--primary);border:2px solid var(--primary)}
    .btn-secondary:hover{background:rgba(26,188,156,0.1);transform:translateY(-3px)}
    
    /* STATS */
    .stats{background:var(--bg-light);padding:3rem 0;border-top:1px solid var(--border);border-bottom:1px solid var(--border)}
    .stats-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:2rem;text-align:center}
    .stat-item{padding:2rem}
    .stat-number{font-size:2.5rem;font-weight:700;color:var(--primary);margin-bottom:0.5rem}
    .stat-label{color:var(--text-secondary);font-size:0.95rem}
    
    /* CARDS */
    .grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:2rem;margin:2rem 0}
    .card{background:var(--bg-card);border:1px solid var(--border);border-radius:12px;padding:2rem;transition:all 0.3s ease;cursor:pointer}
    .card:hover{border-color:var(--primary);transform:translateY(-5px);box-shadow:0 10px 40px rgba(26,188,156,0.2)}
    .card-icon{font-size:2.5rem;margin-bottom:1rem;width:60px;height:60px;background:rgba(26,188,156,0.1);border-radius:10px;display:flex;align-items:center;justify-content:center}
    .card h3{font-size:1.3rem;margin-bottom:1rem;color:var(--text-primary)}
    .card p{color:var(--text-secondary);font-size:0.95rem;line-height:1.6}
    .card-link{display:inline-block;margin-top:1rem;color:var(--primary);text-decoration:none;font-weight:600;transition:all 0.3s}
    .card-link:hover{color:var(--primary-dark)}
    
    /* CTA */
    .cta{background:var(--gradient);border-radius:12px;padding:4rem 2rem;text-align:center;margin:4rem 0}
    .cta h2{font-size:2.2rem;margin-bottom:1rem}
    .cta p{font-size:1.1rem;margin-bottom:2rem;opacity:0.95}
    
    /* SECTION TITLES */
    .section-title{font-size:2.5rem;font-weight:700;margin:1rem 0 1.5rem;line-height:1.2}
    .section-subtitle{color:var(--text-secondary);font-size:1.1rem;margin-bottom:3rem}
    
    /* FOOTER */
    footer{background:var(--bg-card);border-top:1px solid var(--border);padding:3rem 0 1rem;margin-top:5rem}
    .footer-content{display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:2rem;margin-bottom:2rem}
    .footer-section h4{margin-bottom:1rem;color:var(--primary)}
    .footer-section ul{list-style:none}
    .footer-section ul li{margin-bottom:0.75rem}
    .footer-section a{color:var(--text-secondary);text-decoration:none;transition:color 0.3s}
    .footer-section a:hover{color:var(--primary)}
    .footer-bottom{border-top:1px solid var(--border);padding-top:2rem;text-align:center;color:var(--text-secondary);font-size:0.9rem}
    
    @media (max-width:768px){
      nav{display:none;flex-direction:column;position:absolute;top:70px;left:0;right:0;background:var(--bg-dark);border-bottom:1px solid var(--border);padding:1rem 0;gap:0}
      nav.active{display:flex}
      nav a{padding:0.75rem 2rem;border-bottom:1px solid var(--border)}
      .hamburger{display:flex}
      .hero h1{font-size:2.2rem}
      .section-title{font-size:1.8rem}
      .grid{grid-template-columns:1fr}
      .btn-group{flex-direction:column}
      .btn{width:100%}
    }
  </style>
</head>
<body>
  <!-- HEADER -->
  <header>
    <div class="header-content">
      <a href="#" class="logo">
        <div class="logo-icon">TS</div>
        <span>TechSolution</span>
      </a>
      <nav id="nav">
        <a href="index.php" class="nav-link active">Accueil</a>
        <a href="actualites.php" class="nav-link">Actualités</a>
        <a href="contact.php" class="nav-link">Contact</a>
        <a href="login.php" class="nav-link">Admin</a>
      </nav>
      <div class="hamburger" id="hamburger">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </header>

  <!-- HERO SECTION -->
  <section class="hero" id="accueil">
    <div class="container">
      <div class="hero-content">
        <span class="section-label">Solutions IT de nouvelle génération</span>
        <h1>Transformez votre <span class="highlight">infrastructure IT</span></h1>
        <p>TechSolution révolutionne votre environnement technologique avec des solutions cloud avancées, une cybersécurité de pointe et un support technique d'excellence.</p>
        <div class="btn-group">
          <a href="#contact" class="btn btn-primary">Démarrer maintenant</a>
          <a href="#services" class="btn btn-secondary">Découvrir nos services</a>
        </div>
      </div>
    </div>
  </section>

  <!-- STATS SECTION -->
  <section class="stats">
    <div class="container">
      <div class="stats-grid">
        <div class="stat-item">
          <div class="stat-number">15+</div>
          <div class="stat-label">Années d'expérience</div>
        </div>
        <div class="stat-item">
          <div class="stat-number">500+</div>
          <div class="stat-label">Clients satisfaits</div>
        </div>
        <div class="stat-item">
          <div class="stat-number">50+</div>
          <div class="stat-label">Experts certifiés</div>
        </div>
        <div class="stat-item">
          <div class="stat-number">99.9%</div>
          <div class="stat-label">Disponibilité</div>
        </div>
      </div>
    </div>
  </section>

  <!-- À PROPOS SECTION -->
  <section id="a-propos">
    <div class="container">
      <span class="section-label">À propos de nous</span>
      <h2 class="section-title">L'excellence technologique <span class="highlight">comme standard</span></h2>
      <p class="section-subtitle">Depuis plus de 15 ans, TechSolution accompagne les entreprises dans leur transformation digitale.</p>
      
      <div class="grid">
        <div class="card">
          <div class="card-icon">📈</div>
          <h3>Performance optimale garantie</h3>
          <p>Nos architectures système haute performance garantissent la scalabilité de votre infrastructure.</p>
        </div>
        <div class="card">
          <div class="card-icon">👥</div>
          <h3>Équipe d'experts dédiée</h3>
          <p>Une équipe technique senior certifiée et passionnée par l'innovation technologique.</p>
        </div>
        <div class="card">
          <div class="card-icon">🔒</div>
          <h3>Certifications internationales</h3>
          <p>ISO 27001, SOC 2, GDPR compliant - Sécurité d'entreprise garantie.</p>
        </div>
        <div class="card">
          <div class="card-icon">⚡</div>
          <h3>Solutions innovantes</h3>
          <p>IA, Machine Learning, Cloud Native - Technologie de demain, disponible aujourd'hui.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- SERVICES SECTION -->
  <section id="services">
    <div class="container">
      <span class="section-label">Nos Services</span>
      <h2 class="section-title">Solutions complètes pour votre <span class="highlight">réussite</span></h2>
      <p class="section-subtitle">Des services IT de classe mondiale adaptés à vos besoins spécifiques</p>

      <div class="grid">
        <div class="card">
          <div class="card-icon">🏗️</div>
          <h3>Infrastructure IT</h3>
          <p>Architecture système haute performance et évolutive. Conception, déploiement et maintenance complète.</p>
          <a href="#" class="card-link">En savoir plus →</a>
        </div>
        <div class="card">
          <div class="card-icon">🔐</div>
          <h3>Cybersécurité</h3>
          <p>Protection avancée contre les menaces modernes. Audit, implémentation et gestion continue.</p>
          <a href="#" class="card-link">En savoir plus →</a>
        </div>
        <div class="card">
          <div class="card-icon">☁️</div>
          <h3>Cloud Computing</h3>
          <p>Migration et optimisation cloud native. Solutions multi-cloud pour maximiser votre ROI.</p>
          <a href="#" class="card-link">En savoir plus →</a>
        </div>
        <div class="card">
          <div class="card-icon">🎧</div>
          <h3>Support 24/7</h3>
          <p>Assistance technique disponible en permanence. Support SLA premium garanti.</p>
          <a href="#" class="card-link">En savoir plus →</a>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA SECTION -->
  <section>
    <div class="container">
      <div class="cta">
        <h2>Prêt à propulser votre entreprise ?</h2>
        <p>Contactez nos experts dès aujourd'hui pour une consultation gratuite et découvrez comment nous pouvons transformer votre infrastructure IT.</p>
        <a href="#contact" class="btn btn-secondary" style="margin-top:1rem;">Demander une démo gratuite</a>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer>
    <div class="container">
      <div class="footer-content">
        <div class="footer-section">
          <a href="#" class="logo" style="margin-bottom:1rem;">
            <div class="logo-icon">TS</div>
            <span>TechSolution</span>
          </a>
          <p style="color:var(--text-secondary);margin-bottom:1rem;">Excellence technologique au service de votre entreprise. Solutions innovantes et support de qualité.</p>
          <div style="display:flex;gap:1rem;">
            <a href="#" style="color:var(--primary);text-decoration:none;font-size:1.2rem;">f</a>
            <a href="#" style="color:var(--primary);text-decoration:none;font-size:1.2rem;">in</a>
            <a href="#" style="color:var(--primary);text-decoration:none;font-size:1.2rem;">𝕏</a>
          </div>
        </div>
        <div class="footer-section">
          <h4>Navigation</h4>
          <ul>
            <li><a href="#accueil">Accueil</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#admin">Admin</a></li>
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
    const hamburger = document.getElementById('hamburger');
    const nav = document.getElementById('nav');
    
    if (hamburger) {
      hamburger.addEventListener('click', () => {
        nav.classList.toggle('active');
      });
    }
    
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
      link.addEventListener('click', () => {
        nav.classList.remove('active');
        navLinks.forEach(l => l.classList.remove('active'));
        link.classList.add('active');
      });
    });
  </script>
</body>
</html>


    <h2 class="section-title">Pourquoi TechSolution ?</h2>
    
    <div class="features-grid">
      <div class="feature-item">
        <div class="feature-icon">✓</div>
        <div>
          <h4>Large gamme de PC</h4>
          <p>Du portable budgétaire au PC gaming haute performance, nous avons la solution pour vous.</p>
        </div>
      </div>
      <div class="feature-item">
        <div class="feature-icon">✓</div>
        <div>
          <h4>Conseil personnalisé</h4>
          <p>Nos experts vous conseillent pour trouver le matériel parfait selon vos besoins et votre budget.</p>
        </div>
      </div>
      <div class="feature-item">
        <div class="feature-icon">✓</div>
        <div>
          <h4>Installation gratuite</h4>
          <p>Installation, configuration et mise en service gratuites avec chaque achat.</p>
        </div>
      </div>
      <div class="feature-item">
        <div class="feature-icon">✓</div>
        <div>
          <h4>Garantie complète</h4>
          <p>Tous nos produits bénéficient d'une garantie complète et d'un excellent service après-vente.</p>
        </div>
      </div>
      <div class="feature-item">
        <div class="feature-icon">✓</div>
        <div>
          <h4>Support 48h</h4>
          <p>En cas de problème, notre équipe technique intervient dans les 48 heures.</p>
        </div>
      </div>
      <div class="feature-item">
        <div class="feature-icon">✓</div>
        <div>
          <h4>Prix compétitifs</h4>
          <p>Des tarifs avantageux sans compromis sur la qualité du matériel et du service.</p>
        </div>
      </div>
    </div>

    <div class="cta-section">
      <h2>Prêt à trouver le PC qui vous convient ?</h2>
      <p>Contactez nos experts pour une consultation gratuite et une démonstration personnalisée.</p>
      <a href="contact.php" class="btn" style="margin-top:1rem">Prendre rendez-vous</a>
    </div>

    <footer>
      © <?php echo date('Y'); ?> TechSolution — Tous droits réservés | Votre partenaire IT de confiance
    </footer>
  </div>
</body>
</html>
'@

$indexContent | Out-File -FilePath 'C:\Users\yassi\Documents\xamp\htdocs\techsolutions\index.php' -Encoding utf8 -Force
Write-Host 'index.php amélioré ! ✨' -ForegroundColor Green