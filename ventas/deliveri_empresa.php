<?php
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => 'http://polvazo.informaticapp.com/empresa/'.$_POST['empresa'],
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'GET',
	CURLOPT_HTTPHEADER => array(
		'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VGQnBJY3ova012SS9MOHRDSkJUanJxa3BNZFFPRGkyOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlL2g2c0xRRFpPMXpOWXZRYWh5a1o2ZGluZmZsUFZWMg==',
		'Content-Type: application/x-www-form-urlencoded'
	),
));

$response = curl_exec($curl);

curl_close($curl);
$data = json_decode($response,true);
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => 'http://polvazo.informaticapp.com/empresa/'.$_POST['empresa'],
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'PUT',
	CURLOPT_POSTFIELDS => 'descripcion='.$data['Detalles']['descripcion'].'&ruc='.$data['Detalles']['ruc'].'&direccion='.$data['Detalles']['direccion'].'&telefono='.$data['Detalles']['telefono'].'&email='.$data['Detalles']['email'].'&imagen='.$data['Detalles']['imagen'].'&deliveri='.$_POST['deliveri'].'&tiempo='.$_POST['tiempo'],
	CURLOPT_HTTPHEADER => array(
		'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VGQnBJY3ova012SS9MOHRDSkJUanJxa3BNZFFPRGkyOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlL2g2c0xRRFpPMXpOWXZRYWh5a1o2ZGluZmZsUFZWMg==',
		'Content-Type: application/x-www-form-urlencoded'
	),
));

$response = curl_exec($curl);

curl_close($curl);