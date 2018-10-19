<?php
	$id = $_GET['id'];
	//Executa consulta
	$result = mysqli_query( $conectar, "SELECT * FROM config WHERE id = '$id' LIMIT 1");
	$resultado = mysqli_fetch_assoc($result);
?>
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Editar Configuração Site</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href='administrativo.php?link=32'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>
			
			<a href='processa/proc_apagar_configuracao_site.php?id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <form class="form-horizontal" method="POST" action="processa/proc_edit_configuracao_site.php">
	  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Titulo</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="titulo" placeholder="Titulo" value="<?php echo $resultado['titulo']; ?>">
			</div>
		  </div>

		  <?php $sobre = $resultado['sobre'];?>
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Sobre*</label>
			<div class="col-sm-10">
			  <select class="form-control" name="sobre">
				  			<option>Selecione</option>
				  			<option value="1"<?php if($sobre == 1){ echo 'selected'; } ?> >Mostrar</option>
				  			<option value="0"<?php if($sobre == 0){ echo 'selected'; } ?> >Ocultar</option>
							
				</select>
			</div>
		  </div>

		  <?php $home = $resultado['home'];?>
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Home</label>
			<div class="col-sm-10">
			  <select class="form-control" name="home">
				  			<option>Selecione</option>
				  			<option value="1"<?php if($home == 1){ echo 'selected'; } ?> >Mostrar</option>
				  			<option value="0"<?php if($home == 0){ echo 'selected'; } ?> >Ocultar</option>
							
				</select>
			</div>
		  </div>	

		  <?php $contato = $resultado['contato'];?>
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Contato**</label>
			<div class="col-sm-10">
			  <select class="form-control" name="contato">
				  			<option>Selecione</option>
				  			<option value="1"<?php if($contato == 1){ echo 'selected'; } ?> >Mostrar</option>
				  			<option value="0"<?php if($contato == 0){ echo 'selected'; } ?> >Ocultar</option>
							
				</select>
			</div>
		  </div>	

		  <?php $admin = $resultado['admin'];?>
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Admin</label>
			<div class="col-sm-10">
			  <select class="form-control" name="admin">
				  			<option>Selecione</option>
				  			<option value="1"<?php if($admin == 1){ echo 'selected'; } ?> >Mostrar</option>
				  			<option value="0"<?php if($admin == 0){ echo 'selected'; } ?> >Ocultar</option>
							
				</select>
			</div>
		  </div>

		   <?php $status = $resultado['status'];?>
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Status</label>
			<div class="col-sm-10">
			  <select class="form-control" name="status">
				  			<option>Selecione</option>
				  			<option value="1"<?php if($status == 1){ echo 'selected'; } ?> >Ativar</option>
				  			<option value="0"<?php if($status == 0){ echo 'selected'; } ?> >Desativado</option>
							
				</select>
			</div>
		  </div>

		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">E-mail Padrão</label>
			<div class="col-sm-10">
			  <input type="email" class="form-control" name="email_padrao" placeholder="E-mail Padrão" value="<?php echo $resultado['email']; ?>">
			</div>
		  </div>				 

		 <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Cor Menu</label>
			<div class="col-sm-10">
			  <input type="color" class="form-control" name="cor_menu" placeholder="Cor do Menu" value="<?php echo $resultado['cor_menu']; ?>">
			</div>
		  </div>
		  
		 
		  <input type="hidden" name="id" value="<?php echo $resultado['id']; ?>">
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-success">Editar</button>
			</div>
		  </div>
		</form>
	</div>
	</div>
</div> <!-- /container -->

