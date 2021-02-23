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
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 
            'nombres='.$_POST["nombre"].
            '&apellido_paterno='.$_POST["apellido1"].
            '&apellido_materno='.$_POST["apellido2"].
            '&direccion='.$_POST["direccion"].
            '&telefono='.$_POST["telefono"].
            '&empresa='.$_COOKIE['id_empresa'],
            CURLOPT_HTTPHEADER => array(
              'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VGQnBJY3ova012SS9MOHRDSkJUanJxa3BNZFFPRGkyOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlL2g2c0xRRFpPMXpOWXZRYWh5a1o2ZGluZmZsUFZWMg==',
              'Content-Type: application/x-www-form-urlencoded'
            ),
          ));

          $response = curl_exec($curl);

          curl_close($curl);
          $data = json_decode($response, true);
          header('Location:index.php');  
        }
        include '../permisos.php';//modulos del navbar lateral

        $data = array('titulo_descripcion' => 'Agregar Cliente' );
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
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" id="titulo_cabeza">Browser default Validation</h4>
                    <form method="POST" action="">
                      <div class="form-row">
                        <div class="col-md-4 mb-3">
                          <label for="validationDefault01">NOMBRES</label>
                          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="" required>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="validationDefault02">APELLIDO PATERNO</label>
                          <input type="text" class="form-control" id="apellido1" name="apellido1" placeholder="Apellido Paterno" value="" required>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="validationDefault02">APELLIDO MATERNO</label>
                          <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Apellido Materno" value="" required>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-4 mb-3">
                          <label for="validationDefault01">DIRECCIÓN</label>
                          <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" value="" required>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="validationDefault02">TELEFONO</label>
                          <input type="text" class="form-control" id="telefono" maxlength="9"  name="telefono" placeholder="Telefono" value="" required>
                        </div>
                      </div>
                      <button class="btn btn-primary" type="submit">Procesar</button>
                      <a  href="index.php"><button class="btn btn-danger" type="button">Atras</button></a>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <?php include "../footer.php"; ?>   
            <?php include "../includes/js.php"; ?>
            <script type="text/javascript">
             
           </script>
         </body>

         </html>