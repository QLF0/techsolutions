<?php // contact.php - page contact et formulaire ?>
<?php session_start(); ?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Contact - TechSolution</title>
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
    
    .btn{padding:0.65rem 1.5rem;border:none;border-radius:6px;cursor:pointer;font-weight:600;transition:all 0.3s;text-decoration:none;display:inline-block;background:var(--gradient);color:white}
    .btn:hover{transform:translateY(-2px);box-shadow:0 6px 16px rgba(26,188,156,0.3)}
    
    .contact-grid{display:grid;grid-template-columns:1fr 1fr;gap:3rem;margin-top:3rem}
    .contact-form{background:var(--bg-card);border:1px solid var(--border);padding:2rem;border-radius:12px}
    .contact-info{display:grid;gap:2rem}
    
    .info-card{background:var(--bg-card);border:1px solid var(--border);padding:2rem;border-radius:12px;display:flex;gap:1.5rem}
    .info-icon{font-size:2rem;min-width:3rem;text-align:center}
    .info-content h4{color:var(--primary);margin-bottom:0.5rem;font-size:1rem}
    .info-content p{color:var(--text-secondary);margin-bottom:0.25rem}
    .info-content a{color:var(--primary);text-decoration:none}
    
    .form-group{margin-bottom:1.5rem}
    .form-group label{display:block;margin-bottom:0.5rem;font-weight:600}
    .form-group input,.form-group textarea,.form-group select{width:100%;padding:0.75rem;background:var(--bg-light);border:1px solid var(--border);border-radius:6px;color:var(--text-primary);font-family:inherit}
    .form-group input:focus,.form-group textarea:focus{outline:none;border-color:var(--primary);box-shadow:0 0 0 2px rgba(26,188,156,0.1)}
    .form-group textarea{resize:vertical;min-height:120px}
    
    .map-container{background:var(--bg-card);border:1px solid var(--border);border-radius:12px;overflow:hidden;height:400px;margin:3rem 0}
    .map-placeholder{width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:1.2rem;color:var(--text-secondary)}
    
    .emergency-section{background:linear-gradient(135deg,#e74c3c 0%,#c0392b 100%);border-radius:12px;padding:2rem;margin:3rem 0;text-align:center}
    .emergency-section h3{font-size:1.5rem;margin-bottom:1rem;color:white}
    .emergency-section p{color:rgba(255,255,255,0.9);margin-bottom:1rem}
    .emergency-section a{color:white;text-decoration:none;font-weight:bold;font-size:1.3rem}
    
    .team-section{margin:3rem 0}
    .team-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:2rem;margin-top:2rem}
    .team-card{background:var(--bg-card);border:1px solid var(--border);border-radius:12px;overflow:hidden;text-align:center;transition:transform 0.3s}
    .team-card:hover{transform:translateY(-5px)}
    .team-avatar{width:100%;height:200px;background:linear-gradient(135deg,var(--primary) 0%,#0a9d7f 100%);display:flex;align-items:center;justify-content:center;font-size:3rem}
    .team-info{padding:1.5rem}
    .team-info h4{color:var(--primary);margin-bottom:0.25rem}
    .team-info p{color:var(--text-secondary);font-size:0.9rem;margin-bottom:0.75rem}
    
    .faq-section{margin:3rem 0}
    .faq-item{background:var(--bg-card);border:1px solid var(--border);margin-bottom:1rem;border-radius:8px;overflow:hidden}
    .faq-question{padding:1.5rem;cursor:pointer;display:flex;justify-content:space-between;align-items:center;transition:background 0.3s;font-weight:600}
    .faq-question:hover{background:var(--bg-light)}
    .faq-toggle{transition:transform 0.3s}
    .faq-answer{padding:0 1.5rem;max-height:0;overflow:hidden;transition:max-height 0.3s,padding 0.3s}
    .faq-answer.open{padding:0 1.5rem 1.5rem;max-height:500px}
    
    .newsletter-section{background:var(--bg-card);border:1px solid var(--border);padding:2rem;border-radius:12px;text-align:center;margin:3rem 0}
    .newsletter-section h3{margin-bottom:1rem}
    .newsletter-form{display:flex;gap:0.5rem;margin-top:1rem;flex-wrap:wrap;justify-content:center}
    .newsletter-form input{flex:1;min-width:250px;padding:0.75rem;background:var(--bg-light);border:1px solid var(--border);border-radius:6px;color:var(--text-primary)}
    
    footer{background:var(--bg-card);border-top:1px solid var(--border);padding:3rem 0 1rem;margin-top:5rem}
    .footer-content{display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:2rem;margin-bottom:2rem}
    .footer-section h4{margin-bottom:1rem;color:var(--primary)}
    .footer-section ul{list-style:none}
    .footer-section ul li{margin-bottom:0.75rem}
    .footer-section a{color:var(--text-secondary);text-decoration:none;transition:color 0.3s}
    .footer-section a:hover{color:var(--primary)}
    .footer-bottom{border-top:1px solid var(--border);padding-top:2rem;text-align:center;color:var(--text-secondary);font-size:0.9rem}
    
    @media (max-width:768px){
      .contact-grid{grid-template-columns:1fr}
      .map-container{height:250px}
      .team-grid{grid-template-columns:1fr}
      .newsletter-form{flex-direction:column}
      .newsletter-form input{min-width:auto}
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
        <a href="actualites.php" class="nav-link">Actualités</a>
        <a href="contact.php" class="nav-link active">Contact</a>
        <a href="login.php" class="nav-link">Admin</a>
      </nav>
    </div>
  </header>

  <section>
    <div class="container">
      <span class="section-label">Communication</span>
      <h1 class="section-title">Nous contacter</h1>
      <p style="color:var(--text-secondary);font-size:1.1rem">Avez-vous une question ? Nous sommes là pour vous aider !</p>

      <div class="contact-grid">
        <form class="contact-form" onsubmit="handleContact(event)">
          <h2 style="margin-bottom:1.5rem">Formulaire de contact</h2>
          
          <div class="form-group">
            <label>Nom</label>
            <input type="text" required placeholder="Votre nom">
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="email" required placeholder="Votre email">
          </div>

          <div class="form-group">
            <label>Téléphone</label>
            <input type="tel" placeholder="Votre téléphone">
          </div>

          <div class="form-group">
            <label>Sujet</label>
            <select required>
              <option value="">Choisir un sujet...</option>
              <option value="infrastructure">Infrastructure IT</option>
              <option value="cybersecurite">Cybersécurité</option>
              <option value="cloud">Cloud Computing</option>
              <option value="support">Support technique</option>
              <option value="autre">Autre</option>
            </select>
          </div>

          <div class="form-group">
            <label>Message</label>
            <textarea required placeholder="Votre message..."></textarea>
          </div>

          <button type="submit" class="btn" style="width:100%">Envoyer le message</button>
        </form>

        <div class="contact-info">
          <div class="info-card">
            <div class="info-icon">📍</div>
            <div class="info-content">
              <h4>Adresse</h4>
              <p>123 Rue de la Tech</p>
              <p>75001 Paris, France</p>
            </div>
          </div>

          <div class="info-card">
            <div class="info-icon">☎️</div>
            <div class="info-content">
              <h4>Téléphone</h4>
              <a href="tel:+33123456789">+33 1 23 45 67 89</a>
              <p>Lun - Ven: 09:00 - 18:00</p>
            </div>
          </div>

          <div class="info-card">
            <div class="info-icon">✉️</div>
            <div class="info-content">
              <h4>Email</h4>
              <a href="mailto:contact@techsolution.fr">contact@techsolution.fr</a>
              <p>Réponse sous 24h</p>
            </div>
          </div>

          <div class="info-card">
            <div class="info-icon">⏰</div>
            <div class="info-content">
              <h4>Horaires</h4>
              <p>Lun - Ven: 09:00 - 18:00</p>
              <p>Sam: 10:00 - 14:00</p>
            </div>
          </div>
        </div>
      </div>

      <div class="map-container">
        <div class="map-placeholder">
          🗺️ Carte Google Maps intégrée (123 Rue de la Tech, 75001 Paris)
        </div>
      </div>

      <div class="emergency-section">
        <h3>🚨 Support d'urgence</h3>
        <p>Problème technique urgent ? Appelez notre équipe disponible 24/7</p>
        <a href="tel:+33912345678">+33 9 12 34 56 78</a>
      </div>

      <div class="team-section">
        <span class="section-label">Notre équipe</span>
        <h2 style="font-size:2rem;margin:1rem 0 1.5rem">Experts à votre service</h2>

        <div class="team-grid">
          <div class="team-card">
            <div class="team-avatar">👨‍💼</div>
            <div class="team-info">
              <h4>Marc Dubois</h4>
              <p>Directeur IT</p>
              <a href="mailto:marc@techsolution.fr" style="color:var(--primary);text-decoration:none">Contact</a>
            </div>
          </div>

          <div class="team-card">
            <div class="team-avatar">👩‍💼</div>
            <div class="team-info">
              <h4>Sophie Laurent</h4>
              <p>Responsable Cloud</p>
              <a href="mailto:sophie@techsolution.fr" style="color:var(--primary);text-decoration:none">Contact</a>
            </div>
          </div>

          <div class="team-card">
            <div class="team-avatar">👨‍💻</div>
            <div class="team-info">
              <h4>Thomas Bernard</h4>
              <p>Expert Cybersécurité</p>
              <a href="mailto:thomas@techsolution.fr" style="color:var(--primary);text-decoration:none">Contact</a>
            </div>
          </div>

          <div class="team-card">
            <div class="team-avatar">👩‍💻</div>
            <div class="team-info">
              <h4>Julie Martin</h4>
              <p>Support Client</p>
              <a href="mailto:julie@techsolution.fr" style="color:var(--primary);text-decoration:none">Contact</a>
            </div>
          </div>
        </div>
      </div>

      <div class="faq-section">
        <span class="section-label">Questions</span>
        <h2 style="font-size:2rem;margin:1rem 0 1.5rem">Questions fréquemment posées</h2>

        <div class="faq-item">
          <div class="faq-question" onclick="toggleFaq(this)">
            <span>Quel est le délai de réponse moyen ?</span>
            <span class="faq-toggle">⌄</span>
          </div>
          <div class="faq-answer">
            <p>Nous nous efforçons de répondre à toutes les demandes dans un délai de 24 heures en jours ouvrables. Les demandes urgentes reçoivent une priorité plus élevée.</p>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question" onclick="toggleFaq(this)">
            <span>Proposez-vous un support 24/7 ?</span>
            <span class="faq-toggle">⌄</span>
          </div>
          <div class="faq-answer">
            <p>Oui, notre équipe support d'urgence est disponible 24/7 pour les problèmes critiques. Appelez notre numéro d'urgence pour une assistance immédiate.</p>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question" onclick="toggleFaq(this)">
            <span>Quels services proposez-vous ?</span>
            <span class="faq-toggle">⌄</span>
          </div>
          <div class="faq-answer">
            <p>Nous proposons une gamme complète de services : Infrastructure IT, Cybersécurité, Cloud Computing, Support technique 24/7, Audit IT et Formation.</p>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question" onclick="toggleFaq(this)">
            <span>Comment puis-je recevoir un devis ?</span>
            <span class="faq-toggle">⌄</span>
          </div>
          <div class="faq-answer">
            <p>Remplissez notre formulaire de contact avec vos besoins spécifiques, ou appelez-nous directement. Un expert vous contactera pour discuter de votre projet et vous proposer un devis gratuit.</p>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question" onclick="toggleFaq(this)">
            <span>Travaillez-vous avec des entreprises de toutes tailles ?</span>
            <span class="faq-toggle">⌄</span>
          </div>
          <div class="faq-answer">
            <p>Absolument ! Nos solutions sont scalables et adaptées aux petites startups comme aux grandes entreprises. Nous personnalisons chaque offre selon vos besoins.</p>
          </div>
        </div>
      </div>

      <div class="newsletter-section">
        <h3>📬 Restez informé</h3>
        <p style="color:var(--text-secondary);margin-bottom:1rem">Inscrivez-vous à notre newsletter pour recevoir les dernières actualités</p>
        <form class="newsletter-form" onsubmit="handleNewsletter(event)">
          <input type="email" required placeholder="Votre email" style="flex:1;">
          <button type="submit" class="btn" style="white-space:nowrap">S'abonner</button>
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
          <h4>Services</h4>
          <ul>
            <li><a href="#">Infrastructure IT</a></li>
            <li><a href="#">Cybersécurité</a></li>
            <li><a href="#">Cloud Computing</a></li>
            <li><a href="#">Support 24/7</a></li>
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
    function toggleFaq(element) {
      const answer = element.nextElementSibling;
      answer.classList.toggle('open');
      element.querySelector('.faq-toggle').style.transform = answer.classList.contains('open') ? 'rotate(180deg)' : 'rotate(0)';
    }

    function handleContact(e) {
      e.preventDefault();
      alert('Merci ! Votre message a été envoyé. Nous vous répondrons bientôt.');
      e.target.reset();
    }

    function handleNewsletter(e) {
      e.preventDefault();
      alert('Merci de votre inscription !');
      e.target.reset();
    }
  </script>
</body>
</html>
