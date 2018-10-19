<?php

	//Checas se existe a  Database senão Configura
	//Remove os erros 
	error_reporting(E_ERROR);

	$conectar = mysqli_connect("localhost","root","", "go_up");// configurar
	mysqli_set_charset($conectar,"utf8");

	 
	if (!$conectar) {	
		echo "Seu banco de dados não está configurado ainda.  Clique aqui para ";
		echo "<a href='setup.php'>Configurar</a>";
		die();
	}


?>