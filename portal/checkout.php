<?php
if (!$_COOKIE['MIRKODONI_CLIENTE_ID']) {
  header('Location: login.php');
}
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://polvazo.informaticapp.com/detalle_carrito/'.$_COOKIE['MIRKODONI_ID'],
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
$carrito_cliente = json_decode($response, true);

$suma=0; foreach ($carrito_cliente['Detalles'] as $key => $value) { 
  if ($_GET['id_empresa']==$value['id_empresa']) { 
    $suma = $suma + ($value['cantidad']*$value['precio']);
  }
}  

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
$cliente = json_decode($response, true); 

if (!($_GET['id_empresa'])) {
  header('Location: lista_empresa.php');
}
if (!($_GET['nombre_empresa'])) {
  header('Location: lista_empresa.php');
}
if ($suma==0) {
  header('Location: carrito.php?id_empresa='.$_GET['id_empresa'].'&nombre_empresa='.$_GET['nombre_empresa']);
}


?>
<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php echo $_GET['nombre_empresa']; ?></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Place favicon.ico in the root directory -->
  <link rel="shortcut icon" type="image/x-icon" href="../librerias/imagen/iconos/logo_polvazo_4.png">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">


  <!-- All css files are included here. -->
  <!-- Bootstrap fremwork main css -->
  <?php include '../includes/css_portada.php'; ?>
  <script src="https://checkout.culqi.com/js/v3"></script>
  <style type="text/css">

   .button {
    background-color: #000;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
  }
  input:focus {
    background: #000;
    border: 1px solid #ff4136;
  }
  .alert-primary {
    color: #004085;
    background-color: #cce5ff;
    border-color: #b8daff;
  }
  .alert {
    position: relative;
    padding: .75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem;
  }
  .alert-warning {
    color: #856404;
    background-color: #fff3cd;
    border-color: #ffeeba;
  }
