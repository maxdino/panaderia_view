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
                    <h4 class="card-title">Gestion de Compras</h4>
                      <hr>
                      <p>Esta sección contiene la información de la gestión de compras, el cual se puede acceder a través del POSTMAN en la siguiente dirección: <strong>http://polvazo.informaticapp.com/compras</strong></p>
                      <p>Cabe mencionar que es necesario que obtengas el token de seguridad para tener acceso a todos los recursos, si todavía no cuentas con uno, puedes solicitarlo aquí</p>
                      <hr>
                    <h4 class="card-title">Método GET</h4>
                    <p>A través de este método puede solicitar información de todas las compras o de una compra en particular, para solicitar información de todas las compras debe hacerlo a través de la siguiente dirección:</p>
                    <img src="../../imagen/compras_get_1.PNG" style="width: 80%;">
                    <p>El resultado de la consulta de todas las compras debería ser como se muestra en la siguiente imagen:</p>
                    <img src="../../imagen/compras_get_2.PNG" style="width: 60%;">
                    <p>Si desea solicitar información de una compra en particular lo debe hacer a través de la siguiente dirección:</p>
                    <img src="../../imagen/compras_get_3.PNG" style="width: 80%;">
                    <p>El resultado de la consulta de una compra en particular debería ser como se muestra en la siguiente imagen:</p>
                    <img src="../../imagen/compras_get_4.PNG" style="width: 60%;">
                    <hr>
                    <h4 class="card-title">Método POST</h4>
                    <p>A través de este método puede enviar información de una compra en particular, para solicitar esta información debe hacerlo a través de la siguiente dirección:</p>
                    <img src="../../imagen/compras_post_1.PNG" style="width: 80%;">
                    <p>El resultado del envío de una compra en particular debería ser como se muestra en la siguiente imagen:</p>
                    <img src="../../imagen/compras_post_2.PNG" style="width: 60%;">
                    <hr>
                    
                </div>
              </div>
            </div>



            <?php include "../../includes/js.php"; ?>
          </body>

          </html>