        <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
          if ($_FILES['fileToUpload']['name']==null) {
            $imagen = $_POST['imagen_valida'];
          }else{
            $cadena = str_replace(' ','', $_FILES['fileToUpload']['name']);
            $imagen = "usuario/".$cadena;  
            move_uploaded_file($_FILES['fileToUpload']['tmp_name'], '../librerias/imagen/'.$imagen);
          }

          $curl = curl_init();
          
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://polvazo.informaticapp.com/usuario/'.$_POST['id'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 
            'nombres='.$_POST["nombre"].
            '&apellido_paterno='.$_POST["apellido1"].
            '&apellido_materno='.$_POST["apellido2"].
            '&direccion='.$_POST["direccion"].
            '&telefono='.$_POST["telefono"].
            '&empresa='.$_COOKIE['id_empresa'].
            '&email='.$_POST["correo"].
            '&perfil='.$_COOKIE["perfil_id"].
            '&usuario='.$_POST["usuario"].
            '&clave='.$_POST["clave"].
            '&imagen='.$imagen,
            CURLOPT_HTTPHEADER => array(
              'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VGQnBJY3ova012SS9MOHRDSkJUanJxa3BNZFFPRGkyOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlL2g2c0xRRFpPMXpOWXZRYWh5a1o2ZGluZmZsUFZWMg==',
              'Content-Type: application/x-www-form-urlencoded'
            ),
          ));

          $response = curl_exec($curl);

          curl_close($curl);
          $usuario = json_decode($response, true);
          header('Location:editar_perfil.php');  
        } 
          $curl = curl_init();
           
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://polvazo.informaticapp.com/usuario/'.$_COOKIE['id_usuario'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
              'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VGQnBJY3ova012SS9MOHRDSkJUanJxa3BNZFFPRGkyOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlL2g2c0xRRFpPMXpOWXZRYWh5a1o2ZGluZmZsUFZWMg==',
              'Content-Type: application/x-www-form-urlencoded'
            ),
          ));

          $response = curl_exec($curl);

          curl_close($curl);
          $usuario = json_decode($response, true);
         
        include '../permisos.php';//modulos del navbar lateral

        $data = array('titulo_descripcion' => 'Editar Perfil Usuario' );
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
            <!-- Contenido (cuerpo) -->
            <div class="row">
             <form method="post" enctype="multipart/form-data" action="">
              <div class="row">
                <div class="col-lg-4 col-xlg-3 col-md-5">
                  <input type="hidden" name="id" value="<?php echo $_COOKIE["id_usuario"]?>" id="id" >
                  <div class="card">
                    <div class="card-body">
                      <center class="m-t-30"> 
                        <div  class="avatar-upload">
                          <div class="avatar-edit">
                            <input type="file" name="fileToUpload" id="imageUpload" accept=".png, .jpg, .jpeg">
                            <input type='hidden' name="imagen_valida" id="imagen_valida" value="<?php echo $usuario["Detalles"]['imagen'] ?>">
                            <label for="imageUpload"></label>
                          </div>
                          <div class="avatar-preview">
                            <img  id="imagePreview" style="background-image: url( <?php echo "../librerias/imagen/".$usuario["Detalles"]['imagen'] ?>);"/>
                          </div> 
                        </div> 
                        <h4 class="card-title m-t-10"><?php   echo $usuario["Detalles"]['nombres'] ; ?></h4>
                        <h6 class="card-subtitle"> </h6>
                        <div class="row text-center justify-content-md-center">
                          <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                          <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                        </div>
                      </center>
                    </div>
                    <div>
                      <hr> </div>
                      <div class="card-body"> <small class="text-muted">Correo Electronico </small>
                        <h6><?php echo $usuario["Detalles"]['email'] ?></h6> <small class="text-muted p-t-30 db">Telefono</small>
                        <h6><?php echo $usuario["Detalles"]['telefono'] ?></h6> <small class="text-muted p-t-30 db">Dirección</small>
                        <h6><?php echo $usuario["Detalles"]['direccion'] ?></h6>
                        <small class="text-muted p-t-30 db">Redes Sociales</small>
                        <br/>
                        <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
                        <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                        <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button>
                      </div>
                    </div>
                  </div>
                  <!-- Column -->
                  <!-- Column -->
                  <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs profile-tab" role="tablist"> 
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Perfil</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Configuración</a> </li>
                      </ul>
                      <!-- Tab panes -->
                      <div class="tab-content">
                        <!--second tab-->
                        <div class="tab-pane active" id="profile" role="tabpanel">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-3 col-xs-6 b-r"> <strong><?php echo $usuario["Detalles"]['nombres'].' '.$usuario["Detalles"]['apellido_paterno'].' '.$usuario["Detalles"]['apellido_materno'] ?></strong>
                                <br>
                                <p class="text-muted"><?php echo $usuario["Detalles"]['nombres'] ?></p>
                              </div>
                              <div class="col-md-3 col-xs-6 b-r"> <strong>Telefono</strong>
                                <br>
                                <p class="text-muted">(+51) <?php echo $usuario["Detalles"]['telefono'] ?></p>
                              </div>
                              <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                <br>
                                <p class="text-muted"><?php echo $usuario["Detalles"]['email'] ?></p>
                              </div>
                              <div class="col-md-3 col-xs-6"> <strong>Ubicación</strong>
                                <br>
                                <p class="text-muted">Tarapoto</p>
                              </div>
                            </div>
                            <hr>
                          </div>
                        </div>
                        <div class="tab-pane" id="settings" role="tabpanel">
                         
                          <div class="card-body">

                            <div class="row form-material">
                              <div class="col-md-6 mb-3"> 
                                <label class="m-t-20">Nombre</label>
                                <input type="text" required="" placeholder="Johnathan Doe" value="<?php echo $usuario["Detalles"]['nombres'] ?>" onchange="borrar_espacios('nombre')" name="nombre" id="nombre" class="form-control form-control-line solo_letras">
                              </div>
                              <div class="col-md-6 mb-3">
                               <label for="apellido_paterno" class="m-t-20">Apellido Paterno</label>
                                <input type="text" required="" placeholder="Johnathan Doe" value="<?php echo $usuario["Detalles"]['apellido_paterno'] ?>" onchange="borrar_espacios('apellido1')" name="apellido1" id="apellido1" class="form-control form-control-line solo_letras">
                            </div>
                          </div>
 
                         <div class="row form-material">
                          <div class="col-md-6 mb-3">
                               <label for="apellido_paterno" class="m-t-20">Apellido Materno</label>
                                <input type="text" required="" placeholder="Johnathan Doe" value="<?php echo $usuario["Detalles"]['apellido_materno'] ?>" onchange="borrar_espacios('apellido2')" name="apellido2" id="apellido2" class="form-control form-control-line solo_letras">
                            </div>
                          <div class="col-md-6 mb-3">
                           <label for="correo" class="m-t-20">Email</label>
                            <input type="email" required="" onchange="validar_correo()" placeholder="Email" value="<?php echo $usuario["Detalles"]['email'] ?>"  class="form-control form-control-line" name="correo" id="correo">
                        </div>
                      </div>
                      <div class="row form-material">
                        <div class="col-md-6 mb-3"> 
                          <label class="m-t-20">Usuario</label>
                          <input type="text" required=""  value="<?php echo $usuario["Detalles"]['usuario'] ?>" name="usuario" id="usuario" class="form-control form-control-line">
                        </div>
                        <div class="col-md-6 mb-3">
                         <label for="telefono" class="m-t-20">Telefono</label>
                          <input type="text" required="" placeholder="Telefono" maxlength="9" value="<?php echo $usuario["Detalles"]['telefono'] ?>" name="telefono" id="telefono" class="form-control form-control-line solo_numero">
                      </div>
                    </div>
                    <div class="row form-material">
                       <div class="col-md-6 mb-3"> 
                          <label class="m-t-20">Contraseña</label>
                          <input type="password" required="" value="<?php echo $usuario["Detalles"]['clave'] ?>" name="clave" id="clave" class="form-control form-control-line">
                        </div>
                    <div class="col-md-6 mb-3">
                       <label for="example-email" class="m-t-20">Direccion</label>
                        <input type="text" required="" placeholder="123 456 7890"  value="<?php echo $usuario["Detalles"]['direccion'] ?>" name="direccion" id="direccion" class="form-control form-control-line solo_direccion">
                    </div>
                  </div>
                  <br>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-success" >Actualizar Perfil</button>
                    </div>
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
    $('.solo_direccion').on('input', function () { 
      this.value = this.value.replace(/[^0-9a-zA-ZáéíóúüñÁÉÍÓÚÜÑ.# ]/g,'');
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

    function validar_correo(){
            correo = $('#correo').val();
            emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        //Se muestra un texto a modo de ejemplo, luego va a ser un icono
        if (!emailRegex.test(correo)) {
          $('#correo').val('');   
        } 
      }
  </script>
</body>

</html>