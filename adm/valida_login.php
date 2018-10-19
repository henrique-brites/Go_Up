
<?php
session_start();
include_once("conexao.php");
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if($btnLogin){
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	//echo "$email - $senha";
	if((!empty($email)) AND (!empty($senha))){
		//Gerar a senha criptografa
		//echo password_hash($senha, PASSWORD_DEFAULT);
		//Pesquisar o usuário no BD
		$result_usuario = "SELECT * FROM usuarios WHERE email='$email' AND softDelete != 1 LIMIT 1";
		$resultado_usuario = mysqli_query($conectar,  $result_usuario);
		if($resultado_usuario){
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			if(password_verify($senha, $row_usuario['senha'])){
				$_SESSION['usuarioId'] 			= $row_usuario['id'];
				$_SESSION['usuarioNome'] 		= $row_usuario['nome'];
				$_SESSION['usuarioNivelAcesso'] = $row_usuario['nivel_acesso_id'];
				$_SESSION['usuarioEmail'] 		= $row_usuario['email'];
				$_SESSION['usuarioSenha'] 		= $row_usuario['senha'];
				
				if($_SESSION['usuarioNivelAcesso'] == 1){
					header("Location: administrativo.php");
				}else{
					header("Location: usuario.php");
				}
				// $_SESSION['id'] = $row_usuario['id'];
				// $_SESSION['nome'] = $row_usuario['nome'];
				// $_SESSION['email'] = $row_usuario['email'];
				// header("Location: administrativo.php");
			}else{
				$_SESSION['msg'] = "Login e senha incorreto!";
				header("Location: index.php");
			}
		}
	}else{
		$_SESSION['msg'] = "Login e senha incorreto!";
		header("Location: index.php");
	}
}else{
	$_SESSION['msg'] = "Página não encontrada";
	header("Location: index.php");
}

?>
