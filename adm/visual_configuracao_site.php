<?php
	$id = $_GET['id'];
	//Executa consulta
	$result = mysqli_query( $conectar, "SELECT * FROM config WHERE id = '$id' LIMIT 1");
	$resultado = mysqli_fetch_assoc($result);
?>
<div class="container theme-showcase" role="main">      
	<div class="page-header">
		<h1>Visualizar Configuração Site</h1>
	</div>
	
	<div class="row">
		<div class="pull-right">
			<a href='administrativo.php?link=32&id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>
							
			<a href='administrativo.php?link=33&id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
			
			<a href='processa/proc_apagar_configuracao_site.php?id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class=" col-sm-3 col-md-2">
				<b>Id:</b>
			</div>
			<div class=" col-sm-9 col-md-10">
				<?=$resultado['id'];?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Titulo:</b>
			</div>
			<div class="col-sm-9 col-md-10">
					<?=$resultado['titulo'];?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Sobre:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php  
					if($resultado['sobre'] == 1){ echo 'Mostrar'; }
					else { echo 'Ocultar';}
				?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Home:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php  
					if($resultado['home'] == 1){ echo 'Mostrar'; }
					else { echo 'Ocultar';}
				?>
			</div>

			<div class="col-sm-3 col-md-2">
				<b>Contato:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php  
					if($resultado['contato'] == 1){ echo 'Mostrar'; }
					else { echo 'Ocultar';}
				?>
			</div>

			<div class="col-sm-3 col-md-2">
				<b>Admin:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php  
					if($resultado['admin'] == 1){ echo 'Mostrar'; }
					else { echo 'Ocultar';}
				?>
			</div>

			<div class="col-sm-3 col-md-2">
				<b>E-mail Padrão:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php echo $resultado['email']; ?>
			</div>

			<div class="col-sm-3 col-md-2">
				<b>Status</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php  
					if($resultado['status'] == 1){ echo 'Ativo'; }
					else { echo 'Desativado';}
				?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Cor Menu:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<input type="color" name="" value="<?=$resultado['cor_menu'];?>" style="height: 30px; width: 80px; ">
			</div>

			
		</div>
	</div>
</div> <!-- /container -->

