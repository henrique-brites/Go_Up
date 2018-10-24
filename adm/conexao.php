<?php

	//Checas se existe a  Database senão Configura
	//Remove os erros 
	error_reporting(E_ERROR);

	$conectar = mysqli_connect("localhost","-","-", "-");// configurar
	mysqli_set_charset($conectar,"utf8");

	 
	if (!$conectar) {	
		echo "Seu banco de dados não está configurado ainda.  Clique aqui para ";
		echo "<a href='adm/setup.php'>Configurar</a>";
		die();
	}


?>