<?php
	$id = $_GET['id'];
	//Executa consulta
	$result = mysqli_query( $conectar, "SELECT * FROM conteudos WHERE id = '$id' LIMIT 1");
	$resultado = mysqli_fetch_assoc($result);
	$id_conteudo = $resultado['id'];
?>
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Editar Conteudo</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href='administrativo.php?link=10'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>
			
			<a href='processa/proc_apagar_conteudo.php?id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <form class="form-horizontal" method="POST" action="processa/proc_edit_conteudo.php" ENCTYPE="multipart/form-data">
	  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Titulo</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="titulo" placeholder="Titulo Contudo" value="<?php echo $resultado['titulo']; ?>">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Descrição Curta</label>
			<div class="col-sm-10">
				<textarea class="form-control ckeditor" rows="5" name="descricao_curta" placeholder="Descrição curta do conteudo"><?php echo $resultado['descricao_curta']; ?></textarea>
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Materia</label>
			<div class="col-sm-10">
				<textarea class="form-control ckeditor" rows="5" name="descricao_longa" placeholder="Descrição longa do conteudo"><?php echo $resultado['descricao_longa']; ?></textarea>
			</div>
		  </div>
		  
		 
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Tag</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="tag" placeholder="Tag" value="<?php echo $resultado['tag']; ?>">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Descrição</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="descricao" placeholder="Descrição" value="<?php echo $resultado['descricao']; ?>">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Slug</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="slug" placeholder="Nome do conteudo tudo minúsculo" value="<?php echo $resultado['slug']; ?>">
			</div>
		  </div>
		  
		  <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Foto do Conteudo (500x500)</label>
				<div class="col-sm-10">
					<!-- <INPUT type=hidden name=MAX_FILE_SIZE VALUE=5048> -->
					<input name="arquivo" type="file"/>	
				</div>
		  </div>
		  
		  <?php 
		  $foto = $resultado['imagem'];
		  if($foto == ""){
			  ?>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">	
						Foto Antiga
					</label>
					<div class="col-sm-10">
						O Conteudo não possui imagem
					</div>
				</div>
			<?php
		  }
		  if($foto != ""){?>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">	
						Foto do Conteudo Antiga
					</label>
					<div class="col-sm-10">
						<img src="<?php echo "../foto/$foto"; ?>" width="100" height="100">
						<input type="hidden" name="img_antiga" value='<?php echo $foto ?>'>
					</div>
				</div>
		  <?php } ?>
		  
		  <?php $categoria_id = $resultado['categoria_id'];  ?>
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Categorias</label>
			<div class="col-sm-10">
			  <select class="form-control" name="categoria_id">
				  <option>Selecione</option>
				  <?php 
						$result_cat =mysqli_query( $conectar, "SELECT * FROM categorias");
						while($dados = mysqli_fetch_assoc($result_cat)){
							$id_categoria = $dados['id'];
							?>
								<option value="<?php echo $dados["id"]; ?>"<?php if($id_categoria == $categoria_id){ echo 'selected'; } ?>
								><?php echo $dados["nome"];?></option>
							<?php
						}
					?>
				</select>
			</div>
		  </div>
		  
		  
		  <input type="hidden" name="id" value="<?php echo $id_conteudo;?>">
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-success">Editar</button>
			</div>
		  </div>
		</form>
	</div>
	</div>
</div> <!-- /container -->

