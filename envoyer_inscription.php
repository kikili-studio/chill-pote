<?php
// Configuration des paramètres de l'email
$to = 'atd.alexis@gmail.com'; // Adresse email pour recevoir les inscriptions
$subject = 'Nouvelle inscription sur Chill Pote';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validation des données
    $role = htmlspecialchars($_POST['role']);
    $notifications = htmlspecialchars($_POST['notifications']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $pseudo = htmlspecialchars($_POST['pseudo']);
    
    // Traitement de l'image de profil
    $profileImage = $_FILES['profile_image'];
    $profileImagePath = '';
    
    if ($profileImage['error'] == UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/'; // Répertoire pour stocker les images
        $profileImagePath = $uploadDir . basename($profileImage['name']);
        
        // Vérifier si le répertoire existe sinon le créer
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        // Déplacer le fichier téléchargé
        if (move_uploaded_file($profileImage['tmp_name'], $profileImagePath)) {
            $profileImagePath = htmlspecialchars($profileImagePath);
        } else {
            $profileImagePath = 'Erreur lors du téléchargement de l\'image.';
        }
    }

    // Préparer le message à envoyer par email
    $message = "Nouvelle inscription sur Chill Pote:\n\n";
    $message .= "Rôle souhaité: $role\n";
    $message .= "Recevoir des notifications: $notifications\n";
    $message .= "Adresse e-mail ou numéro de téléphone: $email\n";
    $message .= "Pseudo: $pseudo\n";
    $message .= "Image de profil: $profileImagePath\n";
    
    // En-têtes de l'email
    $headers = "From: no-reply@chillpote.com\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Envoyer l'email
    if (mail($to, $subject, $message, $headers)) {
        echo "<p>Inscription réussie ! Merci de vous être inscrit.</p>";
    } else {
        echo "<p>Une erreur est survenue lors de l'envoi de l'inscription. Veuillez réessayer plus tard.</p>";
    }
}
?>
