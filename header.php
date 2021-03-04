      <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <!-- Tell the browser to be responsive to screen width -->
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">
            <?php $url_carpeta = 'http://localhost/Panaderia_view/';  ?>
            <!-- Favicon icon -->
            <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $url_carpeta;?>librerias/imagen/iconos/logo_polvazo_5.png">
            <title>Panaderia y Pasteleria</title>
            <!-- Bootstrap Core CSS -->
            <?php include "../includes/css.php"; ?>
        </head>
        <script type="text/javascript">
            var base_url = "<?php echo 'http://localhost/Panaderia_view'; ?>";
            
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
                                    <img src="<?php echo $url_carpeta;?>librerias/imagen/iconos/logo_polvazo_4.png" style="    width: 50px;" alt="homepage" class="dark-logo" />
                                    <!-- Light Logo icon -->
                                    <img src="<?php echo $url_carpeta;?>librerias/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                                </b>
                                <!--End Logo icon -->
                                <!-- Logo text --><span>
                                 <!-- dark Logo text -->
                                 <img style="width: 150px;height: 50px;" src="<?php echo $url_carpeta;?>librerias/imagen/<?php echo $_COOKIE['imagen_empresa_admin']; ?>" alt="homepage" class="dark-logo" />
                                 <!-- Light Logo text -->    
                                 <img src="<?php echo $url_carpeta;?>librerias/assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
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
                                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img id="foto_perfilupdate" src="<?php echo $url_carpeta.'librerias/imagen/'.$ver; ?>" alt="user" class="profile-pic" /></a>
                                        <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                            <ul class="dropdown-user">
                                                <li>
                                                    <div class="dw-user-box">
                                                        <div class="u-img"><img class="foto_perfilupdate" src="<?php echo $url_carpeta.'librerias/imagen/'.$ver; ?>" alt="user"></div>
                                                        <div class="u-text">
                                                            <h4><?php echo $_COOKIE['nombres']; ?></h4>
                                                            <p class="text-muted"><?php echo $_COOKIE['email']; ?></p><a href="<?php echo $url_carpeta?>Editarusuario" class="btn btn-rounded btn-danger btn-sm">Ver Perfil</a></div>
                                                        </div>
                                                    </li>
                                                    <li role="separator" class="divider"></li>
                                                    <li><a href="../cerrar_session.php"><i class="fa fa-power-off"></i> Cerrar Sesión</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </header>