<?php 

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://localhost/panaderia/index.php/categoria',
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
$producto = json_decode($response, true);

?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PANADERIA Y PASTELERIA</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
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
            <!-- Start MAinmenu Ares -->
            <?php include 'navbar.php'; ?>
            <!-- End MAinmenu Ares -->
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
        <!-- Start Feature Product -->
        <section class="categories-slider-area bg__white">
            <div class="container">
                <div class="row">
                    <!-- Start Left Feature -->
                    <div class="col-md-9 col-lg-9 col-sm-8 col-xs-12 float-left-style">
                        <!-- Start Slider Area -->
                        <div class="slider__container slider--one">
                            <div class="slider__activation__wrap owl-carousel owl-theme">
                                <!-- Start Single Slide -->
                               <?php $c=0; if ($producto['Status']=='200') { 
                                 foreach ($producto["Detalles1"] as $key => $valuep) { if (1==$valuep['id_empresa']) { if ($c<10) { ?>
                                <div class="slide slider__full--screen slider-height-inherit slider-text-right" style="width: 870px;height: 542.8px; background: rgba(0, 0, 0, 0) url(<?php echo '../librerias/imagen/'.$valuep['imagen']; ?>) no-repeat scroll center center / cover ;">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-10 col-lg-8 col-md-offset-2 col-lg-offset-4 col-sm-12 col-xs-12">
                                                <div class="slider__inner">
                                                    <h1 style="color: white; text-shadow: black 0.1em 0.1em 0.2em;font-size: 50px;"><?php echo $valuep['descripcion']; ?><span class="text--theme"></span></h1>
                                                     <?php if(isset($_COOKIE['MIRKODONI_EMAIL'])){ ?>
                                                    <div class="slider__btn">
                                                        <a class="htc_btn" href="cart.html" style="color: white; text-shadow: black 0.1em 0.1em 0.2em; ">Compra ahora</a>
                                                    </div>
                                                <?php }  ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <?php $c++; } } } } ?>
                                <!-- End Single Slide -->
                            </div>
                        </div>
                        <!-- Start Slider Area -->
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12 float-right-style">
                        <div class="categories-menu mrg-xs">
                            <div class="category-heading">
                               <h3> Categoria</h3>
                           </div>
                           <div class="category-menu-list">
                            <ul>
                               <?php 
                               if ($categoria['Status']=='200') { 
                                 foreach ($categoria["Detalles"] as $key => $value) { if (1==$value['id_empresa']) {
                                   ?>
                                   <li><a href="#<?php echo $value['id_categoria']; ?>"><img alt="" src="../librerias/assets1/images/icons/thum7.png"><?php echo $value['categoria']; ?></a></li>
                                   <?php 
                               }
                           }
                       }
                       ?>
                   </ul>
               </div>
           </div>
       </div>
       <!-- End Left Feature -->
   </div>
