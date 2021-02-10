        <?php
        include '../permisos.php';//modulos del navbar lateral

        $data = array('titulo_descripcion' => 'Producto', );
        if($_COOKIE['imagen']==""){
          $ver="icono_perfil.png";
        }else{
          $ver=$_COOKIE['imagen'];
        }
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://localhost/panaderia/index.php/producto',
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
        $perfil = json_decode($response, true);
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
                      <a href="agregar.php"><button class="btn  btn-success" >Agregar Producto</button></a>
                    </div>
                  </div>
                  <div class="row">
                   <div class="col-md-12">
                    <div class="table-responsive">
                     <table class="table display product-overview mb-30" id="myTable">
                      <thead>
                        <tr>
                          <th width="10%">#</th>
                          <th width="30%">Producto</th>
                          <th width="10%">Cantidad</th>
                          <th width="10%">Precio</th>
                          <th width="40%">Categoria</th>
                          <th width="10%">Acciones</th>
                        </tr>
                      </thead>
                      <tbody id="cuerpo_tabla">
                       <?php if ($perfil['Status']=='200') { 
                        $c=1; foreach ($perfil["Detalles"] as $key => $value) { if ($_COOKIE['id_empresa']==$value['id_empresa']) {
                          
                          echo "<tr>";
                          echo "<td>".$c."</td>";
                          echo "<td>".$value["descripcion"]."</td>";
                          echo "<td>".$value["cantidad"]."</td>";
                          echo "<td>".$value["precio"]."</td>";
                          echo "<td>".$value["categoria"]."</td>"; ?>
                          <td><a href="eliminar.php?id=<?php echo $value['idProducto']; ?>" class="text-inverse" title="Eliminar" data-toggle="tooltip"><i class="mdi mdi-delete-empty txt-danger"></i></a> <a href="editar.php?id=<?php echo $value['idProducto']; ?>" class="text-inverse" title="Editar" data-toggle="tooltip"><i class="mdi mdi-table-edit txt-danger"></i></a></td>
                          <?php echo "</tr>";
                          $c++;
                        } }  } ?>
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
    </body>

    </html>