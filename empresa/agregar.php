        <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
          if ($_FILES['fileToUpload']['name']==null) {
            $imagen = $_POST['imagen_valida'];
          }else{
            $cadena = str_replace(' ','', $_FILES['fileToUpload']['name']);
            $imagen = "empresa/".$cadena;  
            move_uploaded_file($_FILES['fileToUpload']['tmp_name'], '../librerias/imagen/'.$imagen);
          }
          $curl = curl_init();

          curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://polvazo.informaticapp.com/empresa',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'descripcion='.$_POST['nombre'].'&ruc='.$_POST['ruc'].'&direccion='.$_POST['direccion'].'&telefono='.$_POST['telefono'].'&email='.$_POST['email'].'&imagen='.$imagen,
            CURLOPT_HTTPHEADER => array(
              'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VGQnBJY3ova012SS9MOHRDSkJUanJxa3BNZFFPRGkyOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlL2g2c0xRRFpPMXpOWXZRYWh5a1o2ZGluZmZsUFZWMg==',
              'Content-Type: application/x-www-form-urlencoded'
            ),
          ));

          $response = curl_exec($curl);

          curl_close($curl);
          $empresa = json_decode($response, true);

          $curl = curl_init();

          curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://polvazo.informaticapp.com/perfiles',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 
            'perfil=SUPER USUARIO'.
            '&empresa='.$empresa['empresa'],
            CURLOPT_HTTPHEADER => array(
              'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VGQnBJY3ova012SS9MOHRDSkJUanJxa3BNZFFPRGkyOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlL2g2c0xRRFpPMXpOWXZRYWh5a1o2ZGluZmZsUFZWMg==',
              'Content-Type: application/x-www-form-urlencoded'
            ),
          ));

          $response = curl_exec($curl);

          curl_close($curl);
          $perfil = json_decode($response, true);

          $curl = curl_init();

          curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://polvazo.informaticapp.com/modulos',
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
          $modulos = json_decode($response, true);

          $mo=''; 
          foreach ($modulos['Detalles'] as $key => $value) { 
            if ($value['modulo_padre']!=1) { 
              $mo .= '&permisos[]='.$value['modulo_id'];
            }
          }
          $curl = curl_init();
          
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://polvazo.informaticapp.com/permisos_modulo',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 
            'perfil='.$perfil["perfil"].
            $mo,

            CURLOPT_HTTPHEADER => array(
              'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VGQnBJY3ova012SS9MOHRDSkJUanJxa3BNZFFPRGkyOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlL2g2c0xRRFpPMXpOWXZRYWh5a1o2ZGluZmZsUFZWMg==',
              'Content-Type: application/x-www-form-urlencoded'
            ),
          ));

          $response = curl_exec($curl);

          curl_close($curl);
          $data = json_decode($response, true);

          $usuario_clave = str_replace(' ','', $_POST['nombre']);
          $curl = curl_init();
          
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://polvazo.informaticapp.com/usuario',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 
            'nombres=SUPER USUARIO'.
            '&apellido_paterno=SUPER USUARIO'.
            '&apellido_materno=SUPER USUARIO'.
            '&direccion=SUPER USUARIO'.
            '&telefono=999999999'.
            '&empresa='.$empresa["empresa"].
            '&email=superusuario@hotmail.com'.
            '&perfil='.$perfil["perfil"].
            '&usuario='.strtolower($usuario_clave).
            '&clave='.strtolower($usuario_clave).
            '&imagen='.$imagen,
            CURLOPT_HTTPHEADER => array(
              'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VGQnBJY3ova012SS9MOHRDSkJUanJxa3BNZFFPRGkyOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlL2g2c0xRRFpPMXpOWXZRYWh5a1o2ZGluZmZsUFZWMg==',
              'Content-Type: application/x-www-form-urlencoded'
            ),
          ));

          $response = curl_exec($curl);

          curl_close($curl);
          header('Location:index.php');  
        } 
        include '../permisos.php';//modulos del navbar lateral

        $data = array('titulo_descripcion' => 'Agregar Empresa' );
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

              <form method="post" id="subirimagen" enctype="multipart/form-data" action="">
                <div class="row">
                 <div class="col-lg-4 col-xlg-3 col-md-5">
                  <div class="card">
                    <div class="card-body">
                      <center class="m-t-30"> 
                        <div  class="avatar-upload">
                          <div class="avatar-edit">
                            <input type="file" required="" name="fileToUpload" id="imageUpload" accept="image/*">
                            <label for="imageUpload"></label>
                          </div>
                          <div class="avatar-preview">
                            <img  id="imagePreview" style="background-image: url(<?php echo $url_carpeta."librerias/assets/images/foto_perfil/defecto_imagen.png" ?>);"/>
                          </div> 
                          <br><input type="hidden"  name="id" id="id">
                          <div class="row form-group has-success">
                            <label class="form-control-label" for="success">EMPRESA</label>
                            <input type="text" required="" class="form-control form-control-success solo_letras" onchange="borrar_espacios('nombre')" id="nombre" name="nombre">
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
                            <h3 class="card-title">REGISTRO</h3>
                            <hr>
                            <div class="row">
                              <div class="col-md-4 mb-3" >
                                <label for="cantidad">RUC</label>
                                <input type="text" class="form-control solo_numero" onkeyup="validar_ruc()" maxlength="11" id="ruc" name="ruc" placeholder="RUC" value="" required>
                              </div>
                              <div class="col-md-4 mb-3">
                                <label for="precio">EMAIL</label>
                                <input type="text" class="form-control " onchange="validar_correo()" id="email" name="email" placeholder="email" value="" required>
                              </div>
                              <div class="col-md-4 mb-3">
                                <label for="precio">TELEFONO</label>
                                <input type="text" class="form-control solo_numero" maxlength="9" id="telefono" name="telefono" placeholder="telefono" value="" required>
                              </div>
                              <!--/span-->
                            </div>
                            <div class="row ">
                              <div class="col-md-12 mb-3">
                                <label for="cantidad">DIRECCIÓN</label>
                                <input type="text" class="form-control solo_direccion" onchange="borrar_espacios('direccion')" id="direccion" name="direccion" placeholder="DIRECCION" value="" required>
                              </div>
                              <!--/span-->
                            </div>
                            <div class="row ">
                              <div class="col-md-4">
                              </div>
                              <div class="col-md-4 mb-3">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                <a   href="index.php" class="btn btn-inverse">Cancel</a>
                              </div>
                              <!--/span-->
                            </div>

                            <!--/row-->
                            <!--/span-->
                          </div>
                          <!--/row-->
                        </div>
                        <div class="form-actions">

                        </div>
                      </div>
                    </div>
                  </div>
                </div> 
              </div>

            </form>



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
            $('.solo_letras').on('input', function () { 
              this.value = this.value.replace(/[^a-zA-ZáéíóúüñÁÉÍÓÚÜÑ ]/g,'');
            });
            function borrar_espacios(name){
              cadena = $('#'+name).val();
              $('#'+name).val($.trim(cadena));
            }
            $('.solo_direccion').on('input', function () { 
              this.value = this.value.replace(/[^0-9a-zA-ZáéíóúüñÁÉÍÓÚÜÑ ]/g,'');
            });

            function validar_correo(){
              correo = $('#email').val();
              emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        //Se muestra un texto a modo de ejemplo, luego va a ser un icono
        if (!emailRegex.test(correo)) {
          $('#email').val('');   
        } 
      }
      function validar_ruc(){
        valida = $('#ruc').val();
        if(valida.length==11){
          $.ajax({
            type: "GET",
            url: "https://dniruc.apisperu.com/api/v1/ruc/"+valida+"?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6Im1heC5oaWxhcmlvMzUxQGdtYWlsLmNvbSJ9.mCCS9RsZR7QlO559rdbfSkGwaNZ64uN_OFtz4n3dFJk",
            success: function(data) {
             if (!(data.ruc)) {
              $('#ruc').val('');
            }  
          }
        });
        }
      }
    </script>

  </body>

  </html>