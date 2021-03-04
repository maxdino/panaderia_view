            <?php 
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => 'http://localhost/panaderia/index.php/empresa/1',
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
            $empresa = json_decode($response,true);
            ?>
            <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                            <div class="logo">
                                <a href="index.php">
                                    <img src="../librerias/imagen/<?php echo $empresa['Detalles']['imagen'] ?>" alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                            <nav class="mainmenu__nav hidden-xs hidden-sm">
                                <ul class="main__menu">
                                    <li class="drop"><a href="index.php">Inicio</a></li>
                                    <li class="drop"><a href="producto.php">Productos</a></li>
                                    <li><a href="carrito.php">Carrito</a></li>

                                </ul>
                            </nav>
                            <div class="mobile-menu clearfix visible-xs visible-sm">
                                <nav id="mobile_dropdown">
                                    <ul>
                                        <li><a href="index.php">Inicio</a></li>
                                        <li><a href="producto.php">Productos</a></li>
                                        <li><a href="carrito.php">Carrito</a></li>
                                    </ul>
                                </nav>
                            </div>                          
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-3">  
                            <ul class="menu-extra">
                                <li class="search search__open hidden-xs"><span class="ti-search"></span></li>
                                <?php if(!isset($_COOKIE['MIRKODONI_EMAIL'])){ ?>
                                    <li><a href="login.php"><span class="ti-user"></span></a></li>
                                <?php }else {   ?>
                                    <li><a href="login.php"><?php echo $_COOKIE['MIRKODONI_CLIENTE_ID']; ?> </a></li>
                                    <li><a href="../logeut.php"><span class="ti-power-off"></span></a></li>    
                                <?php   } ?>
                                <li class="cart__menu"><span class="ti-shopping-cart"></span></li>
                                <li class="toggle__menu hidden-xs hidden-sm"><span class="ti-menu"></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>