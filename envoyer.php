<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    if (empty($nom) || empty($email) || empty($message)) {
        echo "Tous les champs doivent être remplis.";
        exit;
    }

    $to = "votre-email@example.com";
    $subject = "Message de Contact de Chill Pote";
    $body = "Nom: $nom\nEmail: $email\n\nMessage:\n$message";

    if (mail($to, $subject, $body, "From: $email")) {
        echo "Merci de nous avoir contacté. Nous vous répondrons dès que possible.";
    } else {
        echo "Une erreur est survenue. Veuillez réessayer plus tard.";
    }
} else {
    echo "Méthode de requête invalide.";
}
?>
