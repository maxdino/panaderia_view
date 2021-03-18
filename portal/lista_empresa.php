<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://polvazo.informaticapp.com/empresa',
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
$empresa = json_decode($response, true);

if (!$_COOKIE['MIRKODONI_CLIENTE_ID']) {
    header('Location: login.php');
}

?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MIRKODONI</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="../librerias/imagen/iconos/icono_mirkodoni.png">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <?php include '../includes/css_portada.php'; ?>
</head>

<body>


    <div class="wrapper fixed__footer">
        <!-- Start Header Style -->
        <header id="header" class="htc-header header--3 bg__white">
            <!-- Start Mainmenu Area -->
             
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
                                <h2 class="bradcaump-title">Lista Empresas</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item"  >BIENVENIDO </a>
                                  <span class="brd-separetor">:</span>
                                  <span class="breadcrumb-item active"><?php echo $_COOKIE['MIRKODONI_CLIENTE_ID']; ?></span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start BLog Area -->
        <div class="htc__blog__area bg__white ptb--120">
            <div class="container">
                <div class="row">
                    <div class="blog__wrap blog--page clearfix">

                        <!-- Start Single Blog -->
                        <?php foreach($empresa['Detalles'] as $value){ if($value['id_empresa']!=5){ ?>
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="blog foo">
                                <div class="blog__inner">
                                    <div class="blog__thumb">
                                        <a href="index.php?id_empresa=<?php echo $value['id_empresa']; ?>&&nombre_empresa=<?php echo $value['descripcion']; ?>">
                                            <img style="width: 370px;height: 347px; " src="../librerias/imagen/<?php echo $value['imagen'] ?>" alt="blog images">
                                        </a>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <?php } } ?>
                        <!-- End Single Blog -->
                         
                      
                    </div>
                </div>
                <!-- Start Load More BTn -->
              
                <!-- End Load More BTn -->
            </div>
        </div>
        <!-- End BLog Area -->
        <!-- Start Footer Area -->
        
        <!-- End Footer Area -->
    </div>




<?php include '../includes/js_portada.php'; ?>


</body>

</html>