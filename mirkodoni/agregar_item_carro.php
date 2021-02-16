<?php
 $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost/panaderia/index.php/detalle_carrito/'.$_COOKIE['MIRKODONI_ID'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VGQnBJY3ova012SS9MOHRDSkJUanJxa3BNZFFPRGkyOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlL2g2c0xRRFpPMXpOWXZRYWh5a1o2ZGluZmZsUFZWMg=='
  ),
));

$response = curl_exec($curl);

curl_close($curl);

$validar_producto_seleccionado = json_decode($response, true);
$band=0;
if ($validar_producto_seleccionado['Status']=='200') { 
foreach ($validar_producto_seleccionado['Detalles'] as $key => $value) {
  if ($_GET['id']==$value['idProducto']) {
    $band=1;
  }
  }
}
if($band==0){
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost/panaderia/index.php/detalle_carrito',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 
  'producto='.$_GET['id'].
  '&cliente='.$_COOKIE['MIRKODONI_ID'].
  '&cantidad=1'.
  '&precio='.$_GET['precio'].
  '&accion=1',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VGQnBJY3ova012SS9MOHRDSkJUanJxa3BNZFFPRGkyOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlL2g2c0xRRFpPMXpOWXZRYWh5a1o2ZGluZmZsUFZWMg==',
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
}
header('Location: carrito.php');


?>