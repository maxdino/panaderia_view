<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
 
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://polvazo.informaticapp.com/usuario',
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
$usuario = json_decode($response, true); 
$valida=0;
foreach ($usuario['Detalles'] as $key => $value) { if ($value['usuario']==$_POST["usuario"]&&$value['clave']==$_POST["clave"]) {
 
    setcookie('id_usuario',$value['idEmpleado'],time()+604800,'/');
    setcookie('nombres',$value['nombres'],time()+604800,'/');
    setcookie('apellido_paterno',$value['apellido_paterno'],time()+604800,'/');
    setcookie('apellido_materno',$value['apellido_materno'],time()+604800,'/');
    setcookie('id_empresa',$value['id_empresa'],time()+604800,'/');
    setcookie('perfil_id',$value['perfil_id'],time()+604800,'/');
    setcookie('usuario_admin',$value['usuario'],time()+604800,'/');
    setcookie('clave_admin',$value['clave'],time()+604800,'/');
    setcookie('email',$value['email'],time()+604800,'/');
    setcookie('imagen',$value['imagen'],time()+604800,'/');
    setcookie('estado',$value['estado'],time()+604800,'/');
    $valida=1;
}
    # code...
}
if ($valida==1) {
    header('Location: ../principal/principal.php');  
}else{
    header('Location:index.php');  
}
 
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="http://localhost/Panaderia_view/librerias/assets/images/favicon.png">
    <title>Panaderia</title>
    <!-- Bootstrap Core CSS -->
    <link href="http://localhost/Panaderia_view/librerias/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- page css -->
    <link href="http://localhost/Panaderia_view/librerias/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="http://localhost/Panaderia_view/librerias/css/style.css" rel="stylesheet">
    

    <link href="http://localhost/Panaderia_view/librerias/css/colors/default-dark.css" id="theme" rel="stylesheet">
 
    <link rel="stylesheet" type="text/css" href="http://localhost/Panaderia_view/librerias/php_captcha/estilo.css">
<![endif]-->
</head>

<body>

    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Panaderia </p>
        </div>
    </div>

    <section id="wrapper" class="login-register login-sidebar"  style="background-image:url(http://localhost/Panaderia_view/librerias/assets/images/background/fondo_pan.jpg);">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" method="post" action=""  >
                    <a href="javascript:void(0)" class="text-center db"><img style="width: 300px;height: 200px;" src="http://localhost/Panaderia_view/librerias/assets/images/logo_pan.jpg" alt="Home" /><br/>
                        <!-- <img src="http://localhost/Panaderia_view/librerias/assets/images/logo-text.png" alt="Home" /></a> -->
                        <div class="form-group m-t-40">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" id="usuario" autocomplete="off" name="usuario" required="" placeholder="Usuario">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" id="clave" autocomplete="off" name="clave" required=""  placeholder="Contraseña">
                            </div>
                        </div>
 
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase btn-rounded"   type="submit"  >Iniciar</button>
                        </div>
                    </div>
                    <div class="row" id="mensaje">
                    </div>
                </form>
            </div>
        </section>
        <script src="http://localhost/Panaderia_view/librerias/assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="http://localhost/Panaderia_view/librerias/assets/plugins/bootstrap/js/popper.min.js"></script>
        <script src="http://localhost/Panaderia_view/librerias/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

        <!--Custom JavaScript -->
 
<script type="text/javascript">
    var base_url = "http://localhost/Panaderia_view/librerias/";
    $(function() {
        $(".preloader").fadeOut();
    });
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#form").slideUp();
            $("#recoverform").fadeIn();
        });

 
        document.querySelector('#clave').addEventListener('keypress', function (e) {
            var key = e.which || e.keyCode;
    if (key === 13) { // 13 is enter}
       if ($("#usuario").val() == "") {
        $("#usuario").focus();
        return 0;
    }
    if ($("#clave").val() == "") {
        $("#clave").focus();
        return 0;
    }
    llamarfuncion();
}
});
        document.querySelector('#usuario').addEventListener('keypress', function (e) {
            var key = e.which || e.keyCode;
    if (key === 13) { // 13 is enter}
       if ($("#usuario").val() == "") {
        $("#usuario").focus();
        return 0;
    }
    if ($("#clave").val() == "") {
        $("#clave").focus();
        return 0;
    }
    llamarfuncion();
}
});
 

    </script>
    
</body>


<!-- Mirrored from wrappixel.com/demos/admin-templates/admin-pro/main/pages-login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Jan 2019 22:31:11 GMT -->
</html>