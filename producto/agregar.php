        <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
          $curl = curl_init();
          if ($_FILES['fileToUpload']['name']==null) {
            $imagen = $_POST['imagen_valida'];
          }else{
            $cadena = str_replace(' ','', $_FILES['fileToUpload']['name']);
            $imagen = "producto/".$cadena;  
            move_uploaded_file($_FILES['fileToUpload']['tmp_name'], '../librerias/imagen/'.$imagen);
          }
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://polvazo.informaticapp.com/producto',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 
            'producto='.$_POST["nombre"].
            '&cantidad='.$_POST["cantidad"].
            '&precio='.$_POST["precio"].
            '&categoria='.$_POST["categoria"].
            '&unidad_medida='.$_POST["unidad_medida"].
            '&empresa='.$_COOKIE['id_empresa'].
            '&imagen='.$imagen,
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
            CURLOPT_URL => 'http://polvazo.informaticapp.com/categoria',
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
          $categoria = json_decode($response, true);

          $curl = curl_init();

          curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://polvazo.informaticapp.com/unidad_medida',
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

        $data = array('titulo_descripcion' => 'Agregar Producto' );
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

            <style type="text/css">
              .avatar-upload {
                position: relative;
                max-width: 205px;
                margin: 50px auto;
              }
              .avatar-upload .avatar-edit {
                position: absolute;
                right: 12px;
                z-index: 1;
                top: 10px;
              }
              .avatar-upload .avatar-edit input {
                display: none;
              }
              .avatar-upload .avatar-edit input + label {
                display: inline-block;
                width: 34px;
                height: 34px;
                margin-bottom: 0;
                border-radius: 100%;
                background: #FFFFFF;
                border: 1px solid transparent;
                box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
                cursor: pointer;
                font-weight: normal;
                transition: all 0.2s ease-in-out;
                }mdi-lead-pencil
                .avatar-upload .avatar-edit input + label:hover {
                  background: #f1f1f1;
                  border-color: #d6d6d6;
                }
                .avatar-upload .avatar-edit input + label:after {
                  content: "\F64F";
                  font-family: 'Material Design Icons';
                  color: #757575;
                  position: absolute;
                  top: 10px;
                  left: 0;
                  right: 0;
                  text-align: center;
                  margin: auto;
                }
                .avatar-upload .avatar-preview {
                  width: 192px;
                  height: 192px;
                  position: relative;
                  border-radius: 100%;
                  border: 6px solid #F8F8F8;
                  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
                }
                .avatar-upload .avatar-preview > img {
                  width: 100%;
                  height: 100%;
                  border-radius: 100%;
                  background-size: cover;
                  background-repeat: no-repeat;
                  background-position: center;
                }
              </style>
              <div class="row">
                <form method="post" id="subirimagen" enctype="multipart/form-data" action="">
                  <div class="row">
                   <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                      <div class="card-body">
                        <center class="m-t-30"> 
                          <div  class="avatar-upload">
                            <div class="avatar-edit">
                              <input type="file" name="fileToUpload" id="imageUpload" accept="image/*">
                              <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                              <img  id="imagePreview" style="background-image: url(<?php echo $url_carpeta."librerias/assets/images/foto_perfil/defecto_imagen.png" ?>);"/>
                            </div> 
                            <br><input type="hidden"  name="id" id="id">
                            <div class="row form-group has-success">
                              <label class="form-control-label" for="success">PRODUCTO</label>
                              <input type="text" class="form-control form-control-success" id="nombre" name="nombre">
                            </div> 
                          </div>  
                        </center>
                      </div>

                    </div>
                  </div>
                  <!-- Column -->
                  <!-- Column -->
                  <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs profile-tab" role="tablist"> 
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Registro</a> </li> 
                      </ul>
                      <!-- Tab panes -->
                      <div class="tab-content">
                        <!--second tab-->
                        <div class="tab-pane active" id="profile" role="tabpanel">
                          <div class="card-body">
                           <form action="#">
                            <div class="form-body">
                              <h3 class="card-title">PRODUCTO</h3>
                              <hr>
                              <div class="row p-t-0">
                                <div class="col-md-6">
                                  <label for="cantidad">CANTIDAD</label>
                                  <input type="text" class="form-control solo_numero" maxlength="4" id="cantidad" name="cantidad" placeholder="cantidad" value="" required>
                                </div>
                                <div class="col-md-6">
                                  <label for="direccion">UNIDAD MEDIDA</label>
                                  <?php if ($unidad_medida['Status']=='200') { ?>
                                    <select class="select2  " name="unidad_medida" id="unidad_medida" style="width: 100%; height:36px;">
                                      <option></option>
                                      <?php  foreach ($unidad_medida["Detalles"] as $key => $value) { if ($value['id_empresa']==$_COOKIE['id_empresa']) { 
                                        echo "<option value='".$value["id_unidad_medida"]."'>".$value["unidad_medida"]."</option>";
                                      } } ?>
                                    </select> 
                                  <?php } ?>
                                </div>
                                <!--/span-->
                              </div>
                              <div class="row p-t-0">
                               <div class="col-md-6">
                                <label for="precio">PRECIO</label>
                                <input type="text" class="form-control solo_precio" id="precio" name="precio" placeholder="precio" value="" required>
                              </div>
                              <div class="col-md-6">
                                <label for="direccion">CATEGORIA</label>
                                <?php if ($categoria['Status']=='200') { ?>
                                  <select class="select2  " name="categoria" id="categoria" style="width: 100%; height:36px;">
                                    <option></option>
                                    <?php  foreach ($categoria["Detalles"] as $key => $value) { if ($value['id_empresa']==$_COOKIE['id_empresa']) { 
                                      echo "<option value='".$value["id_categoria"]."'>".$value["categoria"]."</option>";
                                    } } ?>
                                  </select> 
                                <?php } ?>
                              </div>
                              <!--/span-->
                            </div>
                            <!--/row-->
                            <!--/span-->
                          </div>
                          <!--/row-->
                        </div>
                        <div class="form-actions">
                          <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                          <a   href="index.php" class="btn btn-inverse">Cancel</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>


        <?php include "../footer.php"; ?>   
        <?php include "../includes/js.php"; ?>
        <script type="text/javascript">
         $(function(){
          $('#categoria').select2();
          $('#unidad_medida').select2();
        })
      </script>
      <script type="text/javascript"> 
        function readURL(input) {
          var  variable;
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) { 
              $('#imagePreview').css('background-image', 'url('+e.target.result +')'); 
              $('#imagePreview').attr('src', e.target.result);
              $(".foto_perfilupdate").attr('src', e.target.result);
              $("#foto_perfilupdate").attr('src', e.target.result);
              $('#imagePreview').hide();
              $('#imagePreview').fadeIn(650); 

            }                         
            reader.readAsDataURL(input.files[0]); 
          }
        }
        $("#imageUpload").change(function() {
         readURL(this);  
       });

        $('.solo_numero').on('input', function () { 
          this.value = this.value.replace(/[^0-9]/g,'');
        });
        $('.solo_precio').on('input', function () { 
          this.value = this.value.replace(/[^0-9.]/g,'');
        });
        $('.solo_serie').on('input', function () { 
          this.value = this.value.replace(/[^0-9-]/g,'');
        });
      </script>

    </body>

    </html>