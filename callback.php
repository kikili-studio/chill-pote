<?php
$token_url = "https://vaultaid.aktech.fr/api/v1/oauth/token";
$initial_token = "paI9DU58-bH-s_kwuLAt-yUDOQ93F6xw6Ukfwd2BN4w2EdYWKcIxdyCdLrqk2j4v";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $token_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $initial_token",
    "Content-Type: application/json"
]);

$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Erreur cURL : ' . curl_error($ch);
    curl_close($ch);
    exit;
}
curl_close($ch);

$response_data = json_decode($response, true);
if (isset($response_data['token'])) {
    $user_token = $response_data['token'];
} else {
    echo "Erreur : Impossible d'obtenir le token utilisateur.";
    exit;
}

$user_info_url = "https://vaultaid.aktech.fr/api/v1/user/me";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $user_info_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $user_token",
    "Content-Type: application/json"
]);

$user_info_response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Erreur cURL : ' . curl_error($ch);
    curl_close($ch);
    exit;
}
curl_close($ch);

$user_info = json_decode($user_info_response, true);
echo "Informations de l'utilisateur : ";
print_r($user_info);
?>
