        <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
          $curl = curl_init();
          if ($_FILES['imagen']['name']==null) {
            $imagen = $_POST['imagen_valida'];
          }else{
            $cadena = str_replace(' ','', $_FILES['imagen']['name']);
            $imagen = "categoria/".$cadena;  
            move_uploaded_file($_FILES['imagen']['tmp_name'], '../librerias/imagen/'.$imagen);
          }
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://polvazo.informaticapp.com/categoria',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 
            'categoria='.$_POST['categoria'].
            '&imagen='.$imagen.
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

        $data = array('titulo_descripcion' => 'Agregar Categoria' );
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
                            <form method="POST" action="" enctype="multipart/form-data">
                              <div class="form-group">
                                <input type="hidden"  name="id" id="id">
                                <label class="control-label mb-10 text-left">DESCRIPCION DE CATEGORIA</label>
                                <input type="text" class="form-control solo_letras" onchange="borrar_espacios('categoria')" required="true" name="categoria" id="categoria" autofocus="true" value="">
                              </div>
                              <div class="form-group">
                                <input type="hidden"  name="imagen_valida" id="imagen_valida">
                                <label class="control-label mb-10 text-left">IMAGEN</label>
                                <input type="file" class="form-control" required="true" name="imagen" id="imagen" accept="image/*" autofocus="true" value="">
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
              $('.solo_precio').on('input', function () { 
                this.value = this.value.replace(/[^0-9.]/g,'');
              });
              $('.solo_numero').on('input', function () { 
                this.value = this.value.replace(/[^0-9]/g,'');
              });
              $('.solo_letras').on('input', function () { 
                this.value = this.value.replace(/[^a-zA-ZáéíóúüñÁÉÍÓÚÜÑ ]/g,'');
              });
              function borrar_espacios(name){
                cadena = $('#'+name).val();
                $('#'+name).val($.trim(cadena));
              }
              function formato_numero(name){
                formato = $('#'+name).val();
                $('#'+name).val(parseFloat(formato).toFixed(2));
              }
            </script>
          </body>

          </html>