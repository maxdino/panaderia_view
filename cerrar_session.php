<?php
 
  unset ($_COOKIE ["nombres"]);	
  unset ($_COOKIE ["apellido_paterno"]);
  unset ($_COOKIE ["apellido_materno"]);
  unset ($_COOKIE ["id_empresa"]);
  unset ($_COOKIE ["perfil_id"]);
  unset ($_COOKIE ["clave_admin"]);
  unset ($_COOKIE ["usuario_admin"]);
  unset ($_COOKIE ["email"]);
  unset ($_COOKIE ["imagen"]);
  unset ($_COOKIE ["estado"]); 
  unset ($_COOKIE["id_usuario"]); 
  unset ($_COOKIE["imagen_empresa_admin"]); 
  setcookie ('nombres', '', time()-604800,'/'); 
  setcookie ('apellido_paterno', '', time()-604800,'/');
  setcookie ('apellido_materno', '', time()-604800,'/');
  setcookie ('id_empresa', '', time()-604800,'/');
  setcookie ('perfil_id', '', time()-604800,'/');
  setcookie ('usuario_admin', '', time()-604800,'/');
  setcookie ('clave_admin', '', time()-604800,'/');
  setcookie ('email', '', time()-604800,'/');
  setcookie ('imagen', '', time()-604800,'/');
  setcookie ('estado', '', time()-604800,'/');   
  setcookie ('id_usuario', '', time()-604800,'/');
  setcookie ('imagen_empresa_admin', '', time()-604800,'/');
  /*unset ($_COOKIE ["config_usuario"]);
  unset ($_COOKIE ["config_clave"]);
  unset ($_COOKIE ["usuario_nombre"]);
  unset ($_COOKIE ["usuario_perfil"]);
  unset ($_COOKIE ["imagen"]);
  unset ($_COOKIE ["perfil"]);
  unset ($_COOKIE ["id_perfil"]);
  unset ($_COOKIE ["empresa_sede"]);
  unset ($_COOKIE ["ruc_empresa"]);
  unset ($_COOKIE ["id_sede"]); 
  unset ($_COOKIE["usuario_id"]); 
  setcookie ('config_usuario', '', time()-604800,'/'); 
  setcookie ('config_clave', '', time()-604800,'/');
  setcookie ('usuario_nombre', '', time()-604800,'/');
  setcookie ('usuario_perfil', '', time()-604800,'/');
  setcookie ('imagen', '', time()-604800,'/');
  setcookie ('perfil', '', time()-604800,'/');
  setcookie ('id_perfil', '', time()-604800,'/');
  setcookie ('empresa_sede', '', time()-604800,'/');
  setcookie ('ruc_empresa', '', time()-604800,'/');
  setcookie ('id_sede', '', time()-604800,'/');   
  setcookie ('usuario_id', '', time()-604800,'/');*/
header('Location: login/index.php');

?>