</div>
</section>
<?php  if ($categoria['Status']=='200') { 
 foreach ($categoria["Detalles"] as $key => $value) { if (1==$value['id_empresa']) {  ?>
    <!-- End Feature Product -->
    <div class="only-banner ptb--100 bg__white"  id="<?php echo $value['id_categoria']; ?>">
        <div class="container">
            <div class="only-banner-img img_div_categoria" style="width: 1170px ; height: 300px;background-position: 10% 30%; background-size: cover; background-image:url(<?php echo '../librerias/imagen/'.$value['imagen']; ?>)" >
            </div>
        </div>
    </div>
    <!-- Start Our Product Area -->
    <section class="htc__product__area bg__white">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="product-categories-all">
                        <div class="product-categories-title">
                            <h3><?php echo $value['categoria']; ?></h3>
                        </div>
                        <div class="product-categories-menu">
                            <ul>
                             <?php  if ($producto['Status']=='200') { 
                                 foreach ($producto["Detalles1"] as $key => $valuep) { if (1==$valuep['id_empresa']) { if($value['id_categoria']==$valuep['id_categoria']){ ?>
                                    <li><a href="<?php echo $valuep['idProducto']; ?>"><?php echo $valuep['descripcion']; ?></a></li>
                                <?php } } } } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="product-style-tab">
                        <div class="product-tab-list">
                            <!-- Nav tabs -->
                            <ul class="tab-style" role="tablist">
                                <li class="active">
                                    <a href="#home1<?php echo $value['id_categoria']; ?>" data-toggle="tab">
                                        <div class="tab-menu-text">
                                            <h4>Todos </h4>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#home2<?php echo $value['id_categoria']; ?>" data-toggle="tab">
                                        <div class="tab-menu-text">
                                            <h4>Nuevos </h4>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#home3<?php echo $value['id_categoria']; ?>" data-toggle="tab">
                                        <div class="tab-menu-text">
                                            <h4>Mas vendidos</h4>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content another-product-style jump">
                            <div class="tab-pane active" id="home1<?php echo $value['id_categoria']; ?>">
                                <div class="row">
                                    <div class="product-slider-active owl-carousel">
                                         <?php  if ($producto['Status']=='200') { 
                                          foreach ($producto['Detalles'] as $key => $valuep1) { if (1==$valuep1['id_empresa']) { if($value['id_categoria']==$valuep1['id_categoria']){ ?>
                                        <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                            <div class="product">
                                                <div class="product__inner">
                                                    <div class="pro__thumb">
                                                         <?php if (isset($_COOKIE['MIRKODONI_EMAIL'])) {  ?>
                                                        <a href="#">
                                                            <?php }  ?>
                                                            <img style="width: 270px;height: 270px;" src="<?php echo '../librerias/imagen/'.$valuep1['imagen']; ?>" alt="product images">
                                                             <?php if (isset($_COOKIE['MIRKODONI_EMAIL'])) {  ?>
                                                        </a>
                                                        <?php }  ?>
                                                    </div>
                                                    <?php if (isset($_COOKIE['MIRKODONI_EMAIL'])) {  ?>
                                                    <div class="product__hover__info">
                                                        <ul class="product__action">
                                                            <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                            <li><a title="Add TO Cart" href="cart.html"><span class="ti-shopping-cart"></span></a></li>
                                                            <li><a title="Wishlist" href="wishlist.html"><span class="ti-heart"></span></a></li>
                                                        </ul>
                                                    </div>
                                                <?php }  ?>
                                                </div>
                                                <div class="product__details">
                                                    <h2><a href="product-details.html"><?php echo $valuep1['descripcion']; ?></a></h2>
                                                    <ul class="product__price">
                                                        <li class="new__price"><?php echo 'S/ '.$valuep1['precio']; ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                           <?php }  } } } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="home2<?php echo $value['id_categoria']; ?>">
                                <div class="row">
                                    <div class="product-slider-active owl-carousel">
                                          <?php  if ($producto['Status']=='200') { 
                                          foreach ($producto['Detalles2'] as $key => $valuep2) { if (1==$valuep2['id_empresa']) { if($value['id_categoria']==$valuep2['id_categoria']){ ?>
                                        <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                            <div class="product">
                                                <div class="product__inner">
                                                     <div class="pro__thumb">
                                                         <?php if (isset($_COOKIE['MIRKODONI_EMAIL'])) {  ?>
                                                        <a href="#">
                                                            <?php }  ?>
                                                            <img style="width: 270px;height: 270px;" src="<?php echo '../librerias/imagen/'.$valuep2['imagen']; ?>" alt="product images">
                                                             <?php if (isset($_COOKIE['MIRKODONI_EMAIL'])) {  ?>
                                                        </a>
                                                        <?php }  ?>
                                                    </div>
                                                    <?php if (isset($_COOKIE['MIRKODONI_EMAIL'])) {  ?>
                                                    <div class="product__hover__info">
                                                        <ul class="product__action">
                                                            <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                            <li><a title="Add TO Cart" href="cart.html"><span class="ti-shopping-cart"></span></a></li>
                                                            <li><a title="Wishlist" href="wishlist.html"><span class="ti-heart"></span></a></li>
                                                        </ul>
                                                    </div>
                                                <?php }  ?>
                                                </div>
                                                <div class="product__details">
                                                    <h2><a href="product-details.html"><?php echo $valuep2['descripcion']; ?></a></h2>
                                                    <ul class="product__price">
                                                        <li class="new__price"><?php echo 'S/ '.$valuep2['precio']; ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                         <?php }  } } } ?>
 
                                    </div>
                                </div>
                            </div>
 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }  }   } ?>
