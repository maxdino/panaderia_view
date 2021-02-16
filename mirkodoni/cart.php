<?php
if (isset($_COOKIE['MIRKODONI_ID'])) {
  
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost/panaderia/index.php/detalle_carrito/'.$_COOKIE['MIRKODONI_ID'],
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
$carrito_clientes = json_decode($response, true);
}
?> 
<div class="shopping__cart">
    <div class="shopping__cart__inner">
        <div class="offsetmenu__close__btn">
            <a href="#"><i class="zmdi zmdi-close"></i></a>
        </div>
        <div class="shp__cart__wrap" id="modal_cart">
            <?php $suma=0; if (isset($_COOKIE['MIRKODONI_ID'])) {  if ($carrito_cliente['Status']=='200') {  foreach ($carrito_clientes['Detalles'] as $key => $value) {  ?>

                <div class="shp__single__product" id="fil'+elem['Detalles']['idProducto']+'"> 
                    <div class="shp__pro__thumb"> <img src="<?php echo '../librerias/imagen/'.$value['imagen']; ?>" style="width: 60px;height: 60px;" alt="product images"> </div> 
                    <div class="shp__pro__details">
                        <h2><a ><?php echo $value['descripcion']; ?></a></h2>
                        <span class="quantity"><?php echo 'CANTIDAD: '.$value['cantidad']; ?></span> 
                        <span class="shp__price"><?php echo 'S/ '.$value['precio']; ?></span> 
                    </div> 
                    <div class="remove__btn"> <a href="eliminar_item_carro.php?id=<?php echo $value['idProducto'] ?>" title="Remove this item"><i class="zmdi zmdi-close"></i></a> </div>
                </div>
                <?php $suma=$suma+($value["precio"]*$value['cantidad']); } } }  ?>
            </div>
            <ul class="shoping__total">
                <li class="subtotal">Subtotal:</li>
                <input type="hidden" id="modal_input_subtotal" name="modal_input_subtotal" value="0.00">
                <li class="total__price" id="modal_subtotal"><?php if($suma==0){ echo '0.00'; }else{ echo 'S/ '.number_format( $suma , 2, '.', ''); } ?></li>
            </ul>
            <ul class="shopping__btn">
                        <li><a href="carrito.php">Ver Carrito</a></li>
 
                    </ul>
        </div>
    </div>
    <script type="text/javascript">
        function agregar_item_carrito(id ){
            $.post( "traer_datos_item.php", {'id':id},function( data ) {
        /*    elem = JSON.parse(data);
 
$('#modal_cart').append('<div class="shp__single__product" id="fil'+elem['Detalles']['idProducto']+'"> <div class="shp__pro__thumb"> </div> <div class="shp__pro__details"> <h2><a >'+elem['Detalles']['descripcion']+'</a></h2> <span class="quantity">'+elem['Detalles']['cantidad']+'</span> <span class="shp__price">S/ '+elem['Detalles']['precio']+'</span> </div> <div class="remove__btn"> <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a> </div> </div>');
    subtotal_modal = $('#modal_input_subtotal').val();
    
    nuevo_subtotal_modal = parseFloat(subtotal_modal)+parseFloat(elem['Detalles']['precio']*1);
    $('#modal_input_subtotal').val(nuevo_subtotal_modal);
    $('#modal_subtotal').html(parseFloat(nuevo_subtotal_modal).toFixed(2));*/
});

        }
    </script>