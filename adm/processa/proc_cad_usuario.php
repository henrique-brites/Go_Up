<?php
session_start();
include_once("../seguranca.php");
include_once("../conexao.php");
$nome 				= $_POST["nome"];
$email 				= $_POST["email"];
$senha 				= password_hash($_POST["senha"], PASSWORD_DEFAULT);;
$nivel_de_acesso 	= $_POST["nivel_de_acesso"];
$query = mysqli_query($conectar, "INSERT INTO usuarios (nome, email, senha, nivel_acesso_id, created) VALUES ('$nome', '$email', '$senha', '$nivel_de_acesso', NOW())");
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;../administrativo.php?link=2'>
				<script type=\"text/javascript\">
					alert(\"Usuário cadastrado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;../administrativo.php?link=2'>
				<script type=\"text/javascript\">
					alert(\"Usuário não foi cadastrado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>