<?php	
	$resultado=mysqli_query( $conectar, "SELECT * FROM categorias ORDER BY 'id'");
	$linhas=mysqli_num_rows($resultado);
	$menus=mysqli_query(  $conectar, "SELECT * FROM turmas  WHERE situacao = 1 AND softDelete != 1 ORDER BY 'id'");
	$linhas_menus=mysqli_num_rows($menus);
?>	


	  <!-- Inicio Menu -->
        <nav class="navbar navbar-inverse navbar-fixed-top header-menu" style="background-color: <?=$config['cor_menu'];?>">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- <a class="navbar-brand" href="index.html"><img src="imagens/logo-site.png"></a> -->
                    <a class="navbar-brand" href="<?php echo pg.'/home'; ?>"><?=$config['titulo'];?></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <?php
	   						if($config['home'] == 1){
	   							echo "<li><a href='".pg."/home'>Home</a></li>";
	   						}
						?>
						<li class="dropdown">
		  					<a href="material.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Turmas <span class="caret"></span></a>
		  					<ul class="dropdown-menu">
								<?php 
									//lista as categorias de produto
									while($linhas_menus = mysqli_fetch_array($menus)){
								?>
									<li>
										<a href="<?php echo pg.'/material/'.$linhas_menus['id'].'/'.$linhas_menus['slug']; ?>"><?php echo $linhas_menus['nome']; ?></a>
									</li>	
									<?php } //fim lista as categorias de produto?>			
		  					</ul>
						</li> 
                        <?php
					   		if($config['sobre'] == 1){
					   			echo "<li><a href='".pg."/sobre'>Sobre</a></li>";
					   		}
					   		if($config['contato'] == 1){
					   			echo "<li><a href='".pg."/contato'>Contato</a></li>";
					   		}
						
							if($config['admin'] == 1){
								echo "<li><a href='".pg."/adm/index.php' target='_blank'>Admin</a></li>";
							}
						?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Fim Menu -->