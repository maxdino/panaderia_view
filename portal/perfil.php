<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){

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
    '&usuario='.$_POST["usuario"].
    '&password='.$_POST["password"].
    '&empresa='.$_POST['empresa'],
    CURLOPT_HTTPHEADER => array(
      'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VGQnBJY3ova012SS9MOHRDSkJUanJxa3BNZFFPRGkyOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlL2g2c0xRRFpPMXpOWXZRYWh5a1o2ZGluZmZsUFZWMg==',
      'Content-Type: application/x-www-form-urlencoded'
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);

  header('Location: perfil.php?id_empresa='.$_GET['id_empresa'].'&nombre_empresa='.$_GET['nombre_empresa']); 



}else{

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

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://polvazo.informaticapp.com/categoria',
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
  $categoria = json_decode($response, true);
}

if (!$_COOKIE['MIRKODONI_CLIENTE_ID']) {
    header('Location: login.php');
}
if (!($_GET['id_empresa'])) {
    header('Location: lista_empresa.php');
}
if (!($_GET['nombre_empresa'])) {
    header('Location: lista_empresa.php');
}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php echo $_GET['nombre_empresa'] ?></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Place favicon.ico in the root directory -->
  <link rel="shortcut icon" type="image/x-icon" href="../librerias/imagen/iconos/logo_polvazo_4.png">
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
          <?php include 'navbar.php'; ?>
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
          <?php include 'cart.php' ?>
          <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->

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
                    <form class="login" action="" method="post">
                      <input type="hidden" required=""  name="id" value="<?php echo $cliente_datos['Detalles']['idCliente'] ?>">
                      <input type="text" class="solo_letras" onchange="borrar_espacios('nombre')" placeholder="Nombres*" required="" id="nombre"  name="nombre" value="<?php echo $cliente_datos['Detalles']['nombres'] ?>">
                      <input type="text" class="solo_letras" onchange="borrar_espacios('apellido1')" placeholder="Apellido Paterno*" required="" id="apellido1" name="apellido1" value="<?php echo $cliente_datos['Detalles']['apellido1'] ?>">
                      <input type="text" class="solo_letras" onchange="borrar_espacios('apellido2')" placeholder="Apellido Materno*" required="" id="apellido2" name="apellido2" value="<?php echo $cliente_datos['Detalles']['apellido2'] ?>">
                      <input type="text" class="solo_direccion" onchange="borrar_espacios('direccion')" placeholder="Direccion*" required="" id="direccion" name="direccion" value="<?php echo $cliente_datos['Detalles']['direccion'] ?>">
                      <input type="text" class="solo_numero" maxlength="9" placeholder="Telefono*" required="" id="telefono" name="telefono" value="<?php echo $cliente_datos['Detalles']['telefono'] ?>">
                      <input type="email" placeholder="Email*" readonly="" id="email" required="" name="email" value="<?php echo $cliente_datos['Detalles']['email'] ?>">
                      <input type="text" placeholder="Usuario*" required="" id="usuario" name="usuario" value="<?php echo $cliente_datos['Detalles']['usuario'] ?>">
                      <input type="hidden" required="" name="empresa" value="<?php echo $cliente_datos['Detalles']['id_empresa'] ?>">
                      <input type="password" placeholder="Password*" required="" id="password" name="password" value="<?php echo $cliente_datos['Detalles']['password'] ?>">
                      <div class="htc__login__btn">
                        <button type="submit" >Actualizar</button> 
                      </div>
                    </form>
                  </div>
                  <!-- End Single Content -->
                </div>
              </div>
            </div>
            <!-- End Login Register Content -->

          </div>
          <br><br><br>
        </div>

        <!-- End Login Register Area -->


        <!-- Start Footer Area -->
        <?php include 'footer.php'; ?>
        <!-- End Footer Area -->
      </div>
      <!-- Body main wrapper end -->
      <!-- Placed js at the end of the document so the pages load faster -->

      <!-- End Footer Area -->

      <!-- Body main wrapper end -->
      <!-- QUICKVIEW PRODUCT -->
      <div id="quickview-wrapper">
        <!-- Modal -->

        <!-- END Modal -->
      </div>
      <!-- jquery latest version -->
      <?php include '../includes/js_portada.php'; ?>
      <script type="text/javascript">
         $('.solo_numero').on('input', function () { 
          this.value = this.value.replace(/[^0-9]/g,'');
        });
        $('.solo_letras').on('input', function () { 
          this.value = this.value.replace(/[^a-zA-ZáéíóúüñÁÉÍÓÚÜÑ ]/g,'');
        });
        $('.solo_direccion').on('input', function () { 
          this.value = this.value.replace(/[^0-9a-zA-ZáéíóúüñÁÉÍÓÚÜÑ.# ]/g,'');
        });
        function borrar_espacios(name){
          cadena = $('#'+name).val();
          $('#'+name).val($.trim(cadena));
        }
      </script>
    </body>

    </html>