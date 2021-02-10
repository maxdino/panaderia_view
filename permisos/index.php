        <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
          $curl = curl_init();
          $mo=''; 
          for ($i=0; $i < count($_POST['permisos']) ; $i++) { 
            $mo .= '&permisos[]='.$_POST['permisos'][$i];
          }
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost/panaderia/index.php/permisos_modulo',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 
            'perfil='.$_POST["perfil"].
            $mo,

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

          $curl = curl_init();

          curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost/panaderia/index.php/perfiles/'.$_COOKIE['id_empresa'],
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

        }
        include '../permisos.php';//modulos del navbar lateral

        $data = array('titulo_descripcion' => 'Modulos', );
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
                <form id="formulario" method="post">
                  <div class="card"  >
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <h4 class="card-title"></h4>
                          <h6 class="card-subtitle"></h6>
                          <div class="skin skin-minimal"> 
                            <div class="form-row">
                              <div class="col-md-12 mb-12">
                                <center><label for="validationDefault03">MODULO PADRE</label></center>
                                <select class="select2 form-control custom-select" onchange="permisos();" name="perfil" id="perfil" style="width: 100%; height:36px;">
                                  <option></option>
                                  <?php if ($perfil['Status']=='200') {
                                    foreach ($perfil["Detalles"] as $key => $value) {
                                      echo "<option value='".$value["perfil_id"]."'>".$value["perfil_descripcion"]."</option>";
                                    } } ?>
                                  </select>
                                </div>
                              </div> 
                            </div>
                          </div> 
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-12">
                            <h4 class="card-title">Lista de Permisos</h4>
                            <h6 class="card-subtitle"></h6>
                            <div class="skin skin-square"> 
                              <div class="form-group" id="cuerpo_icono">
                  <!--<label>Checkbox &amp; Radio List</label>
                  <div class="input-group" >
                    <ul class="icheck-list">
                      <li>
                        <input type="checkbox" class="check" id="minimal-checkbox-1">
                        <label for="minimal-checkbox-1">Checkbox 1</label>
                      </li>
                      <li>
                        <input type="checkbox" class="check" id="minimal-checkbox-2" checked>
                        <label for="minimal-checkbox-2">Checkbox 2</label>
                      </li> 
                    </ul>
                  </div>-->
                </div> 
              </div>
            </div> 
          </div>
        </div>
        <br>
        <center><a ><button class="btn btn-primary ">Guardar</button></a></center><br>
      </div>
    </form>
  </div>
</div>

<?php include "../footer.php"; ?> 

<?php include "../includes/js.php"; ?>

<script type="text/javascript">
  $(function() {
    $(".select2").select2();

  });

  function permisos(){
    var id = $('#perfil').val();
    $.post("traer_modulos.php?id="+id,    function(data) {
      result =JSON.parse(data) ;
      var html = ''; 
      html+='<div class="row">';
      var idmodulos = [];
      aux = 0;
      for (var i = 0; i < (result['Detalles'].length -1); i++) {
        html+='<div class="col-md-3">';
        html+= '<label>'+result['Detalles'][i]["nombre_padre"]+'</label>';
        html+= '<div class="input-group" >';
        html+= '<ul class="icheck-list">';
        for (var j = 0; j < (result['Detalles'][i]["lista"].length); j++) { 
          for (var k = 0; k <  (result['Detalles'][(result['Detalles'].length-1)]["permisos"].length); k++) {
            if (result['Detalles'][(result['Detalles'].length-1)]["permisos"][k]["idhijo"] == result['Detalles'][i]["lista"][j]["modulo_id"]){
              idmodulos[aux] = 'flat-checkbox-'+i+j;
              aux++;
            } 
          }

          html+= '<li>'; 
          html+= '<input type="checkbox" data-checkbox="icheckbox_flat-red" name="permisos[]" id="flat-checkbox-'+i+j+'" value="'+result['Detalles'][i]["lista"][j]["modulo_id"]+'" class="check" >';
          html+= '<label for="flat-checkbox-'+i+j+'">'+result['Detalles'][i]["lista"][j]["modulo_nombre"]+'</label>';
          html+= '</li>';
        }           
        html+= '</ul>';
        html+= '</div>';
        html+= '</div>';
      }
      html+= '</div>';

      $("#cuerpo_icono").empty().append(html);
      for (var i = 0; i < (idmodulos.length ); i++) {
        document.getElementById(idmodulos[i]).setAttribute('checked', 'checked');
      }
    });   
  }


</script>
</body>

</html>