  <?php

  $data = array('titulo_descripcion' => 'Documentación API - Modelo de negocio para Panaderia y Pasteleria', );
  if($_COOKIE['imagen']==""){
  	$ver="icono_perfil.png";
  }else{
  	$ver=$_COOKIE['imagen'];
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
  	<link rel="icon" type="image/png" sizes="16x16" href="imagen/logo_polvazo_4.png">
  	<title>POLVAZO</title>
  	<!-- Bootstrap Core CSS -->

  	<script src="assets/plugins/jquery/jquery.min.js"></script>
  	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  	<link href="assets/plugins/icheck/skins/all.css" rel="stylesheet">
  	<!-- Custom CSS -->
  	<link href="css/style.css" rel="stylesheet">
  	<!-- You can change the theme colors from here -->
  	<link href="css/colors/default-dark.css" id="theme" rel="stylesheet">

  	<link type="text/css" rel="stylesheet" href="assets/plugins/jsgrid/jsgrid.min.css" />
  	<link type="text/css" rel="stylesheet" href="assets/plugins/jsgrid/jsgrid-theme.min.css" />
  	<link rel="stylesheet" type="text/css" href="assets/plugins/datatables/media/css/dataTables.bootstrap4.css">
  	<link href="assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
  	<link href="css/pages/form-icheck.css" rel="stylesheet">
  	<link href="assets/plugins/toast-master/css/jquery.toast.css" rel="stylesheet">

  	<link href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"/>
  </head>
  <script type="text/javascript">


  </script>
  <body class="fix-header card-no-border fix-sidebar">

  	<div class="preloader">
  		<div class="loader">
  			<div class="loader__figure"></div>
  			<p class="loader__label">Panaderia y Pasteleria</p>
  		</div>
  	</div>

  	<div id="main-wrapper">

  		<header class="topbar">
  			<nav class="navbar top-navbar navbar-expand-md navbar-light">

  				<div class="navbar-header">
  					<a class="navbar-brand" href="#">
  						<!-- Logo icon --><b>
  							<!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
  							<!-- Dark Logo icon -->
  							<img src="imagen/logo_polvazo_4.png" style="    width: 50px;" alt="homepage" class="dark-logo" />
  							<!-- Light Logo icon -->
  							<img src="../librerias/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
  						</b>
  						<!--End Logo icon -->
  						<!-- Logo text --><span>
  							<!-- dark Logo text -->
  							<!--<img style="width: 150px;height: 50px;" src="../librerias/imagen/ " alt="homepage" class="dark-logo" />-->
  							<!-- Light Logo text -->    
  							<img src="../librerias/assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
  						</div>

  						<div class="navbar-collapse">
  							<ul class="navbar-nav mr-auto">
  								<!-- This is  -->
  								<li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
  								<li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
  								<li class="nav-item hidden-sm-down"></li>
  							</ul>
  							<ul class="navbar-nav my-lg-0">
  								<li class="nav-item dropdown">
  									<a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img id="foto_perfilupdate" src="imagen/usuario_2.jpg" alt="user" class="profile-pic" /></a>
 
  									</li>
  								</ul>
  							</div>
  						</nav>
  					</header>
  					<aside class="left-sidebar">
  						<!-- Sidebar scroll-->
  						<div class="scroll-sidebar">
  							<!-- Sidebar navigation-->
  							<nav class="sidebar-nav">
  								<ul id="sidebarnav">
  									<li class="user-profile"> <a class=" waves-effect waves-dark" href="#" aria-expanded="false"><img class="foto_perfilupdate" src="imagen/usuario_2.jpg" alt="user" /><span class="hide-menu">POLVAZO</span></a>
  									</li>
  									<li class="nav-devider"></li>
  									<li class="nav-small-cap">PERSONAL</li>
  									<li> <a  data-target="#cuerpo_0" class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class=" ti-briefcase"></i><span class="hide-menu">Mantenimiento</span></a>
  										<ul id="cuerpo_0" aria-expanded="false" class="collapse">
  											<li><a href="pages/mantenimiento/categoria.php">Categoria</a>
  											</li>
  											<li><a href="pages/mantenimiento/unidad_medida.php">Unidad Medida</a>
  											</li>
  										</ul>
  									</li>
  									<li> <a  data-target="#cuerpo_1" class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class=" mdi mdi-account-multiple"></i><span class="hide-menu">Almacen</span></a>
  										<ul id="cuerpo_1" aria-expanded="false" class="collapse">
  											<li><a href="pages/almacen/proveedor.php">Proveedor</a> </li>
  											<li><a href="pages/almacen/ingredientes.php">Ingredientes</a> </li>
                        <li><a href="pages/almacen/compras.php">Compras</a> </li>
                        <li><a href="pages/almacen/productos.php">Producto</a> </li>
  										</ul>
  									</li>
                   <li> <a  data-target="#cuerpo_2" class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class=" mdi mdi-clipboard"></i><span class="hide-menu">Ventas</span></a>
                    <ul id="cuerpo_2" aria-expanded="false" class="collapse">
                      <li><a href="pages/ventas/clientes.php">Clientes</a></li>
                      <li><a href="pages/ventas/ventas.php">Ventas</a></li>
                    </ul>
                  </li>
                  <li> <a  data-target="#cuerpo_3" class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-key"></i><span class="hide-menu">Administración</span></a>
                    <ul id="cuerpo_3" aria-expanded="false" class="collapse">
                      <li><a href="pages/administracion/permisos.php">Permisos</a></li>
                      <li><a href="pages/administracion/perfil.php">Perfil</a></li>
                      <li><a href="pages/administracion/usuario.php">Usuario</a></li>
                    </ul>
                  </li>
                </ul>
              </nav>

            </div>

          </aside>
          <div class="page-wrapper">

            <div class="container-fluid"  id="cuerpo_pagina_vista">

             <div class="row page-titles">
              <div class="col-md-5 align-self-center">
               <h3 class="text-themecolor"><?php if(isset($data["titulo_descripcion"])){echo $data["titulo_descripcion"];}else{echo "Panel de Control";} ?></h3>
             </div>
             <div class="col-md-7 align-self-center">
               <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Principal</a></li>
                <li class="breadcrumb-item">Pagina</li>
                <li class="breadcrumb-item active"><?php if(isset($data["titulo_descripcion"])){echo $data["titulo_descripcion"];}else{echo "Panel de Control";} ?></li>
              </ol>
            </div>
          </div>
          <!-- Contenido (cuerpo) -->
          <div class="row">
            <div class="col-12">
             <div class="card">
              <div class="card-body" id="cuerpo_pagina"> 
               <h4 class="card-title">Introduccion</h4>
               <hr>
               <p>Bienvenidos a la documentación de la API - Modelo de negocio para restaurantes. La documentación de esta API está aplicada para los modelos de negocios del departamento de San Martín que desarrollen este rubro.

                Para este trabajo, se han considerado la colaboración de un equipo de tecnología y desarrollo que ha elaborado un análisis de requerimientos de acuerdo a la realidad planteada, fruto de este esfuerzo profesional, se ha desarrollado la gestión del modelo de negocio para los componentes de compras, ventas, mantenimiento de entidades de las bases de datos, gestión de la seguridad y reportes personalizados para cada unidad de negocio que pretenda utilizar estas API para su fin comercial. Además estas API es una propuesta desarrollada por estudiantes de la Escuela Profesional de Ingeniería de Sistemas e Informática de la Universidad Nacional de San Martín - Tarapoto.

                Las API está organizadas en base a los conceptos REST. Es decir, la API está orientada a recursos y utiliza códigos de respuestas HTTP para indicar errores. Además se utilizan los métodos HTTP como GET, POST, PUT y DELETE para las correspondientes acciones. Se sugiere utilizar POSTMAN y las respuestas en formato JSON.
              </p>
              <p>Para alguna consulta en particular que no se encuentre dentro de la presente documentación, escríbanos a polvazo@gmail.com para más detalles.</p>
              <p style="margin-left: 400px;">
                <img  src="assets/postman.png">	
              </p>
            </div>
          </div>
        </div>
      </div>



      <!-- Bootstrap tether Core JavaScript -->
      <script src="assets/plugins/bootstrap/js/popper.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <!-- slimscrollbar scrollbar JavaScript -->
      <script src="js/perfect-scrollbar.jquery.min.js"></script>

      <!--Wave Effects -->
      <script src="js/waves.js"></script>
      <!--Menu sidebar -->
      <script src="js/sidebarmenu.js"></script>
      <!--stickey kit -->
      <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
      <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
      <!--Custom JavaScript -->
      <script src="js/custom.min.js"></script>
      <script src="assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
      <script src="assets/plugins/icheck/icheck.min.js"></script>


      <script src="assets/plugins/icheck/icheck.init.js"></script>
      <script type="text/javascript" src="js/jquery.validate.min.js"></script>
      <!-- ============================================================== -->
      <!-- Style switcher -->
      <!-- ============================================================== -->
      <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
      <script src="assets/plugins/datatables/datatables.min.js"></script> 
      <script src="assets/plugins/toast-master/js/jquery.toast.js"></script>
      <script src="js/toastr.js"></script>
      <script src="assets/plugins/moment/moment.js"></script>
      <script src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    </body>

    </html>