</style>
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
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(../librerias/assets1/images/bg/2.jpg) no-repeat scroll center center / cover ;">
          <div class="ht__bradcaump__wrap">
            <div class="container">
              <div class="row">
                <div class="col-xs-12">
                  <div class="bradcaump__inner text-center">
                    <h2 class="bradcaump-title">Checkout</h2>
                    <nav class="bradcaump-inner">
                      <a class="breadcrumb-item" href="index.php?id_empresa=<?php echo $_GET['id_empresa'] ?>">Inicio</a>
                      <span class="brd-separetor">/</span>
                      <span class="breadcrumb-item active">Checkout</span>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Checkout Area -->
        <section class="our-checkout-area ptb--120 bg__white">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-lg-8">
                <div class="ckeckout-left-sidebar">
                  <!-- Start Checkbox Area -->
                  <div class="checkout-form">
                    <h2 class="section-title-3">Confirmar Datos Cliente </h2>
                    <div class="checkout-form-inner">
                      <div class="single-checkout-box">
                        <input type="text" class="solo_letras" onchange="borrar_espacios('nombre')" id="nombre" name="nombre" placeholder="Nombre*" value="<?php echo $cliente['Detalles']['nombres'] ?>">
                        <input type="text" class="solo_letras" onchange="borrar_espacios('apellido1')" id="apellido1" name="apellido1" placeholder="Apellido Paterno*" value="<?php echo $cliente['Detalles']['apellido1'] ?>">
                      </div>
                      <div class="single-checkout-box">
                        <input type="text" class="solo_letras" onchange="borrar_espacios('apellido2')" id="apellido2" name="apellido2" placeholder="Apellido Materno*" value="<?php echo $cliente['Detalles']['apellido2'] ?>">
                        <input type="text" class="solo_direccion" id="direccion" onchange="borrar_espacios('direccion')"  name="direccion" placeholder="Dirección*" value="<?php echo $cliente['Detalles']['direccion'] ?>">
                      </div>
                      <div class="single-checkout-box">
                        <input type="email" id="email" name="email" placeholder="Email*" readonly="" value="<?php echo $cliente['Detalles']['email'] ?>">
                        <input type="text" class="solo_numero" id="telefono" name="telefono" placeholder="Telefono*" value="<?php echo $cliente['Detalles']['telefono'] ?>">
                        <input type="hidden" id="usuario" name="usuario" value="<?php echo $cliente['Detalles']['usuario'] ?>">
                        <input type="hidden" id="contrasena" name="contrasena"  value="<?php echo $cliente['Detalles']['password'] ?>">
                        <input type="hidden" id="empresa" name="empresa"  value="<?php echo $cliente['Detalles']['id_empresa'] ?>">
                      </div>
                    </div>
                  </div>
                  <!-- End Checkbox Area -->
                  <!-- Start Payment Box -->
                  
                  <input type="hidden" name="monto" id="monto" value="<?php echo $suma; ?>">
                  <input type="hidden" name="id_empresa" id="id_empresa" value="<?php echo $_GET['id_empresa']; ?>">
                  <input type="hidden" name="nombre_empresa" id="nombre_empresa" value="<?php echo $_GET['nombre_empresa']; ?>">
                  <!-- End Payment Box -->
                  <!-- Start Payment Way -->
                  <div class="our-payment-sestem">
                    <div class="checkout-btn">
                      <input type="button" class="button" id="buyButton" value="Confirmar lista del carrito" > 
                    </div>    
                  </div>
                  <!-- End Payment Way -->
                </div>
              </div>
              <div class="col-md-4 col-lg-4">
                <div class="checkout-right-sidebar">
                  <div class="our-important-note">
                    <h2 class="section-title-3">Nota :</h2>
                    <p class="note-desc">No se aceptan devoluciones de aquellos productos que, luego de su venta, han sido rechazados por el cliente por desistimiento de compra. </p>

                  </div>
                  <div class="puick-contact-area mt--60">
                    <h2 class="section-title-3">Telefono Contacto</h2>
                    <a href="phone:+8801722889963"><?php echo '+51 '.$empresa['Detalles']['telefono'] ?></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End Checkout Area -->
        <!-- Start Footer Area -->
        <?php include 'footer.php'; ?>
        <!-- End Footer Area -->
      </div>
      <!-- Body main wrapper end -->
      <!-- Placed js at the end of the document so the pages load faster -->

      <!-- jquery latest version -->
      <?php include '../includes/js_portada.php'; ?>
      <script>
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


    // Configura tu llave pública
    Culqi.publicKey = 'pk_test_d05dec225486d6e9';
    // Configura tu Culqi Checkout


    // Usa la funcion Culqi.open() en el evento que desees
    $('#buyButton').on('click', function(e) {
        // Abre el formulario con las opciones de Culqi.settings
        monto = ($('#monto').val() );
        id_empresa = $('#id_empresa').val();
        nombre_empresa = $('#nombre_empresa').val();
        nombre = $('#nombre').val();
        apellido1 = $('#apellido1').val();
        apellido2 = $('#apellido2').val();
        direccion = $('#direccion').val();
        email_cliente = $('#email').val();
        telefono = $('#telefono').val();
        usuario_cliente = $('#usuario').val();
        contrasena = $('#contrasena').val();
        empresa_cliente = $('#empresa').val();
        if (monto!=''&&id_empresa!=''&&nombre_empresa!=''&&nombre!=''&&apellido1!=''&&apellido2!=''&&direccion!=''&&email_cliente!=''&&telefono!=''&&usuario_cliente!=''&&contrasena!=''&&empresa_cliente!='') {
          Culqi.settings({
            title: nombre_empresa,
            currency: 'PEN',
            description: 'Producto',
            amount: monto*100
          });
          Culqi.open();
          e.preventDefault();
        }else{
          swal("Error!", "Llene los campos vacios del formulario :)", "error");
        }
      });

    function culqi() {
      monto = ($('#monto').val()*100);
      id_empresa = $('#id_empresa').val();
      nombre_empresa = $('#nombre_empresa').val();
      nombre = $('#nombre').val();
      apellido1 = $('#apellido1').val();
      apellido2 = $('#apellido2').val();
      direccion = $('#direccion').val();
      email_cliente = $('#email').val();
      telefono = $('#telefono').val();
      usuario_cliente = $('#usuario').val();
      contrasena = $('#contrasena').val();
      empresa_cliente = $('#empresa').val();
      if (monto!=''&&id_empresa!=''&&nombre_empresa!=''&&nombre!=''&&apellido1!=''&&apellido2!=''&&direccion!=''&&email_cliente!=''&&telefono!=''&&usuario_cliente!=''&&contrasena!=''&&empresa_cliente!='') {
  if (Culqi.token) { // ¡Objeto Token creado exitosamente!
    var token = Culqi.token.id;
    var email = Culqi.token.email;
    var data = {monto:monto,id_empresa:id_empresa,nombre_empresa:nombre_empresa,token:token,email:email,nombre:nombre,apellido1:apellido1,apellido2:apellido2,direccion:direccion,email_cliente:email_cliente,telefono:telefono,usuario_cliente:usuario_cliente,contrasena:contrasena,empresa_cliente:empresa_cliente};
    var url = "proceso.php";
    $.post(url,data,function(res){
     window.location.href = "carrito.php?id_empresa="+id_empresa+'&nombre_empresa='+nombre_empresa;

   })
      //En esta linea de codigo debemos enviar el "Culqi.token.id"
      //hacia tu servidor con Ajax
  } else { // ¡Hubo algún problema!
      // Mostramos JSON de objeto error en consola
      console.log(Culqi.error);
      alert(Culqi.error.user_message);
    }
  }
}
</script>
</body>

</html>