<?php
session_start();
include_once("../seguranca.php");
include_once("../conexao.php");
$id 				= $_POST["id"];
$nome 				= $_POST["nome"];
$slug 				= $_POST["slug"];
$tag 				= $_POST["tag"];
$description 		= $_POST["description"];

$query = mysqli_query( $conectar, "UPDATE turmas set nome ='$nome', slug = '$slug', tag='$tag', description= '$description', modified = NOW() WHERE id='$id'");
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
					alert(\"Turma editado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;../administrativo.php?link=14'>
				<script type=\"text/javascript\">
					alert(\"Turma não foi editado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>