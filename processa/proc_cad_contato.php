<?php
      header("Content-type: text/html; charset=UTF-8");
  	
      
// include_once("../adm/conexao.php");
// 	$result=mysqli_query( $conectar, "SELECT email FROM config WHERE status = 1 ");
// 	$resultado = mysqli_fetch_assoc($result);
// //pega os dados que foi digitado
// $nome 				= $_POST["nome"];
// $email			 	= $_POST["email"];
// $telefone		 	= $_POST["telefone"];
// $assunto			= $_POST["assunto"];
// $mensagem			= $_POST["mensagem"];



//       $html = "<!DOCTYPE html>
// <html>
// <head>
// <style>
// body {
//   width: 80%;
//   margin: 30px auto;
// }

// </style>
// </head>
// <body>

// <h2> $assunto </h2>
// <p> Nome:  $nome  | Telefone:  $telefone  </p>
// <p> $mensagem </p>
 
    

// </body>
// </html>";

// $headers  = "From: $nome <$email>\r\n";
// $headers .= "Reply-To: $email\r\n";
// $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
// $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

// echo  $resultado['email'];

// $email_to = $resultado['email'];
// //$email_to = "henrique@healthlab.io";
// //não esqueça de substituir este email pelo seu.

// $status = mail($email_to, $assunto, $html, $headers);
// //enviando o email.



// if ($status) {
// 	 echo "
// 				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../contato'>
// 				<script type=\"text/javascript\">
// 					alert(\"Mensagem enviada com Sucesso.\");
// 				</script>
// 			";
  
// //mensagem de form enviado com sucesso.

// } else {
// 	  echo "
// 				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../contato'>
// 				<script type=\"text/javascript\">
// 					alert(\"Mensagem não foi enviada com Sucesso.\");
// 				</script>
// 			";	
  
// //mensagem de erro no envio. 
// }

// //header("location: ../index.php");


?>
	
  <!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
	</head>
	
	<?php

include_once("../adm/conexao.php");
$nome 				= $_POST["nome"];
$email			 	= $_POST["email"];
$telefone		 	= $_POST["telefone"];
$assunto			= $_POST["assunto"];
$mensagem			= $_POST["mensagem"];

$query = mysqli_query( $conectar, "INSERT INTO contatos (nome, email, telefone, assunto, mensagem, created) VALUES ('$nome', '$email', '$telefone', '$assunto', '$mensagem', NOW())");
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
	</head>

	<body>
		<?php
		if (mysqli_affected_rows( $conectar ) != 0 ){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../contato'>
				<script type=\"text/javascript\">
					alert(\"Mensagem enviada com Sucesso.\");
				</script>
			";	 
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=..//contato'>
				<script type=\"text/javascript\">
					alert(\"Mensagem não foi enviada com Sucesso.\");
				</script>
			";		

		}

		?>
	</body>
</html>

 


