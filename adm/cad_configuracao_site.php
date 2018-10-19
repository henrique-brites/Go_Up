
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Cadastrar Configuração Site</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href='administrativo.php?link=32'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>				
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <form class="form-horizontal" method="POST" action="processa/proc_cad_configuracao_site.php">
	  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Titulo</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="titulo" placeholder="Titulo">
			</div>
		  </div>

		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Sobre*</label>
			<div class="col-sm-10">
			  <select class="form-control" name="sobre">
				  			<option>Selecione</option>
				  			<option value="1"> Mostrar</option>
				  			<option value="0"> Ocultar</option>
							
				</select>
			</div>
		  </div>

		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Home</label>
			<div class="col-sm-10">
			  <select class="form-control" name="home">
				  			<option>Selecione</option>
				  			<option value="1"> Mostrar</option>
				  			<option value="0"> Ocultar</option>
							
				</select>
			</div>
		  </div>

		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Contato**</label>
			<div class="col-sm-10">
			  <select class="form-control" name="contato">
				  			<option>Selecione</option>
				  			<option value="1"> Mostrar</option>
				  			<option value="0"> Ocultar</option>
							
				</select>
			</div>
		  </div>

		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Admin</label>
			<div class="col-sm-10">
			  <select class="form-control" name="admin">
				  			<option>Selecione</option>
				  			<option value="1"> Mostrar</option>
				  			<option value="0"> Ocultar</option>
							
				</select>
			</div>
		  </div>

		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">E-mail Padrão</label>
			<div class="col-sm-10">
			  <input type="email" class="form-control" name="email_padrao" placeholder="Digite um E-mail " ">
			</div>
		  </div>

		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Status</label>
			<div class="col-sm-10">
			  <select class="form-control" name="status">
				  			<option>Selecione</option>
				  			<option value="1"> Ativar</option>
				  			<option value="0"> Desativado</option>
							
				</select>
			</div>
		  </div>
		  
		  		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Cor Menu</label>
			<div class="col-sm-10">
			  <input type="color" class="form-control" name="cor_menu" placeholder="Escolha uma cor" ">
			</div>
		  </div>	  
		  
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-success">Cadastrar</button>
			</div>
			<span>* Não Implantado ainda</span>
			<span>** Só Lista a mensa falta os Cruds</span>
		  </div>
		</form>
	</div>
	</div>
</div> <!-- /container -->

