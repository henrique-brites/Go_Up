<?php
session_start();
include_once("../seguranca.php");
include_once("../conexao.php");
$id 				= $_GET["id"];

$queryUp = "UPDATE material set  softDelete = '1', modified = NOW() WHERE id=$id";
//$query = "DELETE FROM material WHERE id=$id";
$resultado = mysqli_query($conectar, $queryUp);
$linhas = mysqli_affected_rows($conectar);

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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;../administrativo.php?link=26'>
				<script type=\"text/javascript\">
					alert(\"Material apagado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;../administrativo.php?link=26'>
				<script type=\"text/javascript\">
					alert(\"Material não foi apagado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>