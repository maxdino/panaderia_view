        <?php

        $data = array('titulo_descripcion' => 'Documentación API - Modelo de negocio para Panaderia y Pasteleria', );
        if($_COOKIE['imagen']==""){
          $ver="icono_perfil.PNG";
        }else{
          $ver=$_COOKIE['imagen'];
        }
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
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body" id="cuerpo_pagina"> 
                    <h4 class="card-title">Gestion de Clientes</h4>
                      <hr>
                      <p>Esta sección contiene la información de la gestión de cliente, el cual se puede acceder a través del POSTMAN en la siguiente dirección: <strong>http://polvazo.informaticapp.com/clientes</strong></p>
                      <p>Cabe mencionar que es necesario que obtengas el token de seguridad para tener acceso a todos los recursos, si todavía no cuentas con uno, puedes solicitarlo aquí</p>
                      <hr>
                    <h4 class="card-title">Método GET</h4>
                    <p>A través de este método puede solicitar información de todos los clientes o de un cliente en particular, para solicitar información de todos los clientes debe hacerlo a través de la siguiente dirección:</p>
                    <img src="../../imagen/clientes_get_1.PNG" style="width: 80%;">
                    <p>El resultado de la consulta de todos los clientes debería ser como se muestra en la siguiente imagen:</p>
                    <img src="../../imagen/clientes_get_2.PNG" style="width: 60%;">
                    <p>Si desea solicitar información de un cliente en particular lo debe hacer a través de la siguiente dirección:</p>
                    <img src="../../imagen/clientes_get_3.PNG" style="width: 80%;">
                    <p>El resultado de la consulta de un cliente en particular debería ser como se muestra en la siguiente imagen:</p>
                    <img src="../../imagen/clientes_get_4.PNG" style="width: 60%;">
                     
                  </div>
                </div>
              </div>
            </div>



            <?php include "../../includes/js.php"; ?>
          </body>

          </html>