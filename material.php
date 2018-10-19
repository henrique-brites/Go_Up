<?php
	//recuperar o id passado pela url
	$url = (isset($_GET['url'])) ? $_GET['url']:'';	
	$explode = explode('/',$url);
	$turma = $explode[1];
	
	//Consultar a turma conforme o id
	$resultado_turma=mysqli_query($conectar, "SELECT * FROM turmas WHERE softDelete != 1 AND id='$turma' LIMIT 1");
	$linhas_turma=mysqli_fetch_assoc($resultado_turma);
	
	//Consultar os material conforme a turma
	$resultado_material=mysqli_query($conectar, "SELECT * FROM material WHERE softDelete != 1 AND turma_id='$turma' ORDER BY 'id'");
	$linhas_material=mysqli_num_rows($resultado_material);
	
?>
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">
		<h1><?php echo $linhas_turma['nome']; ?></h1>
      <!-- Three columns of text below the carousel -->
      <div class="row">
		<?php 
			if($linhas_material > 0){
				
			while($linhas_material = mysqli_fetch_array($resultado_material)){
				$imagem = pg.'/foto/'.$linhas_material['imagem']; 
				$arquivo = pg.'/arquivo/'.$linhas_material['arquivo'];
			?>
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
				  <a href="<?php echo $arquivo; ?>" download><img class="img-circle" src="<?php echo $imagem; ?>" alt="Generic placeholder image" width="140" height="140"></a>
				  <h2><?php echo $linhas_material['nome']; ?></h2>
				  <p><?php echo $linhas_material['descricao_curta']; ?></p>
				  <!-- <p><a class="btn btn-default" href="<?php echo pg.'/detalhe_produto/'.$linhas_material['id'].'/'.$linhas_material['slug']; ?>" role="button">Mais detalhes &raquo;</a></p> -->
				</div><!-- /.col-lg-4 -->     
			<?php } 
		}else{
			echo "<h2>Nenhum Material</h2>";
		}?>

      </div><!-- /.row -->


      

      <footer>
        <p>&copy; Henrique Brites <?php echo date("Y") ?></p>
      </footer>
    </div> <!-- /container -->


