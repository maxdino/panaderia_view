<?php
include 'librerias/google_api/redirect.php';
$client->revokeToken();
unset ($_COOKIE["MIRKODONI_CLIENTE_ID"]);	
setcookie ('MIRKODONI_CLIENTE_ID', '', time()-604800,'/'); 
unset ($_COOKIE ["MIRKODONI_EMAIL"]);	
setcookie ('MIRKODONI_EMAIL', '', time()-604800,'/'); 
unset ($_COOKIE ["MIRKODONI_ID"]);	
setcookie ('MIRKODONI_ID', '', time()-604800,'/'); 
header('Location: portal/login.php');
?>