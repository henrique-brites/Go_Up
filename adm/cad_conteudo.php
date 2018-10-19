
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Cadastrar Conteudo</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href='administrativo.php?link=10'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>				
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <form class="form-horizontal" method="POST" action="processa/proc_cad_conteudo.php" enctype="multipart/form-data">
	  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Titulo do Conteudo</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="titulo" placeholder="Titulo do Conteudo">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Descrição Curta</label>
			<div class="col-sm-10">
				<textarea class="form-control ckeditor" rows="5" name="descricao_curta" placeholder="Descrição curta do conteudo"></textarea>
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Materia</label>
			<div class="col-sm-10">
				<textarea class="form-control ckeditor" rows="5" name="descricao_longa" placeholder="Descrição longa do conteudo"></textarea>
			</div>
		  </div>
		 
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Tag</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="tag" placeholder="Tag">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Descrição</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="descricao" placeholder="Descrição">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Slug</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="slug" placeholder="Nome do conteudo tudo minúsculo">
			</div>
		  </div>
		  
		  <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Foto do Conteudo (500x500)</label>
				<div class="col-sm-10">
					<input name="arquivo" type="file" required="" />	
				</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Categorias</label>
			<div class="col-sm-10">
			  <select class="form-control" name="categoria_id">
				  <option>Selecione</option>
				  <?php 
						$resultado =mysqli_query( $conectar, "SELECT * FROM categorias");
						while($dados = mysqli_fetch_assoc($resultado)){
							?>
								<option value="<?php echo $dados["id"]; ?>"><?php echo $dados["nome"];?></option>
							<?php
						}
					?>
				</select>
			</div>
		  </div>
		  
		 
		  
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-success">Cadastrar</button>
			</div>
		  </div>
		</form>
	</div>
	</div>
</div> <!-- /container -->

