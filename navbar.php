
<aside class="left-sidebar">
                            <!-- Sidebar scroll-->
                            <div class="scroll-sidebar">
                                <!-- Sidebar navigation-->
                                <nav class="sidebar-nav">
                                    <ul id="sidebarnav">
                                        <li class="user-profile"> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><img class="foto_perfilupdate" src="<?php echo  $url_carpeta.'librerias/imagen/'.$_COOKIE['imagen']; ?>" alt="user" /><span class="hide-menu"><?php echo $_COOKIE['nombres'];?> </span></a>
                                            <ul aria-expanded="false" class="collapse">
                                                <li><a href=" Editarusuario">Mi perfil </a></li>
                                                <li><a href=" ../cerrar_session.php">Cerrar Sesión</a></li>
                                            </ul>
                                        </li>

                                        <li class="nav-devider"></li>
                                        <li class="nav-small-cap">PERSONAL</li>
                                        <?php $idhijo=0; foreach ($modulos['padre'] as $value) {  
                                            if(count($modulos['padre'])>0){ 
                                               ?>
                                             <li> <a id="<?php echo $value['idpadre']?>" data-target="#cuerpo_<?php echo ($value["idpadre"])?>" class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="<?php echo strtolower($value["icono"])?>"></i><span class="hide-menu"><?php echo ($value["modulo_nombre"])?> </span></a>
                                                    <ul id="cuerpo_<?php echo ($value["modulo_id"])?>" aria-expanded="false" class="collapse">
                                                        <?php foreach ($modulos['hijo'] as $val) { 
                                                        	if($value['modulo_id'] == $val['modulo_padre']){   ?>
                                                            <li><a   id="<?php echo $val['modulo_id']?>" href="<?php echo $url_carpeta.$val["modulo_url"]?>"><?php echo $val["modulo_nombre"]?></a>
                                                            </li>
                                                        <?php }  }   ?>  
                                                    </ul>
                                                </li>
                                          <?php  } } ?>
                                     </ul>
                                 </nav>

                             </div>

                         </aside>