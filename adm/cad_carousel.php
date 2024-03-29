﻿
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Cadastrar Carousel</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href='administrativo.php?link=30'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>				
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <form class="form-horizontal" method="POST" action="processa/proc_cad_carousel.php" enctype="multipart/form-data">
	  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Nome do Carousel</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="nome" placeholder="Nome do Carousel">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Url</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="url" placeholder="Página de destino">
			</div>
		  </div>  
		  
		  
		  <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Foto do Carousel (1920x500)</label>
				<div class="col-sm-10">
					<input name="arquivo" type="file"/>	
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

