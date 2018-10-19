<?php
session_start();
include_once("../seguranca.php");
include_once("../conexao.php");
$titulo 			= $_POST["titulo"];
$sobre 				= $_POST["sobre"];
$home 				= $_POST["home"];
$contato 			= $_POST["contato"];
$admin 				= $_POST["admin"];
$email_padrao 		= $_POST["email_padrao"];
$status 			= $_POST["status"];
$cor_menu 			= $_POST["cor_menu"];

if ($status == "1"){
	$queryUp = mysqli_query( $conectar, "UPDATE config set  status = '0'");
	$query = mysqli_query( $conectar, "INSERT INTO config (titulo, sobre, home, contato, admin, status, email, cor_menu, created) VALUES ('$titulo', '$sobre', '$home', '$contato', '$admin', '$status', '$email_padrao', '$cor_menu', NOW())");

}else{
	$query = mysqli_query( $conectar, "INSERT INTO config (titulo, sobre, home, contato, admin, status, email, cor_menu, created) VALUES ('$titulo', '$sobre', '$home', '$contato', '$admin', '$status', '$email_padrao', '$cor_menu', NOW())");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
	</head>

	<body>
		<?php
		if (mysqli_affected_rows($conectar) != 0 ){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;../administrativo.php?link=32'>
				<script type=\"text/javascript\">
					alert(\"Configuração Site cadastrado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;../administrativo.php?link=32'>
				<script type=\"text/javascript\">
					alert(\"Configuração Site não foi cadastrado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>