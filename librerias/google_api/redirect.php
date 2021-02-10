<?php
require_once 'vendor/autoload.php';

// init configuration
$clientID = '871035947060-hedbbpgobrij3rg38f9n2u43jigp9qaf.apps.googleusercontent.com';
$clientSecret = 'w-TKuLOM0enD_7CQ4knaFE9p';
$redirectUri = 'http://localhost/Panaderia_view/mirkodoni/login.php';
 
// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// autenticar código de Google OAuth Flow
 /*
else {
  echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
}*/
?>