<!-- End Our Product Area -->
<!-- Start Blog Area -->
<section class="htc__blog__area bg__white pb--130">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title section__title--2 text-center">
                    <h2 class="title__line">Latest News</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod temp incididunt ut labore et dolore magna aliqua. </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="blog__wrap clearfix mt--60 xmt-30">
                <!-- Start Single Blog -->
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="blog foo">
                        <div class="blog__inner">
                            <div class="blog__thumb">
                                <a href="blog-details.html">
                                    <img src="images/blog/blog-img/1.jpg" alt="blog images">
                                </a>
                                <div class="blog__post__time">
                                    <div class="post__time--inner">
                                        <span class="date">14</span>
                                        <span class="month">sep</span>
                                    </div>
                                </div>
                            </div>
                            <div class="blog__hover__info">
                                <div class="blog__hover__action">
                                    <p class="blog__des"><a href="blog-details.html">Lorem ipsum dolor sit consectetu.</a></p>
                                    <ul class="bl__meta">
                                        <li>By :<a href="#">Admin</a></li>
                                        <li>Product</li>
                                    </ul>
                                    <div class="blog__btn">
                                        <a class="read__more__btn" href="blog-details.html">read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
                <!-- Start Single Blog -->
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="blog foo">
                        <div class="blog__inner">
                            <div class="blog__thumb">
                                <a href="blog-details.html">
                                    <img src="images/blog/blog-img/2.jpg" alt="blog images">
                                </a>
                                <div class="blog__post__time">
                                    <div class="post__time--inner">
                                        <span class="date">14</span>
                                        <span class="month">sep</span>
                                    </div>
                                </div>
                            </div>
                            <div class="blog__hover__info">
                                <div class="blog__hover__action">
                                    <p class="blog__des"><a href="blog-details.html">Lorem ipsum dolor sit consectetu.</a></p>
                                    <ul class="bl__meta">
                                        <li>By :<a href="#">Admin</a></li>
                                        <li>Product</li>
                                    </ul>
                                    <div class="blog__btn">
                                        <a class="read__more__btn" href="blog-details.html">read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
                <!-- Start Single Blog -->
                <div class="col-md-4 col-lg-4 hidden-sm col-xs-12">
                    <div class="blog foo">
                        <div class="blog__inner">
                            <div class="blog__thumb">
                                <a href="blog-details.html">
                                    <img src="images/blog/blog-img/3.jpg" alt="blog images">
                                </a>
                                <div class="blog__post__time">
                                    <div class="post__time--inner">
                                        <span class="date">14</span>
                                        <span class="month">sep</span>
                                    </div>
                                </div>
                            </div>
                            <div class="blog__hover__info">
                                <div class="blog__hover__action">
                                    <p class="blog__des"><a href="blog-details.html">Lorem ipsum dolor sit consectetu.</a></p>
                                    <ul class="bl__meta">
                                        <li>By :<a href="#">Admin</a></li>
                                        <li>Product</li>
                                    </ul>
                                    <div class="blog__btn">
                                        <a class="read__more__btn" href="blog-details.html">read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
            </div>
        </div>
    </div>
</section>
<!-- End Blog Area -->
<!-- Start Footer Area -->
<footer class="htc__foooter__area gray-bg">
    <div class="container">
        <div class="row">
            <div class="footer__container clearfix">
             <!-- Start Single Footer Widget -->
             <div class="col-md-3 col-lg-3 col-sm-6">
                <div class="ft__widget">
                    <div class="ft__logo">
                        <a href="index.html">
                            <img src="images/logo/logo.png" alt="footer logo">
                        </a>
                    </div>
                    <div class="footer-address">
                        <ul>
                            <li>
                                <div class="address-icon">
                                    <i class="zmdi zmdi-pin"></i>
                                </div>
                                <div class="address-text">
                                    <p>194 Main Rd T, FS Rayed <br> VIC 3057, USA</p>
                                </div>
                            </li>
                            <li>
                                <div class="address-icon">
                                    <i class="zmdi zmdi-email"></i>
                                </div>
                                <div class="address-text">
                                    <a href="#"> info@example.com</a>
                                </div>
                            </li>
                            <li>
                                <div class="address-icon">
                                    <i class="zmdi zmdi-phone-in-talk"></i>
                                </div>
                                <div class="address-text">
                                    <p>+012 345 678 102 </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <ul class="social__icon">
                        <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                        <li><a href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                        <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                        <li><a href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- End Single Footer Widget -->
            <!-- Start Single Footer Widget -->
            <div class="col-md-3 col-lg-2 col-sm-6 smt-30 xmt-30">
                <div class="ft__widget">
                    <h2 class="ft__title">Categories</h2>
                    <ul class="footer-categories">
                        <li><a href="shop-sidebar.html">Men</a></li>
                        <li><a href="shop-sidebar.html">Women</a></li>
                        <li><a href="shop-sidebar.html">Accessories</a></li>
                        <li><a href="shop-sidebar.html">Shoes</a></li>
                        <li><a href="shop-sidebar.html">Dress</a></li>
                        <li><a href="shop-sidebar.html">Denim</a></li>
                    </ul>
                </div>
            </div>
            <!-- Start Single Footer Widget -->
            <div class="col-md-3 col-lg-2 col-sm-6 smt-30 xmt-30">
                <div class="ft__widget">
                    <h2 class="ft__title">Infomation</h2>
                    <ul class="footer-categories">
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Returns & Exchanges</a></li>
                        <li><a href="#">Shipping & Delivery</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <!-- Start Single Footer Widget -->
            <div class="col-md-3 col-lg-3 col-lg-offset-1 col-sm-6 smt-30 xmt-30">
                <div class="ft__widget">
                    <h2 class="ft__title">Newsletter</h2>
                    <div class="newsletter__form">
                        <p>Subscribe to our newsletter and get 10% off your first purchase .</p>
                        <div class="input__box">
                            <div id="mc_embed_signup">
                                <form action="#" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                    <div id="mc_embed_signup_scroll" class="htc__news__inner">
                                        <div class="news__input">
                                            <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Email Address" required>
                                        </div>
                                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                        <div class="clearfix subscribe__btn"><input type="submit" value="Send" name="subscribe" id="mc-embedded-subscribe" class="bst__btn btn--white__color">

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>        
                    </div>
                </div>
            </div>
            <!-- End Single Footer Widget -->
        </div>
    </div>
    <!-- Start Copyright Area -->
    <div class="htc__copyright__area">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="copyright__inner">
                    <div class="copyright">
                        <p>© 2017 <a href="https://freethemescloud.com/">Free themes Cloud</a>
                        All Right Reserved.</p>
                    </div>
                    <ul class="footer__menu">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="shop.html">Product</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Copyright Area -->
