        <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
          $curl = curl_init();

          curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost/panaderia/index.php/modulos',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 
            'nombre='.$_POST["descripcion"].
            '&icono='.$_POST["icono"].
            '&url='.$_POST["url"].
            '&padre='.$_POST["modulo"].
            '&orden='.$_POST["orden"],
            CURLOPT_HTTPHEADER => array(
              'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VGQnBJY3ova012SS9MOHRDSkJUanJxa3BNZFFPRGkyOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlL2g2c0xRRFpPMXpOWXZRYWh5a1o2ZGluZmZsUFZWMg==',
              'Content-Type: application/x-www-form-urlencoded'
            ),
          ));

          $response = curl_exec($curl);

          curl_close($curl);
          $data = json_decode($response, true);
          header('Location:index.php');  
        }else{
          $curl = curl_init();

          curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost/panaderia/index.php/modulos',
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
          $listar_modulos = json_decode($response, true);


        }
        include '../permisos.php';//modulos del navbar lateral

        $data = array('titulo_descripcion' => 'Agregar Modulos' );
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
                    <h4 class="card-title" id="titulo_cabeza"> </h4>
                    <form method="POST" action="">
                      <div class="form-row">
                        <input type="hidden"  name="id" id="id">
                        <div class="col-md-4 mb-3">
                          <label for="validationDefault01">DESCRIPCIÓN DEL MÓDULO</label>
                          <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Modulo" value="" required>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="validationDefault02">URL</label>
                          <input type="text" class="form-control" id="url" name="url" placeholder="URL" value="" required>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="validationDefaultUsername">ICONO</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <a href="javascript:void(0)" data-toggle="modal" data-target=".bs-example-modal-lg" class="model_img img-responsive"  ><span class="input-group-text" id="inputGroupPrepend2"><i id= "" class="mdi mdi-format-float-center"></i></span></a>
                            </div>
                            <input type="text" class="form-control" id="icono"  name="icono"  placeholder="" aria-describedby="inputGroupPrepend2" required>
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-4 mb-3">
                          <label for="validationDefault02">ORDEN</label>
                          <input type="text" class="form-control" id="orden" name="orden" placeholder="Orden" value="" required>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="validationDefault03">MODULO PADRE</label>
                          <?php if ($listar_modulos['Status']=='200') { ?>
                            <select class="select2  " name="modulo" id="modulo" style="width: 100%; height:36px;">
                              <?php  foreach ($listar_modulos["Detalles"] as $key => $value) { if ($value['modulo_padre']==1) { 
                                echo "<option value='".$value["modulo_id"]."'>".$value["modulo_nombre"]."</option>";
                              } } ?>
                            </select> 
                          <?php } ?>
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
              $(function() {
               $('#modulo').select2();

             });
           </script>
         </body>

         </html>