<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
 
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://polvazo.informaticapp.com/clientes',
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
  $cliente = json_decode($response, true); 

  foreach ($cliente['Detalles'] as $key => $value) {  if ($value['usuario']==$_POST["usuario"]&&$value['password']==$_POST["clave"]) {

    setcookie('MIRKODONI_ID',$value['idCliente'],time()+604800,'/');
    setcookie('MIRKODONI_CLIENTE_ID',$value['nombres'],time()+604800,'/'); 
    setcookie('MIRKODONI_EMAIL',$value['email'],time()+604800,'/');
  }
 
}

header('Location: lista_empresa.php'); 



}else{

  include '../librerias/google_api/redirect.php';

// autenticar código de Google OAuth Flow
  if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

  // get profile info
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $email =  $google_account_info->email;
    $name =  $google_account_info->name;

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://polvazo.informaticapp.com/clientes',
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
    $cliente = json_decode($response, true); 
    $valida=0;
    foreach ($cliente['Detalles'] as $key => $value) { if($value['id_empresa']==1){ if ($value['email']==$email) {
      $valida=1;
      if ($value['nombres']=='') {
        $usuario_nombre='cliente';
      }else{
        $usuario_nombre=$value['nombres'];
      }
      setcookie('MIRKODONI_ID',$value['idCliente'],time()+604800,'/');
      setcookie('MIRKODONI_CLIENTE_ID',$usuario_nombre,time()+604800,'/'); 
      setcookie('MIRKODONI_EMAIL',$value['email'],time()+604800,'/');
    }
  }
}
 
if ($valida==0) {
  $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://polvazo.informaticapp.com/clientes',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'nombres=&apellido_paterno=&apellido_materno=&direccion=&telefono=&empresa=1&email='.$email.'&usuario=&password=',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VGQnBJY3ova012SS9MOHRDSkJUanJxa3BNZFFPRGkyOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlL2g2c0xRRFpPMXpOWXZRYWh5a1o2ZGluZmZsUFZWMg==',
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
} 


  // ahora puede usar esta información de perfil para crear una cuenta en su sitio web y hacer que el usuario inicie sesión.
header('Location: lista_empresa.php'); 
}

