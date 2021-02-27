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
                          <td><a href="eliminar.php?id=<?php echo $value['idVenta']; ?>" class="text-inverse" title="Ver" data-toggle="tooltip"><i class=" ti-eye txt-danger"></i></a> <a href="editar.php?id=<?php echo $value['idVenta']; ?>" class="text-inverse" title="Editar" data-toggle="tooltip"><i class="mdi mdi-table-edit txt-danger"></i></a></td>
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
   </script>
    </body>

    </html>