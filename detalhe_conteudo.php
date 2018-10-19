<?php
	//recuperar o id passado pela url
	$url = (isset($_GET['url'])) ? $_GET['url']:'';	
	$explode = explode('/',$url);
	$conteudo_id = $explode[1];
	
	//Consultar os conteudos conforme a categoria
	$resultado_cont=mysqli_query($conectar, "SELECT * FROM conteudos WHERE id='$conteudo_id' LIMIT 1");
	$linhas_cont=mysqli_fetch_assoc($resultado_cont);
	$imagem = pg.'/foto/'.$linhas_cont['imagem']; 
	//echo $linhas_cont['titulo'];	
?>
	<!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">
		<h1><?php echo $linhas_cont['titulo']; ?></h1>
      
      


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">      

      <div class="row featurette">
        <!--<div class="col-md-7 col-md-push-5">
           <h2 class="featurette-heading"><?php echo $linhas_cont['titulo']; ?></h2>
          <p class="lead"><?php echo $linhas_cont['descricao_curta']; ?></p> 
        </div>-->
        <!-- <div class="col-md-5 col-md-pull-7 "> -->
          <img class="featurette-image img-responsive center-block" src="<?php echo $imagem; ?>" alt="Generic placeholder image">
        </div>
      <!-- </div> -->

      <hr class="featurette-divider">

      <div class="row featurette center-block ">
        <div class="col-md-12 center-block ">
          <p class="lead center-block"><?php echo $linhas_cont['descricao_longa']; ?></p>
        </div>
        
      </div>

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->

     

      <footer>
        <p>&copy; Henrique Brites <?php echo date("Y") ?></p>
      </footer>
    </div> <!-- /container -->