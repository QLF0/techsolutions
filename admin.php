<?php // admin.php - page administration ?>
<?php session_start(); 
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Admin - TechSolution</title>
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
    
    .admin-grid{display:grid;grid-template-columns:250px 1fr;gap:2rem;margin-top:2rem}
    .admin-sidebar{background:var(--bg-card);border:1px solid var(--border);border-radius:12px;padding:2rem;height:fit-content;position:sticky;top:100px}
    .admin-sidebar h3{color:var(--primary);margin-bottom:1rem;font-size:1rem}
    .admin-sidebar ul{list-style:none}
    .admin-sidebar li{margin-bottom:0.5rem}
    .admin-sidebar a{display:block;padding:0.75rem 1rem;color:var(--text-secondary);text-decoration:none;border-radius:6px;transition:all 0.3s}
    .admin-sidebar a:hover,.admin-sidebar a.active{background:rgba(26,188,156,0.1);color:var(--primary)}
    
    .admin-content{background:var(--bg-card);border:1px solid var(--border);border-radius:12px;padding:2rem}
    .admin-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:2rem;padding-bottom:2rem;border-bottom:1px solid var(--border)}
    
    .stats-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1rem;margin-bottom:2rem}
    .stat-card{background:var(--bg-light);border:1px solid var(--border);padding:1.5rem;border-radius:8px;text-align:center}
    .stat-card h4{color:var(--text-secondary);font-size:0.9rem;margin-bottom:0.5rem}
    .stat-card .number{font-size:2rem;font-weight:700;color:var(--primary)}
    
    .table-responsive{overflow-x:auto;border-radius:8px;border:1px solid var(--border)}
    table{width:100%;border-collapse:collapse}
    th{background:var(--bg-light);border-bottom:1px solid var(--border);padding:1rem;text-align:left;font-weight:600;color:var(--text-primary)}
    td{padding:1rem;border-bottom:1px solid var(--border)}
    tr:hover{background:var(--bg-light)}
    
    .badge{display:inline-block;padding:0.25rem 0.75rem;border-radius:20px;font-size:0.8rem;font-weight:600}
    .badge-published{background:rgba(26,188,156,0.2);color:var(--primary)}
    .badge-draft{background:rgba(100,116,139,0.2);color:var(--text-secondary)}
    
    .btn{padding:0.65rem 1.5rem;border:none;border-radius:6px;cursor:pointer;font-weight:600;transition:all 0.3s;text-decoration:none;display:inline-block}
    .btn-primary{background:var(--gradient);color:white}
    .btn-primary:hover{transform:translateY(-2px);box-shadow:0 6px 16px rgba(26,188,156,0.3)}
    .btn-small{padding:0.5rem 1rem;font-size:0.85rem}
    .btn-edit{background:var(--primary);color:white}
    .btn-delete{background:rgba(231,76,60,0.2);color:#e74c3c}
    .btn-delete:hover{background:#e74c3c;color:white}
    
    .action-buttons{display:flex;gap:0.5rem}
    
    .form-group{margin-bottom:1.5rem}
    .form-group label{display:block;margin-bottom:0.5rem;font-weight:600}
    .form-group input,.form-group textarea,.form-group select{width:100%;padding:0.75rem;background:var(--bg-light);border:1px solid var(--border);border-radius:6px;color:var(--text-primary);font-family:inherit}
    .form-group input:focus,.form-group textarea:focus{outline:none;border-color:var(--primary)}
    
    footer{background:var(--bg-card);border-top:1px solid var(--border);padding:3rem 0 1rem;margin-top:5rem}
    .footer-content{display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:2rem;margin-bottom:2rem}
    .footer-section h4{margin-bottom:1rem;color:var(--primary)}
    .footer-section ul{list-style:none}
    .footer-section ul li{margin-bottom:0.75rem}
    .footer-section a{color:var(--text-secondary);text-decoration:none;transition:color 0.3s}
    .footer-section a:hover{color:var(--primary)}
    .footer-bottom{border-top:1px solid var(--border);padding-top:2rem;text-align:center;color:var(--text-secondary);font-size:0.9rem}
    
    @media (max-width:768px){
      .admin-grid{grid-template-columns:1fr}
      .admin-sidebar{position:static}
      .admin-header{flex-direction:column;gap:1rem;align-items:flex-start}
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
        <a href="contact.php" class="nav-link">Contact</a>
        <a href="admin.php" class="nav-link active">Admin</a>
        <a href="logout.php" class="nav-link" style="color:#e74c3c">Déconnexion</a>
      </nav>
    </div>
  </header>

  <section>
    <div class="container">
      <span class="section-label">Panneau de contrôle</span>
      <h1 style="font-size:2.5rem;margin:1rem 0">Administration</h1>
      <p style="color:var(--text-secondary);margin-bottom:2rem">Gérez le contenu et les paramètres de votre site</p>

      <div class="admin-grid">
        <div class="admin-sidebar">
          <h3>Menu</h3>
          <ul>
            <li><a href="#dashboard" class="menu-link active">� Parc Informatique</a></li>
            <li><a href="#pages" class="menu-link">📄 Pages</a></li>
            <li><a href="#actualites" class="menu-link">📰 Actualités</a></li>
            <li><a href="#contacts" class="menu-link">💬 Contacts</a></li>
            <li><a href="#parametres" class="menu-link">⚙️ Paramètres</a></li>
          </ul>
        </div>

        <div class="admin-content">
          <div id="dashboard" class="admin-section active">
            <div class="admin-header">
              <div>
                <h2>Parc Informatique</h2>
                <p style="color:var(--text-secondary);margin-top:0.5rem">Vue d'ensemble des 7 ordinateurs</p>
              </div>
              <button class="btn btn-primary" onclick="location.reload()">Rafraîchir</button>
            </div>

            <div class="stats-grid">
              <div class="stat-card">
                <h4>Total PC</h4>
                <div class="number">7</div>
              </div>
              <div class="stat-card">
                <h4>PC Actifs</h4>
                <div class="number">6</div>
              </div>
              <div class="stat-card">
                <h4>PC Inactifs</h4>
                <div class="number">1</div>
              </div>
              <div class="stat-card">
                <h4>Dernier contrôle</h4>
                <div class="number" style="font-size:0.9rem">12/12/2025</div>
              </div>
            </div>

            <h3 style="margin:2rem 0 1rem">📊 Détail du parc</h3>
            <div class="table-responsive">
              <table>
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nom du PC</th>
                    <th>Utilisateur</th>
                    <th>OS</th>
                    <th>RAM</th>
                    <th>Processeur</th>
                    <th>État</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>#001</td>
                    <td>PC-BUREAU-01</td>
                    <td>Marc Dubois</td>
                    <td>Windows 11 Pro</td>
                    <td>16 GB</td>
                    <td>Intel i7 12ème gen</td>
                    <td><span class="badge badge-published">Actif</span></td>
                    <td><button class="btn btn-small btn-edit" onclick="alert('Détails PC-BUREAU-01')">Info</button></td>
                  </tr>
                  <tr>
                    <td>#002</td>
                    <td>PC-BUREAU-02</td>
                    <td>Sophie Laurent</td>
                    <td>Windows 11 Pro</td>
                    <td>32 GB</td>
                    <td>Intel i9 12ème gen</td>
                    <td><span class="badge badge-published">Actif</span></td>
                    <td><button class="btn btn-small btn-edit" onclick="alert('Détails PC-BUREAU-02')">Info</button></td>
                  </tr>
                  <tr>
                    <td>#003</td>
                    <td>PC-BUREAU-03</td>
                    <td>Thomas Bernard</td>
                    <td>Windows 11 Pro</td>
                    <td>16 GB</td>
                    <td>AMD Ryzen 7</td>
                    <td><span class="badge badge-published">Actif</span></td>
                    <td><button class="btn btn-small btn-edit" onclick="alert('Détails PC-BUREAU-03')">Info</button></td>
                  </tr>
                  <tr>
                    <td>#004</td>
                    <td>PC-BUREAU-04</td>
                    <td>Julie Martin</td>
                    <td>Windows 10 Pro</td>
                    <td>8 GB</td>
                    <td>Intel i5 11ème gen</td>
                    <td><span class="badge badge-published">Actif</span></td>
                    <td><button class="btn btn-small btn-edit" onclick="alert('Détails PC-BUREAU-04')">Info</button></td>
                  </tr>
                  <tr>
                    <td>#005</td>
                    <td>PC-BUREAU-05</td>
                    <td>Luc Rousseau</td>
                    <td>Windows 11 Pro</td>
                    <td>16 GB</td>
                    <td>Intel i7 12ème gen</td>
                    <td><span class="badge badge-published">Actif</span></td>
                    <td><button class="btn btn-small btn-edit" onclick="alert('Détails PC-BUREAU-05')">Info</button></td>
                  </tr>
                  <tr>
                    <td>#006</td>
                    <td>PC-SERVEUR-01</td>
                    <td>Admin Système</td>
                    <td>Linux Ubuntu 22</td>
                    <td>64 GB</td>
                    <td>Intel Xeon</td>
                    <td><span class="badge badge-published">Actif</span></td>
                    <td><button class="btn btn-small btn-edit" onclick="alert('Détails PC-SERVEUR-01')">Info</button></td>
                  </tr>
                  <tr>
                    <td>#007</td>
                    <td>PC-BUREAU-06</td>
                    <td>Marie Leclerc</td>
                    <td>Windows 10 Home</td>
                    <td>8 GB</td>
                    <td>Intel i5 10ème gen</td>
                    <td><span class="badge badge-draft">Inactif</span></td>
                    <td><button class="btn btn-small btn-edit" onclick="alert('Détails PC-BUREAU-06')">Info</button></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div id="pages" class="admin-section" style="display:none">
            <div class="admin-header">
              <h2>Gestion des Pages</h2>
              <button class="btn btn-primary" onclick="alert('Créer une nouvelle page')">+ Nouvelle page</button>
            </div>

            <div class="table-responsive">
              <table>
                <thead>
                  <tr>
                    <th>Titre</th>
                    <th>Slug</th>
                    <th>Statut</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Page d'accueil</td>
                    <td>/index.php</td>
                    <td><span class="badge badge-published">Publié</span></td>
                    <td><div class="action-buttons"><button class="btn btn-small btn-edit">Modifier</button></div></td>
                  </tr>
                  <tr>
                    <td>Actualités</td>
                    <td>/actualites.php</td>
                    <td><span class="badge badge-published">Publié</span></td>
                    <td><div class="action-buttons"><button class="btn btn-small btn-edit">Modifier</button></div></td>
                  </tr>
                  <tr>
                    <td>Contact</td>
                    <td>/contact.php</td>
                    <td><span class="badge badge-published">Publié</span></td>
                    <td><div class="action-buttons"><button class="btn btn-small btn-edit">Modifier</button></div></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div id="actualites" class="admin-section" style="display:none">
            <div class="admin-header">
              <h2>Gestion des Actualités</h2>
              <button class="btn btn-primary" onclick="alert('Créer une nouvelle actualité')">+ Nouvelle actualité</button>
            </div>

            <div class="table-responsive">
              <table>
                <thead>
                  <tr>
                    <th>Titre</th>
                    <th>Catégorie</th>
                    <th>Statut</th>
                    <th>Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>TechSolution lance sa nouvelle plateforme Cloud AI</td>
                    <td>Innovation</td>
                    <td><span class="badge badge-published">Publié</span></td>
                    <td>8 décembre 2025</td>
                    <td><div class="action-buttons"><button class="btn btn-small btn-edit">Modifier</button><button class="btn btn-small btn-delete">Supprimer</button></div></td>
                  </tr>
                  <tr>
                    <td>Certification ISO 27001 : Un nouveau cap franchi</td>
                    <td>Sécurité</td>
                    <td><span class="badge badge-published">Publié</span></td>
                    <td>1 décembre 2025</td>
                    <td><div class="action-buttons"><button class="btn btn-small btn-edit">Modifier</button><button class="btn btn-small btn-delete">Supprimer</button></div></td>
                  </tr>
                  <tr>
                    <td>Partenariat stratégique avec Microsoft Azure</td>
                    <td>Partenariat</td>
                    <td><span class="badge badge-published">Publié</span></td>
                    <td>25 novembre 2025</td>
                    <td><div class="action-buttons"><button class="btn btn-small btn-edit">Modifier</button><button class="btn btn-small btn-delete">Supprimer</button></div></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div id="contacts" class="admin-section" style="display:none">
            <div class="admin-header">
              <h2>Messages de contact</h2>
            </div>

            <div class="table-responsive">
              <table>
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Sujet</th>
                    <th>Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Jean Dupont</td>
                    <td>jean@example.com</td>
                    <td>Infrastructure IT</td>
                    <td>12 décembre 2025</td>
                    <td><div class="action-buttons"><button class="btn btn-small btn-edit">Voir</button><button class="btn btn-small btn-delete">Supprimer</button></div></td>
                  </tr>
                  <tr>
                    <td>Marie Martin</td>
                    <td>marie@example.com</td>
                    <td>Cloud Computing</td>
                    <td>10 décembre 2025</td>
                    <td><div class="action-buttons"><button class="btn btn-small btn-edit">Voir</button><button class="btn btn-small btn-delete">Supprimer</button></div></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div id="parametres" class="admin-section" style="display:none">
            <h2>Paramètres du site</h2>

            <form onsubmit="handleSettings(event)" style="margin-top:2rem">
              <h3 style="margin-bottom:1rem">Informations du site</h3>

              <div class="form-group">
                <label>Titre du site</label>
                <input type="text" value="TechSolution" placeholder="Titre">
              </div>

              <div class="form-group">
                <label>Description</label>
                <textarea placeholder="Description du site">Excellence technologique au service de votre entreprise</textarea>
              </div>

              <div class="form-group">
                <label>Email de contact</label>
                <input type="email" value="contact@techsolution.fr" placeholder="Email">
              </div>

              <div class="form-group">
                <label>Téléphone</label>
                <input type="tel" value="+33 1 23 45 67 89" placeholder="Téléphone">
              </div>

              <div class="form-group">
                <label>Adresse</label>
                <input type="text" value="123 Rue de la Tech, 75001 Paris" placeholder="Adresse">
              </div>

              <button type="submit" class="btn btn-primary">Enregistrer les paramètres</button>
            </form>
          </div>
        </div>
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
            <li><a href="admin.php">Admin</a></li>
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
    const menuLinks = document.querySelectorAll('.menu-link');
    const sections = document.querySelectorAll('.admin-section');

    menuLinks.forEach(link => {
      link.addEventListener('click', (e) => {
        e.preventDefault();
        const target = link.getAttribute('href');
        
        menuLinks.forEach(l => l.classList.remove('active'));
        link.classList.add('active');
        
        sections.forEach(section => section.style.display = 'none');
        document.querySelector(target).style.display = 'block';
      });
    });

    function handleSettings(e){
      e.preventDefault();
      alert('Paramètres enregistrés avec succès !');
    }
  </script>
</body>
</html>
