<?php
print_r($_FILES);
echo "<br>";
print_r($_POST);
//die();
session_start();
include_once("../seguranca.php");
include_once("../conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
	</head>
	
	<?php
$id 				= $_POST["id"];
$nome 				= $_POST["nome"];
$descricao_curta 	= $_POST["descricao_curta"];
$descricao_longa 	= $_POST["descricao_longa"];
$arquivo	 		= $_FILES['arquivo']['name'];
$turma_id 			= $_POST["turma_id"];
$situacao_id 		= $_POST["situacao_id"];

//$img_antiga 		= $_POST["img_antiga"];
$arquivo_antigo 		= $_POST["arquivo_antigo"];

if($arquivo == ""){
	$query = mysqli_query( $conectar, "UPDATE material SET
		nome			='$nome',
		descricao_curta	='$descricao_curta',
		descricao_longa	='$descricao_longa',
		turma_id 	='$turma_id',
		situacao_id 	='$situacao_id',
		modified = NOW() WHERE id='$id'");
	
		if (mysqli_affected_rows($conectar) != 0 ){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;../administrativo.php?link=26'>
				<script type=\"text/javascript\">
					alert(\"Matrial 1 editado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;../administrativo.php?link=26'>
				<script type=\"text/javascript\">
					alert(\"Matrial 1 não foi editado com Sucesso.\");
				</script>
			";		   

		}
	
}else{
	//Pasta onde o arquivo vai ser salvo
	//$_UP['pasta'] = '../../foto/';
	$_UP['pasta'] = '../../arquivo/';

	//Tamanho máximo do arquivo em Bytes
	$_UP['tamanho'] = 1024*1024*50; //5mb

	//Array com as extensoes permitidas
	$_UP['extensoes'] = array('pdf','zip', 'png', 'jpg', 'jpeg', 'gif');

	//Renomeia o arquivo? (se true, o arquivo será salvo como .jpg e em nome único)
	$_UP['renomeia'] = false;

	//Array com os tipos de erros de upload do PHP
	$_UP['erros'][0] = 'Não houve erro';
	$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
	$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
	$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
	$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
	
	//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
	if($_FILES['arquivo']['error'] != 0){
		die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['arquivo']['error']]);
		exit; //Para a execução do script
	}
	
	//Faz a verificação da extensao do arquivo
	$tmp = explode('.', $_FILES['arquivo']['name']);
	$extensao = strtolower(end($tmp));
	if(array_search($extensao, $_UP['extensoes'])=== false){
		$query = mysqli_query(  $conectar, "UPDATE material SET
		nome			='$nome',
		descricao_curta	='$descricao_curta',
		descricao_longa	='$descricao_longa',
		turma_id 		='$turma_id',
		situacao_id 	='$situacao_id',
		modified 		= NOW() WHERE id='$id'");
	
		if (mysqli_affected_rows( $conectar ) != 0 ){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;../administrativo.php?link=26'>
				<script type=\"text/javascript\">
					alert(\"A imagem não foi alterada for favor, envie arquivos com as seguintes extensões: png, jpg, jpeg e gif. As informações do Matrial foram alteradas.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;../administrativo.php?link=26'>
				<script type=\"text/javascript\">
					alert(\"Matrial não foi editado com Sucesso.\");
				</script>
			";		   

		}
			
	}
	//Faz a verificação do tamanho do arquivo
	else if ($_UP['tamanho'] < $_FILES['arquivo']['size']){
		$query = mysqli_query(  $conectar, "UPDATE material SET
		nome			='$nome',
		descricao_curta	='$descricao_curta',
		descricao_longa	='$descricao_longa',
		turma_id 		='$turma_id',
		situacao_id 	='$situacao_id',
		modified = NOW() WHERE id='$id'");
		
		if (mysqli_affected_rows( $conectar ) != 0 ){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;../administrativo.php?link=26'>
				<script type=\"text/javascript\">
				alert(\"O arquivo enviado é muito grande, envie arquivos de até 2mb. As informações do Matrial foram alteradas com sucesso.\");
			</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;../administrativo.php?link=26'>
				<script type=\"text/javascript\">
					alert(\"Matrial não foi editado com Sucesso.\");
				</script>
			";		   

		}		
	}
	//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto

	else{
		//Primeiro verifica se deve trocar o nome do arquivo
		if($_UP['renomeia'] == true){
			//Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
			$nome_final = $nome.'_'. MD5(time()).'.'.$extensao;
		}else{
			//mantem o nome original do arquivo
			$nome_final = $_FILES['arquivo']['name'];
		}
		//Verificar se é possivel mover o arquivo para a pasta escolhida
		if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $nome_final)){
			//Upload efetuado com sucesso, exibe a mensagem
			$query = mysqli_query( $conectar, "UPDATE material SET
			nome			='$nome',
			descricao_curta	='$descricao_curta',
			descricao_longa	='$descricao_longa',
			arquivo 		='$nome_final',
			turma_id 		='$turma_id',
			situacao_id 	='$situacao_id',
			modified = NOW() WHERE id='$id'");
			
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;../administrativo.php?link=26'>
				<script type=\"text/javascript\">
					alert(\"Matrial alterado com sucesso com Sucesso.\");
				</script>
			";	
		}else{
			//Upload não efetuado com sucesso, exibe a mensagem
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;../administrativo.php?link=26'>
				<script type=\"text/javascript\">
					alert(\"Matrial não foi alterado com Sucesso.\");
				</script>
			";
		}
	}
}
		?>
	</body>
</html>