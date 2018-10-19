<?php
 error_reporting(E_ERROR);
 $conectar = mysqli_connect('localhost','root','', 'go_up');// configurar 
  mysqli_set_charset($conectar,'utf8'); 
  if (!$conectar) {  
 echo 'Seu banco de dados não está configurado ainda.  Clique aqui para <a href="adm/setup.php"> Configurar</a>'; 
  die();	
 }?>