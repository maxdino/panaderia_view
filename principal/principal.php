        <?php
        include '../permisos.php';//modulos del navbar lateral
        
        $data = array('titulo_descripcion' => 'sistema', );
        if($_COOKIE['imagen']==""){
            $ver="icono_perfil.png";
        }else{
            $ver=$_COOKIE['imagen'];
        }
        include '../validar_session.php';
        ?>
                        <?php include '../header.php'; ?>
                        <?php include '../navbar.php'; ?>
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

                            <?php include "../footer.php"; ?>   

                    <?php include "../includes/js.php"; ?>
                </body>

                </html>