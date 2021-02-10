<?php 

$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => 'http://localhost/panaderia/index.php/clientes/'.$_POST['id'],
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'PUT',
	CURLOPT_POSTFIELDS => 
	'nombres='.$_POST["nombre"].
	'&apellido_paterno='.$_POST["apellido1"].
	'&apellido_materno='.$_POST["apellido2"].
	'&direccion='.$_POST["direccion"].
	'&telefono='.$_POST["telefono"].
	'&usuario='.$_POST["usuario"].
	'&password='.$_POST["password"].
	'&telefono='.$_POST["telefono"].
	'&empresa=1',
	CURLOPT_HTTPHEADER => array(
		'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VGQnBJY3ova012SS9MOHRDSkJUanJxa3BNZFFPRGkyOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlL2g2c0xRRFpPMXpOWXZRYWh5a1o2ZGluZmZsUFZWMg==',
		'Content-Type: application/x-www-form-urlencoded'
	),
));

$response = curl_exec($curl);

curl_close($curl);
header('Location:login.php');













?>