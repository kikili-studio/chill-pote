<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat | Chill Pote</title>
  <link rel="icon" href="ressources/images/logo.jpg">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.min.css">
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <script>
    setInterval(function() {
      var currentDateTime = new Date();
      document.getElementById("datetime").innerHTML = currentDateTime.toLocaleString();
    }, 1000);
  </script>
  <style>
    #chat-container {
      max-width: 800px;
      margin: 20px auto;
      border: 1px solid #ccc;
      padding: 20px;
      border-radius: 8px;
    }
    #chat-messages {
      height: 400px;
      overflow-y: scroll;
      border: 1px solid #ccc;
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 8px;
    }
    #editor-container {
      height: 100px;
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
    <div id="chat-container">
      <h2 class="text-center">Chat</h2>
      <div id="chat-messages">
        <!-- Les messages de chat seront affichés ici -->
      </div>
      <div id="editor-container">
        <!-- Le composant d'édition du message sera ici -->
        <textarea id="message-input" class="form-control" placeholder="Tapez votre message..."></textarea>
        <button id="send-button" class="btn btn-primary mt-2">Envoyer</button>
      </div>
      <p id="datetime" class="text-center mt-3"></p>
    </div>
  </main>

  <footer class="text-center mt-4">
    <p>&copy; 2024 Chill Pote. Tous droits réservés.</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  <script>
    // Initialisation de l'éditeur Quill (si nécessaire)
    var quill = new Quill('#editor-container', {
      theme: 'snow'
    });

    // Fonction d'envoi de message
    document.getElementById('send-button').addEventListener('click', function() {
      var message = document.getElementById('message-input').value;
      if (message) {
        // Envoyer le message via AJAX ou autre méthode
        console.log('Message envoyé:', message);
        document.getElementById('message-input').value = '';
      }
    });
  </script>
</body>

</html>
