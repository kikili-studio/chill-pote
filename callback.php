<?php
// Configuration
$token_url = "https://vaultaid.aktech.fr/api/v1/oauth/token";
$client_id = "8b828963-4a6b-4846-a4cb-4e1f6bcc2bcd";
$client_secret = "paI9DU58-bH-s_kwuLAt-yUDOQ93F6xw6Ukfwd2BN4w2EdYWKcIxdyCdLrqk2j4v"; // Ta clé client
$redirect_uri = "https://kikili-studio.github.io/chill-pote/index.html";
$code = $_GET['code']; // Le token obtenu dans l'URL après la redirection

// Paramètres de la requête
$data = array(
    'grant_type' => 'authorization_code',
    'client_id' => $client_id,
    'client_secret' => $client_secret,
    'redirect_uri' => $redirect_uri,
    'code' => $code
);

// Initialiser cURL
$ch = curl_init();

// Configuration des options cURL
curl_setopt($ch, CURLOPT_URL, $token_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Exécuter la requête et récupérer la réponse
$response = curl_exec($ch);
curl_close($ch);

// Décoder la réponse JSON
$response_data = json_decode($response, true);

// Vérifier si le token a été obtenu
if (isset($response_data['access_token'])) {
    $access_token = $response_data['access_token'];
    
    // Requête GET pour obtenir les infos de l'utilisateur
    $user_info_url = "https://vaultaid.aktech.fr/api/v1/user/me";
    
    // Initialiser cURL pour la requête GET
    $ch = curl_init();
    
    // Configuration des options cURL
    curl_setopt($ch, CURLOPT_URL, $user_info_url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $access_token));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // Exécuter la requête et récupérer la réponse
    $user_info_response = curl_exec($ch);
    curl_close($ch);
    
    // Décoder la réponse JSON
    $user_info = json_decode($user_info_response, true);
    
    // Afficher les informations de l'utilisateur
    print_r($user_info);
} else {
    echo "Erreur lors de l'obtention du token.";
}
?>
