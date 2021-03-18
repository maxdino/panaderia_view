        <?php
        include '../permisos.php';//modulos del navbar lateral

        $data = array('titulo_descripcion' => 'Ventas', );
        if($_COOKIE['imagen']==""){
          $ver="icono_perfil.png";
        }else{
          $ver=$_COOKIE['imagen'];
        }
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://polvazo.informaticapp.com/ventas',
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
        $ventas = json_decode($response, true);
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://polvazo.informaticapp.com/empresa/'.$_COOKIE['id_empresa'],
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
        $empresa = json_decode($response,true);
        include '../validar_session.php';
        ?>
        <?php include '../header.php'; ?>
        <link href="http://localhost/Panaderia_view/librerias/assets/style.min.css" rel="stylesheet">
        <?php include '../navbar.php'; ?>
        <div class="page-wrapper">

          <div class="container-fluid"  id="cuerpo_pagina_vista">

            <div class="row page-titles">
              <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor"><?php if(isset($data["titulo_descripcion"])){echo $data["titulo_descripcion"];}else{echo "Panel de Control";} ?> </h3>   
              </div>
              <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="javascript:void(0)">Principal</a></li>
                  <li class="breadcrumb-item">Pagina</li>
                  <li class="breadcrumb-item active"><?php if(isset($data["titulo_descripcion"])){echo $data["titulo_descripcion"];}else{echo "Panel de Control";} ?> </li>
                </ol>
              </div>
            </div>
            <!-- Contenido (cuerpo) -->
            <div class="row" >
              <div class="col-12">
                <div class="card">
                  <div class="card-body"  > 
                    <div class="form-body">
                      <div class="row p-t-0">
                        <div class="col-md-1 mb-3">
                          <label class=" " for="precio">Tiempo (min): </label>
                        </div>
                        <?php
                        if ($empresa['Detalles']['tiempo']=='') {
                           $tiempo =10;
                         } else{
                          $tiempo =$empresa['Detalles']['tiempo'];
                         }
                        ?>
                        <div class="col-md-2 mb-3">
                          <input type="text" class="form-control solo_numero" maxlength="2" onchange="valida_tiempo()" name="tiempo" id="tiempo" value="<?php echo $tiempo; ?>">
                          <input type="hidden"  id="empresa" value="<?php echo $_COOKIE['id_empresa']; ?>">
                        </div>
                        <div class="col-md-1 mb-3">
                          <label for="precio">Deliveri: </label>
                        </div>
                        <div class="col-md-6 mb-3">
                         <select class="select2 " onchange="validar_deliveri()" id="deliveri" style="width: 200px;">
                          <option value="1">Activo</option>
                          <option value="0">Inactivo</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row" id="div_detalle"  style="display: none;">
            <div class="col-12">
              <div class="card">
                <div class="card-body" id="cuerpo_pagina"> 
                  <div class="row">
                   <div class="col-md-12">
                    <div class="table-responsive">
                     <table class="table display product-overview mb-30" id="tbl_detalle_venta">
                      <thead>
                       <tr>
                        <th >NOMBRE:</th>
                        <th id="cliente_venta" style="text-align: left;"  ></th>
                        <th  ></th>
                        <th width="15%">TELEFONO:</th>
                        <th id="telefono_venta" width="10%"></th>
                      </tr>
                      <tr>
                        <th width="10%"  >DIRECCIÓN:</th>
                        <th  id="direccion_venta" colspan="2"></th>
                        <th width="30%">EMAIL:</th>
                        <th id="email_venta" width="35%"  ></th>
                      </tr>
                      <tr>


                      </tr>
                      <tr>
                        <th width="10%">#</th>
                        <th width="45%">Producto</th>
                        <th width="15%">Cantidad</th>
                        <th width="15%">Precio</th>
                        <th width="15%">Importe</th>
                      </tr>
                    </thead>
                    <tbody id="detalle_venta">

                    </tbody>
                  </table>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row" >
      <div class="col-12">
        <div class="card">
          <div class="card-body" id="cuerpo_pagina"> 
            <div class="row">
             <div class="col-md-12">
              <div class="table-responsive">
               <table class="table display product-overview mb-30" id="myTable">
                <thead>
                  <tr>
                    <th width="10%">#</th>
                    <th width="35%">Cliente</th>
                    <th width="15%">Fecha y Hora</th>
                    <th width="15%">Monto (S/)</th>
                    <th width="10%">Acciones</th>
                  </tr>
                </thead>
                <tbody id="cuerpo_tabla">
                 <?php if ($ventas['Status']=='200') { 
                  $c=1; foreach ($ventas["Detalles"] as $key => $value) { if ($_COOKIE['id_empresa']==$value['id_empresa']) { 
                    echo "<tr>";
                    echo "<td>".$value["idVenta"]."</td>";
                    echo "<td>".$value["nombres"]." ".$value["apellido1"]." ".$value["apellido2"]."</td>";
                    echo "<td>".$value["fecha"]." ".$value["hora"]."</td>";
                    echo "<td>".$value["monto"]."</td>";
                    ?>
                    <td><a onclick="ver_venta(<?php echo (int)($value["idVenta"]); ?>)" class="text-inverse" title="Ver" data-toggle="tooltip"><i class=" ti-eye txt-danger"></i></a> </td>
                    <?php echo "</tr>";
                    $c++;
                  }  }  } ?>
                </tbody>
              </table>
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
 $('#myTable').DataTable({"order": [[ 0, 'desc' ]]});
 $('#deliveri').select2();
 $('.solo_numero').on('input', function () { 
  this.value = this.value.replace(/[^0-9]/g,'');
});
 function valida_tiempo(){
  tiempo =$('#tiempo').val();
  if(tiempo==''||tiempo<10){
    $('#tiempo').val(10);
  }
  validar_deliveri();
}

function validar_deliveri(){
  tiempo =$('#tiempo').val();
  deliveri  =$('#deliveri').val();
  empresa  =$('#empresa').val();
  $.post('deliveri_empresa.php',{'tiempo':tiempo,'deliveri':deliveri,'empresa':empresa},function(data){

  });
}

function ver_venta(id){
  $('#tbl_detalle_venta tbody').empty();
  $.post('detalle_venta.php',{'id':id},function(data){
    obj = JSON.parse(data);
    $('#cliente_venta').html(obj['Detalles'][0]['nombres']+' '+obj['Detalles'][0]['apellido1']+' '+obj['Detalles'][0]['apellido2']); 
    $('#direccion_venta').html(obj['Detalles'][0]['direccion']); 
    $('#telefono_venta').html(obj['Detalles'][0]['telefono']); 
    $('#email_venta').html(obj['Detalles'][0]['email']); 
    for (var i = 0; i < obj['detalle_ventas'].length; i++) {
      $('#tbl_detalle_venta').append('<tr><td>'+parseFloat(parseFloat(i)+parseFloat(1))+'</td><td  >'+obj['detalle_ventas'][i]['descripcion']+'</td><td>'+obj['detalle_ventas'][i]['cantidad']+'</td><td> S/ '+obj['detalle_ventas'][i]['precio']+'</td><td> S/ '+parseFloat(obj['detalle_ventas'][i]['precio']*obj['detalle_ventas'][i]['cantidad']).toFixed(2)+'</td></tr>');
    }
    $('#tbl_detalle_venta').append('<tr><th colspan="4"></th><th> S/ '+parseFloat(obj['Detalles'][0]['monto']).toFixed(2)+'</th></tr>');
  })
  $("#div_detalle").fadeIn();
  setTimeout(function() {
    $("#div_detalle").fadeOut(1500);
  },20000);
}
</script>
</body>

</html>