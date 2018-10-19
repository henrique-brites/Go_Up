<?php
session_start();
include_once("seguranca.php");
include_once("conexao.php");
$config = mysqli_fetch_assoc(mysqli_query( $conectar, "SELECT * FROM config WHERE status = 1 ORDER BY 'id'"));
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página Administrativa">
    <meta name="author" content="Cesar">
    <link rel="icon" href="imagens/favicon.ico">

    <title>Administrativo - <?=$config['titulo'];?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
  </head>

  <body role="document">
	<?php
		include_once("menu_admin.php");
		
		if(isset($_GET['link'])){
			$link = $_GET["link"];
		}	

		$pag[1] = "bem_vindo.php";
		$pag[2] = "listar_usuario.php";
		$pag[3] = "cad_usuario.php";
		$pag[4] = "editar_usuario.php";		
		$pag[5] = "visual_usuario.php";
		$pag[6] = "cad_categoria.php";
		$pag[7] = "listar_categoria.php";
		$pag[8] = "visual_categoria.php";
		$pag[9] = "editar_categoria.php";
		$pag[10] = "listar_conteudo.php";
		$pag[11] = "cad_conteudo.php";
		$pag[12] = "visual_conteudo.php";
		$pag[13] = "editar_conteudo.php";
		$pag[14] = "listar_turma.php";
		$pag[15] = "cad_turma.php";
		$pag[16] = "visual_turma.php";
		$pag[17] = "editar_turma.php";
		$pag[18] = "listar_nivel_acesso.php";
		$pag[19] = "cad_nivel_acesso.php";
		$pag[20] = "visual_nivel_acesso.php";
		$pag[21] = "editar_nivel_acesso.php";
		$pag[22] = "listar_situacao.php";
		$pag[23] = "cad_situacao.php";
		$pag[24] = "visual_situacao.php";
		$pag[25] = "editar_situacao.php";
		$pag[26] = "listar_material.php";
		$pag[27] = "cad_material.php";
		$pag[28] = "visual_material.php";
		$pag[29] = "editar_material.php";
		$pag[30] = "listar_carousel.php";
		$pag[31] = "cad_carousel.php";
		

		$pag[32] = "listar_configuracao_site.php";
		$pag[33] = "editar_configuracao_site.php";
		$pag[34] = "visual_configuracao_site.php";
		$pag[35] = "cad_configuracao_site.php";
		$pag[36] = "listar_mensagem_contato.php";

		//$pag[37] = "listar_destaque_conteudo.php";

		
		if(!empty($link)){
			if(file_exists($pag[$link])){
				include $pag[$link];
			}else{
				include "bem_vindo.php";
			}
		}else{
			include "bem_vindo.php";
		}
		
	?>
    
	


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
	<script src="js/ckeditor/ckeditor.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
