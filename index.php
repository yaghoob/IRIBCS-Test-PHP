<?php
// include your composer dependencies
require_once 'google-api/vendor/autoload.php';

// Get $id_token via HTTPS POST.
$CLIENT_ID="526049968457-7fo6akd9hhqikrrkgoo6d5nu5ie9b0qm.apps.googleusercontent.com";
$id_token=$_POST['token'];
$client = new Google_Client(['client_id' => $CLIENT_ID]);  // Specify the CLIENT_ID of the app that accesses the backend
$payload = $client->verifyIdToken($id_token);
if ($payload) {
  $userid = $payload['sub'];
  
  //Set Data For APP from SERVER! For Ex. Database or Whatever! :D
  $payload['data1']="Test". mt_rand(10, 50);
  $payload['data2']="Test". mt_rand(50, 90);
  echo json_encode($payload,JSON_UNESCAPED_UNICODE);
  // If request specified a G Suite domain:
  //$domain = $payload['hd'];
} else {
  // Invalid ID token
  echo "ERROR!";
}




?>