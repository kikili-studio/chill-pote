<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion | Chill Pote</title>
  <link rel="icon" href="ressources/images/logo.jpg">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.min.css">
  <style>
    #login-container {
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
    <div id="login-container">
      <h2 class="text-center">Connexion</h2>
      <form method="post" action="login.php">
        <div class="form-group">
          <label for="pseudo">Nom d'utilisateur</label>
          <input type="text" class="form-control" id="pseudo" name="pseudo" required>
        </div>
        <div class="form-group">
          <label for="password">Mot de passe</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
      </form>
      <p class="mt-3">
        <a href="register.php">Tu n'es pas encore inscrit ? Clique ici pour t'inscrire !</a>
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

    // Traitement du formulaire de connexion
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pseudo']) && isset($_POST['password'])) {
        $pseudo = $mysqli->real_escape_string($_POST['pseudo']);
        $password = $mysqli->real_escape_string($_POST['password']);

        // Vérification des informations d'identification
        $query = "SELECT * FROM inscrit WHERE Nom = '$pseudo' AND Mot_de_passe = '$password'";
        $result = $mysqli->query($query);

        if ($result && $result->num_rows > 0) {
            // Connexion réussie
            header('Location: chat.php');
            exit();
        } else {
            echo '<div class="alert alert-danger">Nom d\'utilisateur ou mot de passe incorrect.</div>';
        }

        $result->free();
    }

    // Fermeture de la connexion à la base de données
    $mysqli->close();
  ?>
</body>

</html>
