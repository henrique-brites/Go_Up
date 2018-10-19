<?php
session_start();
include_once("../seguranca.php");
include_once("../conexao.php");
$id 				= $_GET["id"];
$situacao			= $_GET["situacao"];

//Inicio baixar a posição do produto em destaque
//Variavel guardar a ordem do produto a ser alterado
$ord_prod_org = 0;
//Guardar a ordem do produto antecessor a ser alterado
$contr_post_alt = 0;
if($situacao == 1){
	//Pesquisar o id dos produtos em destaque no nivel 1 página principal
	$resultado_prod_dest=mysqli_query( $conectar, "SELECT * FROM carousels ORDER BY ordem ASC");
	$linhas_prod_dest=mysqli_num_rows($resultado_prod_dest);
	while($linhas_prod_dest = mysqli_fetch_array($resultado_prod_dest)){
		//id do produto na tabela produto em destaque
		//$produto_id = $linhas_prod_dest['id'];		
		
		/*Encontrou o produto que deseja descer a 
		posição será colocado na variavel $contr_post_alt o valor 1,
		produto para subir posição recebe a ordem do anterior,
		o produto para ser rebaixado recebe a posição */
		if($contr_post_alt == 1){
			$produto_dest_id = $linhas_prod_dest['id'];	
			$produto_dest_ord_post = $linhas_prod_dest['ordem'];
			$query = mysqli_query( $conectar, "UPDATE carousels set ordem = '$ord_prod_org', modified = NOW() WHERE id=$produto_dest_id");
			$query = mysqli_query( $conectar, "UPDATE carousels set ordem = '$produto_dest_ord_post', modified = NOW() WHERE id=$id");
			$contr_post_alt = 0;
		}
		
		//alterar para 9999 o produto que deseja descer a posição
		if($id === $linhas_prod_dest['id']){
			$query = mysqli_query( $conectar, "UPDATE carousels set ordem = '9999', modified = NOW() WHERE id='$id'");
			$ord_prod_org = $linhas_prod_dest['ordem'];
			$contr_post_alt = 1;
		}
	}
}
//Fim baixar a posição do produto em destaque


//Inicio subir a posição do produto em destaque
//Variavel guardar a ordem do produto a ser alterado
$ord_prod_org = 0;
//Guardar a ordem do produto antecessor a ser alterado
$contr_post_alt = 0;
if($situacao == 2){
	//Pesquisar o id dos produtos em destaque no nivel 1 página principal
	$resultado_prod_dest=mysqli_query( $conectar, "SELECT * FROM carousels ORDER BY ordem DESC");
	$linhas_prod_dest=mysqli_num_rows($resultado_prod_dest);
	while($linhas_prod_dest = mysqli_fetch_array($resultado_prod_dest)){
		//id do produto na tabela produto em destaque
		//$produto_id = $linhas_prod_dest['id'];		
		
		/*Encontrou o produto que deseja descer a 
		posição será colocado na variavel $contr_post_alt o valor 1,
		produto para subir posição recebe a ordem do anterior,
		o produto para ser rebaixado recebe a posição */
		if($contr_post_alt == 1){
			$produto_dest_id = $linhas_prod_dest['id'];	
			$produto_dest_ord_post = $linhas_prod_dest['ordem'];
			$query = mysqli_query( $conectar, "UPDATE carousels set ordem = '$ord_prod_org', modified = NOW() WHERE id=$produto_dest_id");
			$query = mysqli_query( $conectar, "UPDATE carousels set ordem = '$produto_dest_ord_post', modified = NOW() WHERE id=$id");
			$contr_post_alt = 0;
		}
		
		//alterar para 9999 o produto que deseja descer a posição
		if($id === $linhas_prod_dest['id']){
			$query = mysqli_query( $conectar, "UPDATE carousels set ordem = '9999', modified = NOW() WHERE id='$id'");
			$ord_prod_org = $linhas_prod_dest['ordem'];
			$contr_post_alt = 1;
		}
	}
}
//Fim subir a posição do produto em destaque
//Apagar o produto da lista de destaque
if($situacao == 3){
	$query = "UPDATE carousels set  softDelete = '1' WHERE id=$id";
	$resultado = mysqli_query( $conectar, $query);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
	</head>

	<body>
		<?php
		if(($situacao == 1)or($situacao == 2)){
			if (mysqli_affected_rows( $conectar) != 0 ){	
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;../administrativo.php?link=30'>
					<script type=\"text/javascript\">
						alert(\"Ordem do carousel editado com Sucesso.\");
					</script>
				";		   
			}
			 else{ 	
					echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;../administrativo.php?link=30'>
					<script type=\"text/javascript\">
						alert(\"Ordem do carousel não foi editado com Sucesso.\");
					</script>
				";		   

			}
		}if($situacao == 3){
			if (mysqli_affected_rows( $conectar) != 0 ){	
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;../administrativo.php?link=30'>
					<script type=\"text/javascript\">
						alert(\"Carousel retirado com sucesso do destaque.\");
					</script>
				";		   
			}
			 else{ 	
					echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;../administrativo.php?link=30'>
					<script type=\"text/javascript\">
						alert(\"Carousel não foi retirado com sucesso do destaque.\");
					</script>
				";		   

			}
		}
		?>
	</body>
</html>