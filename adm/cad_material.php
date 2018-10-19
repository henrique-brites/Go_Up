
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Cadastrar Material</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href='administrativo.php?link=26'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>				
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <form class="form-horizontal" method="POST" action="processa/proc_cad_material.php" enctype="multipart/form-data">
	  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Nome do Material</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="nome" placeholder="Nome do Material">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Descrição Curta</label>
			<div class="col-sm-10">
				<textarea class="form-control ckeditor" rows="5" name="descricao_curta" placeholder="Descrição curta do produto"></textarea>
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Descrição Longa</label>
			<div class="col-sm-10">
				<textarea class="form-control ckeditor" rows="5" name="descricao_longa" placeholder="Descrição longa do produto"></textarea>
			</div>
		  </div>
		  
		  
		  
		  
		  <!-- <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Foto do Produto (500x500)</label>
				<div class="col-sm-10">
					<input name="arquivo" type="file"/>	
				</div>
		  </div> -->
		  <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Arquivo PDF</label>
				<div class="col-sm-10">
					<input name="arquivo" type="file" required="" />	
				</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Turmas</label>
			<div class="col-sm-10">
			  <select class="form-control" name="turma_id">
				  <option>Selecione</option>
				  <?php 
						$resultado =mysqli_query($conectar, "SELECT * FROM turmas WHERE softDelete != 1");
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
			<label for="inputPassword3" class="col-sm-2 control-label">Situação</label>
			<div class="col-sm-10">
			  <select class="form-control" name="situacao_id">
				  <option>Selecione</option>
				  <?php 
						$resultado =mysqli_query($conectar, "SELECT * FROM situacaos WHERE softDelete != 1");
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

