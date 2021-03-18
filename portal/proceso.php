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
 

 $curl = curl_init();

 curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://polvazo.informaticapp.com/clientes/'.$_COOKIE['MIRKODONI_ID'],
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
  '&usuario='.$_POST["usuario_cliente"].
  '&password='.$_POST["contrasena"].
  '&empresa='.$_POST['empresa_cliente'],
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VGQnBJY3ova012SS9MOHRDSkJUanJxa3BNZFFPRGkyOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlL2g2c0xRRFpPMXpOWXZRYWh5a1o2ZGluZmZsUFZWMg==',
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

 $response = curl_exec($curl);

 curl_close($curl);

 $fecha = date('Y-m-d');
 $monto = number_format($_POST['monto']/100, 2, '.', '');
 $curl = curl_init();

 curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://polvazo.informaticapp.com/ventas',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'cliente='.$_COOKIE['MIRKODONI_ID'].'&fecha='.$fecha.'&empresa='.$_POST['id_empresa'].'&monto='.$monto,
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VGQnBJY3ova012SS9MOHRDSkJUanJxa3BNZFFPRGkyOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlL2g2c0xRRFpPMXpOWXZRYWh5a1o2ZGluZmZsUFZWMg==',
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

 $response = curl_exec($curl);

 curl_close($curl);
 //header('Location: carrito.php?id_empresa='.$_POST['id_empresa'].'&&nombre_empresa='.$_POST['nombre_empresa']);

}

?>