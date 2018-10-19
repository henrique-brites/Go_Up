<?php
	
// Is the user using HTTPS?
$dirname = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';

// Complete the URL
$dirname .= $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

	define('pg', $dirname);
    //define('pg','http://localhost/henri/go_up');
	session_start();
	include_once("adm/conexao.php");
    $config = mysqli_fetch_assoc(mysqli_query( $conectar, "SELECT * FROM config WHERE status = 1 ORDER BY 'id'"));
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Go_Up - Um Novo Conceito.">
    <meta name="author" content="Henrique Brites">
    <link rel="icon" href="<?php echo pg ?>/adm/imagens/favicon.ico">

    <title><?=$config['titulo'];?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo pg ?>/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo pg ?>/css/jumbotron.css" rel="stylesheet">
	
	<!-- Custom styles for this template 
    <link href="css/carousel.css" rel="stylesheet">-->
	
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo pg ?>/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
	<!-- Menu -->
	<?php
		include_once("menu.php");
	?>
	
	  
	 <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <?php
		$url = (isset($_GET['url'])) ? $_GET['url']:'';
		$explode = explode('/',$url);
		
		$paginas = array('home','conteudo', 'material', 'detalhe_conteudo','contato','sobre','detalhe_produto','proc_cad_contato');
		
		if(isset($explode[0])&& $explode[0] == ''){
			include "home.php";
		}elseif($explode[0]!=''){
			if(isset($explode[0]) && in_array($explode[0],$paginas)){
				include $explode[0].".php";
			}else{
				include "home.php";
			}
		}
		
	?>  


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo pg ?>/js/jquery.min.js"></script>
    <script src="<?php echo pg ?>/js/bootstrap.min.js"></script>	
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo pg ?>/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
