<?php
	$id = $_GET['id'];
	//Executa consulta
	$result = mysqli_query( $conectar, "SELECT * FROM situacaos WHERE id = '$id' LIMIT 1");
	$resultado = mysqli_fetch_assoc($result);
?>
<div class="container theme-showcase" role="main">      
	<div class="page-header">
		<h1>Visualizar Situação Material</h1>
	</div>
	
	<div class="row">
		<div class="pull-right">
			<a href='administrativo.php?link=22'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>
							
			<a href='administrativo.php?link=25&id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
			
			<a href='processa/proc_apagar_situacao.php?id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class=" col-sm-3 col-md-2">
				<b>Id:</b>
			</div>
			<div class=" col-sm-9 col-md-10">
				<?php echo $resultado['id']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Nome da Situação:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php echo $resultado['nome']; ?>
			</div>
		</div>
	</div>
</div> <!-- /container -->

