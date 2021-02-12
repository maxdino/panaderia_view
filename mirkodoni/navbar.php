                        <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="../librerias/assets1/images/logo/logo.png" alt="logo">
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