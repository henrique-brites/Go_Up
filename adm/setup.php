
<html>
<head>

</head>
<body>
  <form method="post" action="">
       Host<input type="text" name="host">
       Usuario<input type="text" name="username">
       Senha <input type="password" name="password">
       <input type="submit" value="Criar">
  </form>
</body>
</html>






<?php


//Remove o relatório de erross
error_reporting(E_ERROR);

if( isset($_POST["host"]) && isset($_POST["username"])  )
{
	  if(!empty($_POST["host"]) &&  !empty($_POST["username"])    )
	  {
		  

		  
		$host=$_POST["host"];
		$username=$_POST["username"];
		$password=$_POST["password"];

				

			//$conteudo = ' phpinfo(); ';
				$conteudo = "<?php\n error_reporting(E_ERROR);\n \$conectar = mysqli_connect('$host','$username','$password', 'go_up');// configurar \n  mysqli_set_charset(\$conectar,'utf8'); \n  if (!\$conectar) {  \n echo 'Seu banco de dados não está configurado ainda.  Clique aqui para <a href=".'"adm/setup.php"'."> Configurar</a>'; \n  die();	\n }?>";


     file_put_contents('conexao.php', $conteudo);

					

		$conectar = mysqli_connect("$host", "$username", "$password") ; 

		if (!$conectar) {
				echo "Algo deu errado! Tente novamente. ";
				die();
		}
		
		$query = "CREATE DATABASE IF NOT EXISTS go_up";
			
			if(mysqli_query($conectar, $query)){
				
				//mude a senha do mysql para ""
				$query2="SET PASSWORD FOR 'root'@'localhost' = PASSWORD('') ";
				mysqli_query($conectar, $query2);
				mysqli_close($conectar);
				
				$conectar = mysqli_connect("$host", "$username", "$password", "go_up") ;
				
				
				// sql1 to create table carousels
				$sql1 = "CREATE TABLE IF NOT EXISTS `carousels` (
						  `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
						  `nome` varchar(520) NOT NULL,
						  `url` varchar(520) NOT NULL,
						  `imagem` varchar(520) NOT NULL,
						  `ordem` int(11) NOT NULL,
						  `created` datetime NOT NULL,
						  `modified` datetime DEFAULT NULL,
						  `softDelete` tinyint(1) NOT NULL DEFAULT '0'
						) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

				mysqli_query($conectar, $sql1);
				
				// sql2 to create table categorias
				$sql2 = "CREATE TABLE IF NOT EXISTS `categorias` (
					 `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					  `nome` varchar(520) NOT NULL,
					  `slug` varchar(220) NOT NULL,
					  `tag` varchar(220) NOT NULL,
					  `description` varchar(550) NOT NULL,
					  `created` datetime NOT NULL,
					  `modified` datetime DEFAULT NULL,
					  `softDelete` tinyint(1) DEFAULT '0'
					) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

				mysqli_query($conectar, $sql2);

				// sql3 to create table config
				$sql3 = "CREATE TABLE IF NOT EXISTS `config` (
					 `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					  `titulo` varchar(120) NOT NULL,
					  `home` tinyint(1) NOT NULL DEFAULT '0',
					  `sobre` tinyint(1) NOT NULL DEFAULT '0',
					  `contato` tinyint(1) NOT NULL DEFAULT '0',
					  `admin` tinyint(1) NOT NULL DEFAULT '0',
					  `email` varchar(220) DEFAULT NULL,
					  `status` tinyint(1) NOT NULL DEFAULT '0',
					  `cor_menu` varchar(30) DEFAULT NULL,
					  `created` datetime NOT NULL,
					  `modified` datetime DEFAULT NULL,
					  `softDelete` tinyint(1) NOT NULL DEFAULT '0'
					) ENGINE=InnoDB  DEFAULT CHARSET=latin1  ";

				mysqli_query($conectar, $sql3);




				// sql4 to create table contatos
				$sql4 = "CREATE TABLE IF NOT EXISTS `contatos` (
					 `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					  `nome` varchar(550) NOT NULL,
					  `email` varchar(550) NOT NULL,
					  `telefone` varchar(550) NOT NULL,
					  `assunto` varchar(550) NOT NULL,
					  `mensagem` text NOT NULL,
					  `created` datetime NOT NULL,
					  `modified` datetime DEFAULT NULL,
					  `softDelete` tinyint(1) NOT NULL DEFAULT '0'
					) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ";

				mysqli_query($conectar, $sql4);




				// sql5 to create table conteudos
				$sql5 = "CREATE TABLE IF NOT EXISTS `conteudos` (
					 `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					  `titulo` longtext,
					  `descricao_curta` longtext,
					  `descricao_longa` longtext,
					  `tag` varchar(520) NOT NULL,
					  `descricao` varchar(520) DEFAULT NULL,
					  `slug` varchar(520) NOT NULL,
					  `imagem` varchar(250) NOT NULL,
					  `modified` datetime DEFAULT NULL,
					  `created` datetime NOT NULL,
					  `categoria_id` int(11) NOT NULL,
					  `softDelete` tinyint(1) NOT NULL DEFAULT '0'
					) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ";

				mysqli_query($conectar, $sql5);




				// sql6 to create table destaques_conteudos
				$sql6 = "CREATE TABLE IF NOT EXISTS `destaques_conteudos` (
					 `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					  `conteudo_id` int(11) NOT NULL,
					  `nivel_um` int(11) NOT NULL,
					  `nivel_dois` int(11) NOT NULL,
					  `interessar` int(11) NOT NULL,
					  `ordem` int(11) NOT NULL,
					  `created` datetime NOT NULL,
					  `modified` datetime DEFAULT NULL,
					  `softDelete` tinyint(1) NOT NULL DEFAULT '0'
					) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ";

				mysqli_query($conectar, $sql6);




				// sql7 to create table turmas
				$sql7 = "CREATE TABLE IF NOT EXISTS `turmas` (
					 `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					  `nome` varchar(150) NOT NULL,
					  `slug` varchar(150) NOT NULL,
					  `tag` varchar(220) NOT NULL,
					  `description` varchar(550) NOT NULL,
					  `situacao` tinyint(1) NOT NULL DEFAULT '1',
					  `created` datetime NOT NULL,
					  `modified` datetime DEFAULT NULL,
					  `softDelete` tinyint(1) NOT NULL DEFAULT '0'
					) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ";

				mysqli_query($conectar, $sql7);




				// sq8 to create table situacaos
				$sql8 = "CREATE TABLE IF NOT EXISTS `situacaos` (
					 `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					  `nome` varchar(220) NOT NULL,
					  `created` datetime NOT NULL,
					  `modified` datetime DEFAULT NULL,
					  `softDelete` tinyint(1) NOT NULL DEFAULT '0'
					) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ";

				mysqli_query($conectar, $sql8);



				// sql9 to create table material
				$sql9 = "CREATE TABLE IF NOT EXISTS `material` (
					 `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					  `nome` varchar(520) NOT NULL,
					  `descricao_curta` text NOT NULL,
					  `descricao_longa` text NOT NULL,
					  `imagem` varchar(220) DEFAULT NULL,
					  `arquivo` varchar(255) NOT NULL,
					  `situacao_id` int(11) NOT NULL,
					  `turma_id` int(11) NOT NULL,
					  `created` datetime NOT NULL,
					  `modified` datetime DEFAULT NULL,
					  `softDelete` tinyint(1) NOT NULL DEFAULT '0'
					) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;";

				mysqli_query($conectar, $sql9);



				// sql10 to create table nivel_acessos
				$sql10 = "CREATE TABLE IF NOT EXISTS `nivel_acessos` (
					 `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					  `nome_nivel` varchar(220) NOT NULL,
					  `created` datetime NOT NULL,
					  `modified` datetime DEFAULT NULL,
					  `softDelete` tinyint(1) NOT NULL DEFAULT '0'
					) ENGINE=InnoDB  DEFAULT CHARSET=latin1  ;";

				mysqli_query($conectar, $sql10);


				// sq11 to insert  table nivel_acessos
				$sql11 = "INSERT INTO `nivel_acessos` (`nome_nivel`, `created`)
						VALUES ('Administrador', NOW())";

				mysqli_query($conectar, $sql11);


				// sq12 to create table usuarios
				$sql12 = "CREATE TABLE IF NOT EXISTS `usuarios` (
					 `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					  `nome` varchar(220) NOT NULL,
					  `email` varchar(220) NOT NULL,
					  `senha` varchar(200) NOT NULL,
					  `nivel_acesso_id` int(11) NOT NULL,
					  `created` datetime DEFAULT NULL,
					  `modified` datetime DEFAULT NULL,
					  `softDelete` tinyint(1) DEFAULT '0'
					) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;";

				mysqli_query($conectar, $sql12);


				// sq13 to insert  table usuarios
				$sql13 = 'INSERT INTO `usuarios` (`nome`, `email`, `senha`, `nivel_acesso_id`, `created`) 
				VALUES
				("admin", "admin@admin.com", "$2y$10$d8Hpwwj/DENEW4sBuUDvUuCw4/2QgEoWvs8YlAXASltHqw5w7vKDm", 1, NOW())';
						
				mysqli_query($conectar, $sql13);

				mysqli_close($conectar);


				echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0; index.php'>
			<script type=\"text/javascript\">
				alert(\"Usuário cadastrado no Banco de Dados \\n Usuário: admin@admin.com \\n Senha: 123\");
			</script>
		";	
				
				//echo "<script>window.open('index.php','_self')</script>";
		
				
			} 
			else{
				die("Conexão falhou: " . mysqli_connect_error());
			}

	}
}

?>