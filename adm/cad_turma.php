
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Cadastrar Turma</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href='administrativo.php?link=14'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>				
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <form class="form-horizontal" method="POST" action="processa/proc_cad_turma.php">
	  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Nome Turma</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="nome" placeholder="Nome Turma">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Slug</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="slug" placeholder="Nome da turma tudo minúsculo">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Palavra chave</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="tag" placeholder="Palavra chave">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Descrição máximo 180 letras</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="description" placeholder="Descrição">
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

