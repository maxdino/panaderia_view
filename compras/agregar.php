        <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
          $curl = curl_init();
          $pro='';$uni='';$cant='';$pre='';$importe=0;
          if (count($_POST['producto'])!=0) { 
          for ($i=0; $i < count($_POST['producto']) ; $i++) { 
            $pro .= '&producto[]='.$_POST['producto'][$i];
            $cant .= '&cantidad[]='.$_POST['cantidad'][$i];
            $pre .= '&precio[]='.$_POST['precio'][$i];
            $uni .= '&unidad_medida[]='.$_POST['unidad'][$i];
            $importe=$importe+($_POST['importe'][$i]);
          }
           
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://polvazo.informaticapp.com/compras',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 
            'proveedor='.$_POST['proveedor'].
            '&fecha='.date('Y-m-d').
            '&numero_correlativo='.$_POST['numero_correlativo'].
            '&monto='.$importe.
            $pro.
            $cant.
            $pre.
            $uni.
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
           header('Location:agregar.php');  
        }
        }else{
         $curl = curl_init();

         curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://polvazo.informaticapp.com/proveedor',
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
         $proveedor = json_decode($response, true);

         $curl = curl_init();

         curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://polvazo.informaticapp.com/ingredientes',
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
         $ingredientes = json_decode($response, true);

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

        $data = array('titulo_descripcion' => 'Agregar Compra' );
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
            <form method="POST" action="">
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

                             <div class="row p-t-0">
                              <div class="col-md-9">
                                <label for="proveedor">PROVEEDOR</label>
                                <?php if ($proveedor['Status']=='200') { ?>
                                  <select class="select2  " name="proveedor" id="proveedor" style="width: 100%; height:36px;">
                                    <option></option>
                                    <?php  foreach ($proveedor["Detalles"] as $key => $value) { if ($value['id_empresa']==$_COOKIE['id_empresa']) { 
                                      echo "<option value='".$value["id_proveedor"]."'>".$value["nombres"]." ".$value["apellido1"]." ".$value["apellido2"]."</option>";
                                    } } ?>
                                  </select> 
                                <?php } ?>
                              </div>
                              <div class="col-md-3">
                                <label class="control-label mb-10 text-left">NUMERO CORRELATIVO</label>
                                <input type="text" class="form-control solo_serie" required="true" name="numero_correlativo" id="numero_correlativo" autofocus="true" value="" required="">
                              </div> 
                            </div>
                            <div class="row p-t-0">
                              <div class="col-md-6">
                                <label for="ingredientes">INGREDIENTES</label>
                                <?php if ($ingredientes['Status']=='200') { ?>
                                  <select class="select2  " name="ingredientes" id="ingredientes" style="width: 100%; height:36px;">
                                    <option></option>
                                    <?php  foreach ($ingredientes["Detalles"] as $key => $value) { if ($value['id_empresa']==$_COOKIE['id_empresa']) { 
                                      echo "<option value='".$value["id_ingredientes"]."*".$value["ingredientes"]."'>".$value["ingredientes"]."</option>";
                                    } } ?>
                                  </select> 
                                <?php } ?>
                              </div>
                              <div class="col-md-3">
                                <label for="unidad_medida">UNIDAD MEDIDA</label>
                                <?php if ($unidad_medida['Status']=='200') { ?>
                                  <select class="select2  " name="unidad_medida" id="unidad_medida" style="width: 100%; height:36px;">
                                    <option></option>
                                    <?php  foreach ($unidad_medida["Detalles"] as $key => $value) { if ($value['id_empresa']==$_COOKIE['id_empresa']) { 
                                      echo "<option value='".$value["id_unidad_medida"]."*".$value["unidad_medida"]."'>".$value["unidad_medida"]."</option>";
                                    } } ?>
                                  </select> 
                                <?php } ?>
                              </div>
                              <div class="col-md-3">
                                <br>
                                <a class="btn btn-primary" onclick="agregar_producto()">Agregar</a> 
                              </div>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>  
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body" id="cuerpo_pagina"> 
                   <div class="row">
                     <div class="col-md-12">
                      <div class="table-responsive">
                       <table class="table display product-overview mb-30" id="lista">
                        <thead>
                          <tr>
                            <th width="35%">Producto</th>
                            <th width="25%">Unidad Medida</th>
                            <th width="5%">Cantidad</th>
                            <th width="5%">Precio</th>
                            <th width="15%">Importe</th>
                            <th width="10%">Acciones</th>
                          </tr>
                        </thead>
                        <tbody id="cuerpo_tabla">

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <center><a ><button class="btn btn-primary">Guardar</button></a><a href="index.php"><button class="btn btn-danger" type="button" >Cancelar</button></a></center>    
            </div>
          </div>
        </div>        
      </form> 
      <?php include "../footer.php"; ?>   
      <?php include "../includes/js.php"; ?>
      <script type="text/javascript">
        $(function() {
          $('#proveedor').select2();
          $('#ingredientes').select2();
          $('#unidad_medida').select2();
        });

        function agregar_producto(){
          var ingredientes = $('#ingredientes').val(); 
          var unidad = $('#unidad_medida').val(); 
          if (ingredientes!=''&&unidad!='') {
            var elem = ingredientes.split("*");
            var elem1 = unidad.split("*");
            if ($('#lista tr#fil'+elem[0]).find('td').eq(0).html()==null) { 
              $('#lista').append('<tr id=fil'+elem[0]+'><input type="hidden" name="producto[]" value="'+elem[0]+'" ><td>'+elem[1]+'</td><td><input type="hidden"   name="unidad[]" id="unidad'+elem[0]+'" value="'+elem1[0]+'" >'+elem1[1]+'</td><td><input type="text" maxlength="8" class="solo_numero" onkeyup="obtener_importe('+elem[0]+')" name="cantidad[]" required id="cantidad'+elem[0]+'" maxlength="8" value="1" ></td><td><input type="text" class="solo_precio" required onkeyup="obtener_importe('+elem[0]+')" onchange="modelo_precio('+elem[0]+')" name="precio[]" id="precio'+elem[0]+'" value="" ></td><td><input type="text" style="border: 0;" reandoly="reandoly" name="importe[]"  id="importe'+elem[0]+'" value="" ></td><td><center><a onclick="eliminar('+elem[0]+')" class="btn btn-danger"><i class="icon-trash"></i></a></center></td></tr>');
              $('#unidad_medida').val('').trigger('change');
            }else{
              alert('El Ingrediente ya a sido seleccionado');
            }
          }
        }

        function modelo_precio(id){

          precio = parseFloat($('#precio'+id).val());
          $('#precio'+id).val(precio.toFixed(2));
        }

        function obtener_importe(id){
          precio = $('#precio'+id).val();
          cantidad = $('#cantidad'+id).val();
          if (precio!=''&&cantidad!='') {
            importe = precio * cantidad ;
            $('#importe'+id).val(importe.toFixed(2));
          }
        }

        function eliminar(id){
          $("#fil" + id ).remove();
        }

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