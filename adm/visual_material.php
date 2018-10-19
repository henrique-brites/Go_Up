<?php
	$id = $_GET['id'];
	//Executa consulta
	//$result = mysqli_query( $conectar, "SELECT * FROM material WHERE id = '$id' LIMIT 1");
	$result = mysqli_query( $conectar, "SELECT m.id, m.nome, m.descricao_curta, m.descricao_longa, m.imagem, m.arquivo, t.nome as turma, s.nome as situacao FROM material m, turmas t, situacaos s WHERE m.id = '$id' AND m.turma_id = t.id AND m.situacao_id = s.id LIMIT 1");
	$resultado = mysqli_fetch_assoc($result);
?>
<div class="container theme-showcase" role="main">      
	<div class="page-header">
		<h1>Visualizar Material</h1>
	</div>
	
	<div class="row">
		<div class="pull-right">
			<a href='../arquivo/<?php echo $resultado['arquivo']; ?>' target="_blank"><button type='button' class='btn btn-sm btn-success'>Visualizar Pdf</button></a>
			
			<a href='administrativo.php?link=26'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>
							
			<a href='administrativo.php?link=29&id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
			
			<a href='processa/proc_apagar_material.php?id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-22">
			<div class=" col-sm-3 col-md-2">
				<b>Id:</b>
			</div>
			<div class=" col-sm-9 col-md-10">
				<?php echo $resultado['id']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Nome do Material:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php echo $resultado['nome']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Descrição Curta:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php echo $resultado['descricao_curta']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Descricao Longa:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php echo $resultado['descricao_longa']; ?>
			</div>

			<div class="col-sm-3 col-md-2">
				<b>Arquivo:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php $foto = $resultado['imagem']; ?>
				<img src="<?php echo "../foto/$foto"; ?>" width="100" height="100">
				<?php echo $resultado['arquivo']; ?>
			</div>
			
			
			<!-- <div class="col-sm-3 col-md-2">
				<b>Imagem:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php $foto = $resultado['imagem']; ?>
				<img src="<?php echo "../foto/$foto"; ?>" width="100" height="100">
			</div> -->
			
			<div class="col-sm-3 col-md-2">
				<b>Situação:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php echo $resultado['situacao']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Turma:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php echo $resultado['turma']; ?>
			</div>
			
		</div>
	</div>
</div> <!-- /container -->

