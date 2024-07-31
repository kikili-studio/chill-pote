<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription | Chill Pote</title>
  <link rel="icon" href="ressources/images/logo.jpg">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.min.css">
  <style>
    #register-container {
      max-width: 500px;
      margin: 50px auto;
      border: 1px solid #ccc;
      padding: 20px;
      border-radius: 8px;
    }
    .navbar {
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php">Chill Pote</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="info.php">Info</a></li>
          <li class="nav-item"><a class="nav-link" href="music.php">Music</a></li>
          <li class="nav-item"><a class="nav-link" href="register.php">Inscription</a></li>
          <li class="nav-item"><a class="nav-link" href="membre.php">Membres</a></li>
          <li class="nav-item"><a class="nav-link" href="tchat.php">Tchat</a></li>
          <li class="nav-item"><a class="nav-link" href="galaxio.php">Galaxio</a></li>
          <li class="nav-item"><a class="nav-link" href="demande_role_chill_pote.php">Recrutement</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="sponsors.php">Sponsors</a></li>
        </ul>
      </div>
    </nav>
  </header>

  <main class="container">
    <div id="register-container">
      <h2 class="text-center">Inscription</h2>
      <form method="post" action="register.php">
        <div class="form-group">
          <label for="nom">Nom</label>
          <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="form-group">
          <label for="prenom">Prénom</label>
          <input type="text" class="form-control" id="prenom" name="prenom" required>
        </div>
        <div class="form-group">
          <label for="email">Adresse e-mail</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="password">Mot de passe</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
      </form>
      <p class="mt-3">
        <a href="login.php">Déjà inscrit ? Clique ici pour te connecter !</a>
      </p>
    </div>
  </main>

  <footer class="text-center mt-4">
    <p>&copy; 2024 Chill Pote. Tous droits réservés.</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <?php
    // Configuration des paramètres de la base de données
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'chill_pote';

    // Création d'une connexion à la base de données
    $mysqli = new mysqli($host, $user, $password, $database);

    // Vérification de la connexion
    if ($mysqli->connect_error) {
        die("Erreur de connexion à la base de données : " . $mysqli->connect_error);
    }

    // Traitement du formulaire d'inscription
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password'])) {
        $nom = $mysqli->real_escape_string($_POST['nom']);
        $prenom = $mysqli->real_escape_string($_POST['prenom']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $password = $mysqli->real_escape_string($_POST['password']);

        // Insertion des données dans la base de données
        $query = "INSERT INTO inscrit (Nom, Prenom, Mot_de_passe) VALUES ('$nom', '$prenom', '$password')";
        if ($mysqli->query($query) === TRUE) {
            echo '<div class="alert alert-success">Inscription réussie !</div>';
        } else {
            echo '<div class="alert alert-danger">Erreur : ' . $mysqli->error . '</div>';
        }
    }

    // Fermeture de la connexion à la base de données
    $mysqli->close();
  ?>
</body>

</html>
