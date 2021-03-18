        <footer class="htc__foooter__area gray-bg">
            <div class="container">
                <div class="row">
                    <div class="footer__container clearfix">
                       <!-- Start Single Footer Widget -->
                       <div class="col-md-3 col-lg-3 col-sm-6">
                        <div class="ft__widget">
                            <div class="ft__logo">
                                <a href="index.html">
                                    <img src="../librerias/imagen/<?php echo $empresa['Detalles']['imagen'] ?>" alt="footer logo">
                                </a>
                            </div>
                            <div class="footer-address">
                                <ul>
                                    <li>
                                        <div class="address-icon">
                                            <i class="zmdi zmdi-pin"></i>
                                        </div>
                                        <div class="address-text">
                                            <p><?php echo $empresa['Detalles']['direccion'] ?> </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="address-icon">
                                            <i class="zmdi zmdi-email"></i>
                                        </div>
                                        <div class="address-text">
                                            <a href="#"><?php echo $empresa['Detalles']['email'] ?></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="address-icon">
                                            <i class="zmdi zmdi-phone-in-talk"></i>
                                        </div>
                                        <div class="address-text">
                                            <p><?php echo '+51 '.$empresa['Detalles']['telefono'] ?></p>
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
                            <h2 class="ft__title">Categoria</h2>
                            <ul class="footer-categories">
                               <?php 
                               if ($categoria['Status']=='200') { 
                                   foreach ($categoria["Detalles"] as $key => $value) { if ($_GET['id_empresa']==$value['id_empresa']) {
                                     ?>
                                     <li><a href="#"><?php echo $value['categoria']; ?></a></li>
                                     <?php 
                                 }
                             }
                         }
                         ?>
                     </ul>
                 </div>
             </div>
             <!-- Start Single Footer Widget -->

            <!-- End Single Footer Widget -->
        </div>
    </div>
    <!-- Start Copyright Area -->
    <div class="htc__copyright__area">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="copyright__inner">
                    <div class="copyright">
                        <p>© <?php  echo date('Y') ?><a > <?php echo $empresa['Detalles']['descripcion']; ?></a>
                        Todos los derechos reservados.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Copyright Area -->
</div>
</footer>