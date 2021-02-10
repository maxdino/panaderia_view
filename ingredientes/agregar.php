        <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
          $curl = curl_init();

          curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost/panaderia/index.php/ingredientes',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 
            'unidad_medida='.$_POST['unidad_medida'].
            '&ingredientes='.$_POST['ingredientes'].
            '&cantidad='.$_POST['cantidad'].
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
        }else{
           $curl = curl_init();

          curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost/panaderia/index.php/unidad_medida',
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
          $unidad_medida = json_decode($response, true);
        }
        include '../permisos.php';//modulos del navbar lateral

        $data = array('titulo_descripcion' => 'Agregar Ingredientes' );
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
                  <div class="card-body" id="cuerpo_pagina"> 

                    <div class="panel panel-default card-view">
                      <div class="panel-heading">
                        <div class="pull-left">
                          <h6 class="panel-title txt-dark"> </h6>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                          <div class="form-wrap">
                            <form method="POST" action="">
                               <div class="row p-t-0">
                                <div class="col-md-6">
                                <label class="control-label mb-10 text-left">INGREDIENTES</label>
                                <input type="text" class="form-control" required="true" name="ingredientes" id="ingredientes" autofocus="true" value="" required="">
                              </div> 
                              <div class="col-md-6">
                                <label class="control-label mb-10 text-left">CANTIDAD</label>
                                <input type="text" class="form-control" required="true" name="cantidad" id="cantidad" autofocus="true" value="" required="">
                              </div>
                            </div>
                              <div class="form-group">
                                <label for="unidad_medida">UNIDAD MEDIDA</label>
                              <?php if ($unidad_medida['Status']=='200') { ?>
                                <select class="select2  " name="unidad_medida" id="unidad_medida" style="width: 100%; height:36px;">
                                  <option></option>
                                  <?php  foreach ($unidad_medida["Detalles"] as $key => $value) { if ($value['id_empresa']==$_COOKIE['id_empresa']) { 
                                    echo "<option value='".$value["id_unidad_medida"]."'>".$value["unidad_medida"]."</option>";
                                  } } ?>
                                </select> 
                              <?php } ?>
                              </div>
                              <br>
                              <center><a ><button class="btn btn-primary">Guardar</button></a><a href="index.php"><button class="btn btn-danger" type="button" >Cancelar</button></a></center>                
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>  

            <?php include "../footer.php"; ?>   
            <?php include "../includes/js.php"; ?>
            <script type="text/javascript">
              $(function() {
              $('#unidad_medida').select2();
            });
            </script>
          </body>

          </html>