if (isset($_COOKIE['MIRKODONI_EMAIL'])) {//para traer datos del cliente
  $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://polvazo.informaticapp.com/clientes/'.$_COOKIE['MIRKODONI_ID'],
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
    $cliente_datos = json_decode($response, true); 

}


}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>PANADERIA Y PASTELERIA  </title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Place favicon.ico in the root directory -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">


  <!-- All css files are included here. -->
  <!-- Bootstrap fremwork main css -->
  <?php include '../includes/css_portada.php'; ?>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
      <![endif]-->  

      <!-- Body main wrapper start -->
      <div class="wrapper fixed__footer">
        <!-- Start Header Style -->
        <header id="header" class="htc-header header--3 bg__white">
          <!-- Start Mainmenu Area -->

          <!-- Start MAinmenu Ares -->
          
          <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Style -->
        
        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
          <!-- Start Search Popap -->
          <div class="search__area">
            <div class="container" >
              <div class="row" >
                <div class="col-md-12" >
                  <div class="search__inner">
                    <form action="#" method="get">
                      <input placeholder="Search here... " type="text">
                      <button type="submit"></button>
                    </form>
                    <div class="search__close__btn">
                      <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Search Popap -->
          <!-- Start Offset MEnu -->
          
          <!-- End Offset MEnu -->
          <!-- Start Cart Panel -->
           
          <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->
        <?php if(!isset($_COOKIE['MIRKODONI_EMAIL'])){ ?>
          <!-- Start Login Register Area -->
          <div class="htc__login__register bg__white ptb--130" style="background: rgba(0, 0, 0, 0) url(../librerias/assets1/images/bg/5.jpg) no-repeat scroll center center / cover ;">
            <div class="container">
              <div class="row">
                <div class="col-md-6 col-md-offset-3">
                  <ul class="login__register__menu" role="tablist">
                    <li role="presentation" class="login active"><a href="#login" role="tab" data-toggle="tab">Login</a></li>
                    <!--<li role="presentation" class="register"><a href="#register" role="tab" data-toggle="tab">Register</a></li>-->
                  </ul>
                </div>
              </div>
              <!-- Start Login Register Content -->
              <div class="row">
                <div class="col-md-6 col-md-offset-3">
                  <div class="htc__login__register__wrap">
                    <!-- Start Single Content -->
                    <div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                      <form class="login" method="post">
                        <input type="text" placeholder="Usuario*" required="" name="usuario">
                        <input type="password" placeholder="Password*" required="" name="clave">
                        <div class="htc__login__btn mt--30">
                          <button type="submit">Login</button> 
                        </div>
                      </form>


                      <div class="htc__social__connect">
                        <h2>Registre o Inicie sesión con</h2>
                        <ul class="htc__soaial__list">
                                    <!--    <li><a class="bg--twitter" href="#"><i class="zmdi zmdi-twitter"></i></a></li>

                                        <li><a class="bg--instagram" href="#"><i class="zmdi zmdi-instagram"></i></a></li>

                                        <li><a class="bg--facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                      -->
                                      <li><a class="bg--googleplus" href="<?php echo $client->createAuthUrl(); ?>"><i class="zmdi zmdi-google-plus"></i></a></li>
                                    </ul>
                                  </div>
                                </div>
                                <!-- End Single Content -->
                                <!-- Start Single Content -->
                                <div id="register" role="tabpanel" class="single__tabs__panel tab-pane fade">
                                  <form class="login" method="post">
                                    <input type="text" placeholder="Name*">
                                    <input type="email" placeholder="Email*">
                                    <input type="password" placeholder="Password*">
                                  </form>
                                  <div class="tabs__checkbox">
                                    <input type="checkbox">
                                    <span> Remember me</span>
                                  </div>
                                  <div class="htc__login__btn">
                                    <a href="#">register</a>
                                  </div>
                                  <div class="htc__social__connect">
                                    <h2>Or Login With</h2>
                                    <ul class="htc__soaial__list">
                                    <!--    <li><a class="bg--twitter" href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                        <li><a class="bg--instagram" href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                        <li><a class="bg--facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                      -->    <li><a class="bg--googleplus" href="<?php echo $client->createAuthUrl(); ?>"><i class="zmdi zmdi-google-plus"></i></a></li>
                                    </ul>
                                  </div>
                                </div>
                                <!-- End Single Content -->
                              </div>
                            </div>
                          </div>
                          <!-- End Login Register Content -->

                        </div>
                      </div>
                      <!-- End Login Register Area -->
                    <?php }else{ ?>
                      <!-- Start Login Register Area -->
                      <div class="htc__login__register bg__white ptb--130" style="background: rgba(0, 0, 0, 0) url(../librerias/assets1/images/bg/5.jpg) no-repeat scroll center center / cover ;">
                        <div class="container">
                          <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                              <ul class="login__register__menu" role="tablist">
                                <li role="presentation" class="login active"><a href="#login" role="tab" data-toggle="tab">Perfil Datos</a></li>
                                <li role="presentation" class="register"><a href="#register" role="tab" data-toggle="tab">Actualizar Datos</a></li>
                              </ul>
                            </div>
                          </div>
                          <!-- Start Login Register Content -->
                          <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                              <div class="htc__login__register__wrap">
                                <!-- Start Single Content -->
                                <div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                                  <form class="login" method="post">
                                    <input type="text" placeholder="<?php echo $cliente_datos['Detalles']['nombres'] ?>" disabled="">
                                    <input type="text" placeholder="<?php echo $cliente_datos['Detalles']['email'] ?>" disabled="">
                                  </form>
                                </div>
                                <!-- End Single Content -->
                                <!-- Start Single Content -->
                                <div id="register" role="tabpanel" class="single__tabs__panel tab-pane fade">
                                  <form class="login" action="actualizar_cliente.php" method="post">
                                    <input type="hidden" required=""  name="id" value="<?php echo $cliente_datos['Detalles']['idCliente'] ?>">
                                    <input type="text" placeholder="Nombres*" required=""  name="nombre" value="<?php echo $cliente_datos['Detalles']['nombres'] ?>">
                                    <input type="text" placeholder="Apellido Paterno*" required="" name="apellido1" value="<?php echo $cliente_datos['Detalles']['apellido1'] ?>">
                                    <input type="text" placeholder="Apellido Materno*" required="" name="apellido2" value="<?php echo $cliente_datos['Detalles']['apellido2'] ?>">
                                    <input type="text" placeholder="Direccion*" required="" name="direccion" value="<?php echo $cliente_datos['Detalles']['direccion'] ?>">
                                    <input type="text" placeholder="Telefono*" required="" name="telefono" value="<?php echo $cliente_datos['Detalles']['telefono'] ?>">
                                    <input type="email" placeholder="Email*" readonly="" required="" name="email" value="<?php echo $cliente_datos['Detalles']['email'] ?>">
                                    <input type="text" placeholder="Usuario*" required="" name="usuario" value="<?php echo $cliente_datos['Detalles']['usuario'] ?>">
                                    <input type="password" placeholder="Password*" required="" name="password" value="<?php echo $cliente_datos['Detalles']['password'] ?>">
                                    <div class="htc__login__btn">
                                      <button type="submit" >Actulizar</button> 
                                    </div>
                                  </form>


                                <!--<div class="htc__social__connect">
                                    <h2>Or Login With</h2>
                                    <ul class="htc__soaial__list">
                                        <li><a class="bg--twitter" href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                        <li><a class="bg--instagram" href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                        <li><a class="bg--facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                        <li><a class="bg--googleplus" href="<?php echo $client->createAuthUrl(); ?>"><i class="zmdi zmdi-google-plus"></i></a></li>
                                    </ul>
                                  </div>-->
                                </div>
                                <!-- End Single Content -->
                              </div>
                            </div>
                          </div>
                          <!-- End Login Register Content -->

                        </div>
                      </div>
                      <!-- End Login Register Area -->

                    <?php } ?>   
                    <!-- Start Footer Area -->
 
                  <!-- End Footer Area -->
                </div>
                <!-- Body main wrapper end -->
                <!-- Placed js at the end of the document so the pages load faster -->

                <!-- jquery latest version -->
                <?php include '../includes/js_portada.php'; ?>

              </body>

              </html>