</div>
</footer>
<!-- End Footer Area -->
</div>
<!-- Body main wrapper end -->
<!-- QUICKVIEW PRODUCT -->
<div id="quickview-wrapper">
    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal__container" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="modal-product">
                        <!-- Start product images -->
                        <div class="product-images">
                            <div class="main-image images">
                                <img alt="big images" src="images/product/big-img/1.jpg">
                            </div>
                        </div>
                        <!-- end product images -->
                        <div class="product-info">
                            <h1>Simple Fabric Bags</h1>
                            <div class="rating__and__review">
                                <ul class="rating">
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                </ul>
                                <div class="review">
                                    <a href="#">4 customer reviews</a>
                                </div>
                            </div>
                            <div class="price-box-3">
                                <div class="s-price-box">
                                    <span class="new-price">$17.20</span>
                                    <span class="old-price">$45.00</span>
                                </div>
                            </div>
                            <div class="quick-desc">
                                Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations creates a modern look.
                            </div>
                            <div class="select__color">
                                <h2>Select color</h2>
                                <ul class="color__list">
                                    <li class="red"><a title="Red" href="#">Red</a></li>
                                    <li class="gold"><a title="Gold" href="#">Gold</a></li>
                                    <li class="orange"><a title="Orange" href="#">Orange</a></li>
                                    <li class="orange"><a title="Orange" href="#">Orange</a></li>
                                </ul>
                            </div>
                            <div class="select__size">
                                <h2>Select size</h2>
                                <ul class="color__list">
                                    <li class="l__size"><a title="L" href="#">L</a></li>
                                    <li class="m__size"><a title="M" href="#">M</a></li>
                                    <li class="s__size"><a title="S" href="#">S</a></li>
                                    <li class="xl__size"><a title="XL" href="#">XL</a></li>
                                    <li class="xxl__size"><a title="XXL" href="#">XXL</a></li>
                                </ul>
                            </div>
                            <div class="social-sharing">
                                <div class="widget widget_socialsharing_widget">
                                    <h3 class="widget-title-modal">Share this product</h3>
                                    <ul class="social-icons">
                                        <li><a target="_blank" title="rss" href="#" class="rss social-icon"><i class="zmdi zmdi-rss"></i></a></li>
                                        <li><a target="_blank" title="Linkedin" href="#" class="linkedin social-icon"><i class="zmdi zmdi-linkedin"></i></a></li>
                                        <li><a target="_blank" title="Pinterest" href="#" class="pinterest social-icon"><i class="zmdi zmdi-pinterest"></i></a></li>
                                        <li><a target="_blank" title="Tumblr" href="#" class="tumblr social-icon"><i class="zmdi zmdi-tumblr"></i></a></li>
                                        <li><a target="_blank" title="Pinterest" href="#" class="pinterest social-icon"><i class="zmdi zmdi-pinterest"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="addtocart-btn">
                                <a href="#">Add to cart</a>
                            </div>
                        </div><!-- .product-info -->
                    </div><!-- .modal-product -->
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div>
    <!-- END Modal -->
</div>
<!-- END QUICKVIEW PRODUCT -->
<!-- Placed js at the end of the document so the pages load faster -->
<?php include '../includes/js_portada.php'; ?>


</body>

</html>