<?php
session_start();
include_once("../seguranca.php");
include_once("../conexao.php");
$nome 				= $_POST["nome"];
$slug 				= $_POST["slug"];
$tag 				= $_POST["tag"];
$description 		= $_POST["description"];

$query = mysqli_query( $conectar, "INSERT INTO turmas (nome, slug, tag, description, created) VALUES ('$nome', '$slug', '$tag', '$description', NOW())");
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;../administrativo.php?link=14'>
				<script type=\"text/javascript\">
					alert(\"Turma cadastrado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;../administrativo.php?link=14'>
				<script type=\"text/javascript\">
					alert(\"Turma não foi cadastrado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>