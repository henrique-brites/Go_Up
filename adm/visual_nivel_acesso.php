<?php
	$id = $_GET['id'];
	//Executa consulta
	$result = mysqli_query( $conectar, "SELECT * FROM nivel_acessos WHERE id = '$id' LIMIT 1");
	$resultado = mysqli_fetch_assoc($result);
?>
<div class="container theme-showcase" role="main">      
	<div class="page-header">
		<h1>Visualizar Situação</h1>
	</div>
	
	<div class="row">
		<div class="pull-right">
			<a href='administrativo.php?link=18&id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>
							
			<a href='administrativo.php?link=21&id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
			
			<a href='processa/proc_apagar_nivel_acesso.php?id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
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
				<b>Nome:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php echo $resultado['nome_nivel']; ?>
			</div>
		</div>
	</div>
</div> <!-- /container -->

