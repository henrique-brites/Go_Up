<?php
	$id = $_GET['id'];
	//Executa consulta
	$result = mysqli_query(  $conectar, "SELECT * FROM material WHERE id = '$id' LIMIT 1");
	$resultado = mysqli_fetch_assoc($result);
	$id_material = $resultado['id'];
?>
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Editar Material</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href='administrativo.php?link=26'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>
			
			<a href='processa/proc_apagar_material.php?id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <form class="form-horizontal" method="POST" action="processa/proc_edit_material.php" enctype="multipart/form-data">
	  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="nome" placeholder="Nome Produto" value="<?php echo $resultado['nome']; ?>">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Descrição Curta</label>
			<div class="col-sm-10">
				<textarea class="form-control ckeditor" rows="5" name="descricao_curta" placeholder="Descrição curta do produto"><?php echo $resultado['descricao_curta']; ?></textarea>
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Descrição Longa</label>
			<div class="col-sm-10">
				<textarea class="form-control ckeditor" rows="5" name="descricao_longa" placeholder="Descrição longa do produto"><?php echo $resultado['descricao_longa']; ?></textarea>
			</div>
		  </div>
		  
		  <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Arquivo PDF ou Zip (50 Mb)</label>
				<div class="col-sm-10">
					<input name="arquivo" type="file"/>	
				</div>
		  </div>
		  
		  <?php 
		  $arquivo = $resultado['arquivo'];
		  if($arquivo == ""){
			  ?>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">	
						Foto Antiga
					</label>
					<div class="col-sm-10">
						O produto não possui imagem
					</div>
				</div>
			<?php
		  }
		  if($arquivo != ""){

		  	$foto = $resultado['imagem'];
		  	?>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">	
						Arquivo Antigo
					</label>
					<div class="col-sm-10">
						<img src="<?php echo "../foto/$foto"; ?>" width="100" height="100">
						<p><?php echo $arquivo ?></p>
						<input type="hidden" name="img_antiga" value='<?php echo $foto ?>'>
						<input type="hidden" name="arquivo_antigo" value='<?php echo $arquivo ?>'>
					</div>
				</div>
		  <?php } ?>
		  
		  <?php $turma_id = $resultado['turma_id'];  ?>
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Turmas</label>
			<div class="col-sm-10">
			  <select class="form-control" name="turma_id">
				  <option>Selecione</option>
				  <?php 
						$result_turma =mysqli_query( $conectar, "SELECT * FROM turmas");
						while($dados = mysqli_fetch_assoc($result_turma)){
							$id_turma = $dados['id'];
							?>
								<option value="<?php echo $dados["id"]; ?>"<?php if($id_turma == $turma_id){ echo 'selected'; } ?>
								><?php echo $dados["nome"];?></option>
							<?php
						}
					?>
				</select>
			</div>
		  </div>
		  <?php $situacao_id = $resultado['situacao_id'];?>
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Situação</label>
			<div class="col-sm-10">
			  <select class="form-control" name="situacao_id">
				  <option>Selecione</option>
				  <?php 
						$result_sit =mysqli_query( $conectar, "SELECT * FROM situacaos");
						while($dados = mysqli_fetch_assoc($result_sit)){
							$id_situacao = $dados['id'];
							?>
								<option value="<?php echo $dados["id"]; ?>"
								<?php if($id_situacao == $situacao_id){ echo 'selected'; } ?>
								><?php echo $dados["nome"];?></option>
							<?php
						}
					?>
				</select>
			</div>
		  </div>
		  
		  <input type="hidden" name="id" value="<?php echo $id_material;?>">
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-success">Editar</button>
			</div>
		  </div>
		</form>
	</div>
	</div>
</div> <!-- /container -->

