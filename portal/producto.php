<?php 

if (!$_COOKIE['MIRKODONI_CLIENTE_ID']) {
    header('Location: login.php');
}

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
    CURLOPT_URL => 'http://polvazo.informaticapp.com/producto',
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
$producto = json_decode($response, true);

if (!($_GET['id_empresa'])) {
    header('Location: lista_empresa.php');
}
if (!($_GET['nombre_empresa'])) {
    header('Location: lista_empresa.php');
}
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $_GET['nombre_empresa']; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="../librerias/imagen/iconos/logo_polvazo_4.png">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <?php include '../includes/css_portada.php'; ?>
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
                                <h2 class="bradcaump-title">Productos</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php?id_empresa=<?php echo $_GET['id_empresa']; ?>&&nombre_empresa=<?php echo $_GET['nombre_empresa']; ?>">Inicio</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Productos</span>
                              </nav>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- End Bradcaump area --> 
      <!-- Start Our Product Area -->
      <section class="htc__product__area shop__page ptb--130 bg__white">
        <div class="container">
            <div class="htc__product__container">
                <!-- Start Product MEnu -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="filter__menu__container">
                            <div class="product__menu">
                                <button data-filter="*"  class="is-checked">Todos</button>
                                <?php 
                                if ($categoria['Status']=='200') { 
                                foreach ($categoria["Detalles"] as $key => $value) { if ($_GET['id_empresa']==$value['id_empresa']) {
                                ?>
                                <button data-filter=".cat--<?php echo $value['id_categoria']; ?>"><?php echo $value['categoria']; ?></button>
                                <?php 
                            }
                        }
                    }
                    ?>
                </div>
                <div class="filter__box">

                </div>
            </div>
        </div>
    </div>
    <!-- Start Filter Menu -->

    <!-- End Filter Menu -->
    <!-- End Product MEnu -->
    <div class="row">
        <div class="product__list another-product-style">
            <!-- Start Single Product -->
             <?php   if ($producto['Status']=='200') { 
                                 foreach ($producto["Detalles1"] as $key => $valuep) { if ($_GET['id_empresa']==$valuep['id_empresa']) {   ?>


            <div class="col-md-3 single__pro col-lg-3 cat--<?php echo $valuep['id_categoria']; ?> col-sm-4 col-xs-12">
                <div class="product foo">
                    <div class="product__inner">
                        <div class="pro__thumb">
                            <a href="#">
                                <img style="width: 270px;height: 270px;" src="<?php echo '../librerias/imagen/'.$valuep['imagen']; ?>" alt="product images">
                            </a>
                        </div>
                        <div class="product__hover__info">
                            <ul class="product__action">
                                 
                                <li><a title="Add TO Cart" href="agregar_item_carro.php?id=<?php echo $valuep['idProducto']; ?>&&precio=<?php echo $valuep['precio']; ?>&&id_empresa=<?php echo $_GET['id_empresa']; ?>&&nombre_empresa=<?php echo $_GET['nombre_empresa']; ?>" ><span class="ti-shopping-cart"></span></a></li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="product__details">
                        <h2><a href="agregar_item_carro.php?id=<?php echo $valuep['idProducto']; ?>&&precio=<?php echo $valuep['precio']; ?>&&id_empresa=<?php echo $_GET['id_empresa']; ?>&&nombre_empresa=<?php echo $_GET['nombre_empresa']; ?>"><?php echo $valuep['descripcion']; ?></a></h2>
                        <ul class="product__price">
                            <li class="new__price"><?php echo 'S/ '.$valuep['precio']; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
             <?php    } } } ?>
            <!-- End Single Product -->
            
        </div>
    </div>
    <!-- Start Load More BTn -->
    
    <!-- End Load More BTn -->
</div>
</div>
</section>
<!-- End Our Product Area -->
<!-- Start Footer Area -->
 <?php include 'footer.php'; ?>
<!-- End Footer Area -->
</div>
<!-- Body main wrapper end -->
<!-- QUICKVIEW PRODUCT -->
 
<!-- END QUICKVIEW PRODUCT -->
<!-- Placed js at the end of the document so the pages load faster -->

<!-- jquery latest version -->
<?php include '../includes/js_portada.php'; ?>

</body>

</html>