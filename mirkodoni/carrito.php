<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://polvazo.informaticapp.com/detalle_carrito/'.$_COOKIE['MIRKODONI_ID'],
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
$carrito_cliente = json_decode($response, true);

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tmart-Minimalist eCommerce HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <?php include '../includes/css_portada.php'; ?>
    <script src="https://checkout.culqi.com/js/v3"></script>
    <style type="text/css">
      
       .button {
          background-color: #000;
          border: none;
          color: white;
          padding: 15px 32px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 4px 2px;
          cursor: pointer;
      }

    </style>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">
        <!-- Start Header Style -->
        <header id="header" class="htc-header header--3 bg__white">
            <!-- Start Mainmenu Area -->
            <?php include 'navbar.php'; ?>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Style -->
        
        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="#" method="get">
                                    <input placeholder="Search here... " type="text">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
            <!-- Start Offset MEnu -->
            <div class="offsetmenu">
                <div class="offsetmenu__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <div class="off__contact">
                        <div class="logo">
                            <a href="index.html">
                                <img src="images/logo/logo.png" alt="logo">
                            </a>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetu adipisicing elit sed do eiusmod tempor incididunt ut labore.</p>
                    </div>
                    <ul class="sidebar__thumd">
                        <li><a href="#"><img src="images/sidebar-img/1.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="images/sidebar-img/2.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="images/sidebar-img/3.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="images/sidebar-img/4.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="images/sidebar-img/5.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="images/sidebar-img/6.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="images/sidebar-img/7.jpg" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="images/sidebar-img/8.jpg" alt="sidebar images"></a></li>
                    </ul>
                    <div class="offset__widget">
                        <div class="offset__single">
                            <h4 class="offset__title">Language</h4>
                            <ul>
                                <li><a href="#"> Engish </a></li>
                                <li><a href="#"> French </a></li>
                                <li><a href="#"> German </a></li>
                            </ul>
                        </div>
                        <div class="offset__single">
                            <h4 class="offset__title">Currencies</h4>
                            <ul>
                                <li><a href="#"> USD : Dollar </a></li>
                                <li><a href="#"> EUR : Euro </a></li>
                                <li><a href="#"> POU : Pound </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="offset__sosial__share">
                        <h4 class="offset__title">Follow Us On Social</h4>
                        <ul class="off__soaial__link">
                            <li><a class="bg--twitter" href="#"  title="Twitter"><i class="zmdi zmdi-twitter"></i></a></li>
                            
                            <li><a class="bg--instagram" href="#" title="Instagram"><i class="zmdi zmdi-instagram"></i></a></li>

                            <li><a class="bg--facebook" href="#" title="Facebook"><i class="zmdi zmdi-facebook"></i></a></li>

                            <li><a class="bg--googleplus" href="#" title="Google Plus"><i class="zmdi zmdi-google-plus"></i></a></li>

                            <li><a class="bg--google" href="#" title="Google"><i class="zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Offset MEnu -->
            <!-- Start Cart Panel -->
            <?php include 'cart.php' ?>
            <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(../librerias/assets1/images/bg/2.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Carrito</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Inicio</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Carrito</span>
                              </nav>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- End Bradcaump area -->
      <!-- cart-main-area start -->
      <form>
        <div class="cart-main-area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Imagen</th>
                                            <th class="product-name">Producto</th>
                                            <th class="product-price">Precio</th>
                                            <th class="product-quantity">Cantidad</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $suma=0; if ($carrito_cliente['Status']=='200') {  foreach ($carrito_cliente['Detalles'] as $key => $value) { ?>
                                            <tr>
                                               <td class="product-thumbnail"><input type="hidden" name="producto[]" value="<?php echo $value['idProducto'] ?>"><input type="hidden" id="ucantidad<?php echo (int)($value['idProducto']) ?>" value="<?php echo $value['ucantidad'] ?>"><input type="hidden" name="precio[]" value="<?php echo $value['precio'] ?>" id="precio<?php echo (int)($value['idProducto']) ?>"><input type="hidden"  name="cantidad[]" value="<?php echo $value['cantidad'] ?>" id="cantidad<?php echo (int)($value['idProducto']) ?>" /> <input type="hidden" name="cantidad_maxima" id="cantidad_maxima<?php echo (int)($value['idProducto']) ?>" value="<?php echo $value['cantidad_maxima'] ?>"><input type="hidden" name="importe[]" id="importe_carrito<?php echo (int)($value['idProducto']) ?>" value="<?php echo $value["precio"]* $value['cantidad'] ?>"><a href="#"><img src="<?php echo '../librerias/imagen/'.$value['imagen']; ?>" alt="product img" /></a></td>
                                               <td class="product-name"><a href="#"><?php echo $value['descripcion'] ?></a></td>
                                               <td class="product-price"><span class="amount"><?php echo $value['precio'] ?></span></td>
                                               <td class="product-quantity"><input min="1" max="50" maxlength="2" type="text" class="solo_numero" onchange="validar_maxima_cantidad(<?php echo (int)($value['idProducto']); ?>)"  value="<?php echo $value['cantidad'] ?>" id="cantidad_producto<?php echo (int)($value['idProducto']) ?>" /></td>
                                               <td class="product-subtotal importe<?php echo (int)($value['idProducto']) ?>"><?php echo 'S/ '.number_format($value["precio"]* $value['cantidad'] , 2, '.', '') ?></td>
                                               <td class="product-remove"><a href="eliminar_item_carro.php?id=<?php echo $value['idProducto'] ?>">X</a></td>
                                           </tr>
                                           <?php $suma=$suma+($value["precio"]*$value['cantidad']);  } }    ?>
                                           <input type="hidden" name="monto" id="monto" value="<?php echo $suma ?>">
                                       </tbody>
                                   </table>
                               </div>
                               <div class="row">
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                    <div class="buttons-cart">

                                        <a href="producto.php">Continuar Comprando</a>
                                    </div>

                                </div>
                                <div class="col-md-4 col-sm-5 col-xs-12">
                                    <div class="cart_totals">
                                        <h2>Total Carrito</h2>
                                        <table>
                                            <tbody>
                                                <tr class="cart-subtotal">
                                                    <th>Subtotal</th>
                                                    <td><span class="amount monto_nuevo"><?php echo 'S/ '.number_format($suma , 2, '.', ''); ?></span></td>
                                                </tr>

                                                <tr class="order-total">
                                                    <th>Total</th>
                                                    <td>
                                                        <strong><span class="amount monto_nuevo"><?php echo 'S/ '.number_format($suma , 2, '.', ''); ?></span></strong>
                                                    </td>
                                                </tr>                                           
                                            </tbody>
                                        </table>
                                        <div class="wc-proceed-to-checkout">
                                            <input type="button"  class="button" id="buyButton" value="Confirmar lista del carrito" >  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- cart-main-area end -->
    <!-- Start Footer Area -->
    <?php include 'footer.php'; ?>
    <!-- End Footer Area -->
</div>
<!-- Body main wrapper end -->
<!-- Placed js at the end of the document so the pages load faster -->

<!-- jquery latest version -->
<?php include '../includes/js_portada.php'; ?>
<script type="text/javascript">
   function validar_maxima_cantidad(id){
    cantidad = $('#cantidad_producto'+id).val();
    maxima =$('#cantidad_maxima'+id).val();
    ucantidad = $('#ucantidad'+id).val();
    importe =$('#importe_carrito'+id).val();
    monto =$('#monto').val();
    precio =$('#precio'+id).val();
    nmaxima=Math.floor(parseInt(maxima)/parseInt(ucantidad));
    if (nmaxima<parseInt(cantidad)) {
     $('#cantidad_producto'+id).val(nmaxima);
     cantidad=nmaxima;
     $('#cantidad'+id).val(nmaxima); 
 }else{
    $('#cantidad'+id).val(cantidad); 
}
monto = parseFloat(monto)-parseFloat(importe);
importe = parseFloat(cantidad)*parseFloat(precio);
$('#importe_carrito'+id).val(importe);
$('#importe_carrito'+id).val(importe);
monto_nuevo =  monto+importe;
$('#monto').val((monto_nuevo).toFixed(2));
$('.importe'+id).html('S/ '+(importe).toFixed(2));
$('.monto_nuevo').html('S/ '+(monto_nuevo).toFixed(2));

$.post('actualizar_item_carro.php',{'id':id,'cantidad':cantidad},function(){

})

}
$('.solo_numero').on('input', function () { 
  this.value = this.value.replace(/[^0-9]/g,'');
});
</script>
<script>
    // Configura tu llave pública
    Culqi.publicKey = 'pk_test_d05dec225486d6e9';
    // Configura tu Culqi Checkout


    // Usa la funcion Culqi.open() en el evento que desees
    $('#buyButton').on('click', function(e) {
        // Abre el formulario con las opciones de Culqi.settings
        monto = $('#monto').val();
        Culqi.settings({
            title: 'MIRKODONI',
            currency: 'PEN',
            description: 'Producto',
            amount: monto*100
        });
        Culqi.open();
        e.preventDefault();

    });

    function culqi() {
        monto = ($('#monto').val()*100);
  if (Culqi.token) { // ¡Objeto Token creado exitosamente!
      var token = Culqi.token.id;
      var email = Culqi.token.email;
      var data = {monto:monto,token:token,email:email};
      var url = "proceso.php";
      $.post(url,data,function(res){
         window.location.href = "carrito.php";
       
      })
      //En esta linea de codigo debemos enviar el "Culqi.token.id"
      //hacia tu servidor con Ajax
  } else { // ¡Hubo algún problema!
      // Mostramos JSON de objeto error en consola
      console.log(Culqi.error);
      alert(Culqi.error.user_message);
  }
};
</script>

</body>

</html>