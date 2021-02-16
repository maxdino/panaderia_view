<?php 
 
require "requests/library/requests.php";
Requests::register_autoloader();
require "culqi/lib/culqi.php";

$SECRET_KEY = "sk_test_1f5e48ee6810acbe";

$culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));


// Creamos Cargo a una tarjeta
$charge = $culqi->Charges->create(
    array(
      "amount" => $_POST['monto'],
      "capture" => true,
      "currency_code" => "PEN",
      "description" => "PRODUCTOS",
      "email" => $_POST['email'],
      "installments" => 0,
      "source_id" => $_POST['token']
    )
);

//Respuesta
//print_r($charge);
$obj = json_decode(json_encode($charge), true);
if (isset($obj['id'])) {
 
 
$fecha = date('Y-m-d');
$monto = number_format($_POST['monto']/100, 2, '.', '');
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost/panaderia/index.php/ventas',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'cliente='.$_COOKIE['MIRKODONI_ID'].'&fecha='.$fecha.'&empresa=1&monto='.$monto,
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VGQnBJY3ova012SS9MOHRDSkJUanJxa3BNZFFPRGkyOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlL2g2c0xRRFpPMXpOWXZRYWh5a1o2ZGluZmZsUFZWMg==',
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
header('Location: carrito.php');
 }

?>