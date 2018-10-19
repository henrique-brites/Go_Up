<!-- Inicio navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top"  style="background-color: <?=$config['cor_menu'];?>">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="administrativo.php"><?=$config['titulo'];?></a>
	</div>
	<div id="navbar" class="navbar-collapse collapse">
	  <ul class="nav navbar-nav">            
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuário <span class="caret"></span></a>
		  <ul class="dropdown-menu">
			<li><a href="administrativo.php?link=2">Listar</a></li>
			<li><a href="administrativo.php?link=3">Cadastrar</a></li>                
			<li><a href="administrativo.php?link=18">Nivel de Acesso</a></li>   
			<li><a href="administrativo.php?link=36">Mensagens</a></li>    
		  </ul>
		</li>

		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Conteudo <span class="caret"></span></a>
		  <ul class="dropdown-menu">
			<li><a href="administrativo.php?link=7">Listar Categoria </a></li>
			<li><a href="administrativo.php?link=10">Listar Conteudo</a></li>     
			<!-- <li><a href="administrativo.php?link=37">Conteudo Destaque</a></li> 			 -->
		  </ul>
		</li>

		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Material <span class="caret"></span></a>
		  <ul class="dropdown-menu">
			<li><a href="administrativo.php?link=14">Listar Turmas </a></li>
			<li><a href="administrativo.php?link=22">Situação Material</a></li>
			<li><a href="administrativo.php?link=26">Listar Material</a></li> 			
		  </ul>
		</li>

		
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Carousel <span class="caret"></span></a>
		  <ul class="dropdown-menu">
			<li><a href="administrativo.php?link=30">Listar Carousel</a></li> 
		  </ul>
		</li>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuração <span class="caret"></span></a>
		  <ul class="dropdown-menu">
		  	<li><a href="administrativo.php?link=32">Configuração Site</a></li>
			
		  </ul>
		</li>
		<li><a href="sair.php">Sair</a></li>
	  </ul>
	</div><!--/.nav-collapse -->
  </div>
</nav>
<!-- Fim navbar -->