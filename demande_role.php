<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $contact = htmlspecialchars($_POST['contact']);
    $role = htmlspecialchars($_POST['role']);
    $motivation = htmlspecialchars($_POST['motivation']);
    $competences = htmlspecialchars($_POST['competences']);
    $pourquoi = htmlspecialchars($_POST['pourquoi']);
    $competence = htmlspecialchars($_POST['competence']);

    // Valider les données
    if (empty($pseudo) || empty($contact) || empty($role) || empty($motivation) || empty($competences) || empty($pourquoi) || empty($competence)) {
        echo "Tous les champs doivent être remplis.";
        exit;
    }

    // Envoyer l'email
    $to = "votre-email@example.com";
    $subject = "Demande de Rôle de Chill Pote";
    $body = "Pseudo: $pseudo\nContact: $contact\nRôle souhaité: $role\n\nMotivation:\n$motivation\n\nCompétences:\n$competences\n\nPourquoi vous et pas un autre:\n$pourquoi\n\nCompétences dans cette matière: $competence";

    if (mail($to, $subject, $body, "From: $contact")) {
        echo "Merci d'avoir postulé. Nous vous répondrons dès que possible.";
    } else {
        echo "Une erreur est survenue. Veuillez réessayer plus tard.";
    }
} else {
    echo "Méthode de requête invalide.";
}
?>
