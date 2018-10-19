<?php
  
  $resultado=mysqli_query($conectar, "SELECT * FROM carousels ORDER BY ordem asc LIMIT 4");
  $linhas=mysqli_num_rows($resultado);
  $contr_sob = $linhas;
?>  
  <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
    <?php 
    $controle = 1;
    while($linhas = mysqli_fetch_array($resultado)){
      $imagem = pg.'/imagens/'.$linhas['imagem']; 
      
      if($controle == 1){ ?>
        <div class="item active">
           <a href="<?php echo $linhas['url'];?>"><img class="first-slide center-block" src="<?php echo $imagem;?>" alt="<?php echo $linhas['nome'];?>"></a> 
          <!--<img class="first-slide center-block" src="<?php echo $imagem;?>" alt="First slide">-->
          <div class="container">
            <div class="carousel-caption">
              <h1><?php echo $linhas['nome'];?></h1>
              <p></p>
              <p><a class="btn btn-lg btn-primary" href="<?php echo $linhas['url'];?>" role="button">Saiba mais</a></p>
            </div>
          </div>
        </div>
      <?php }elseif($controle == 2){?>
        <div class="item">
          <a href="<?php echo $linhas['url'];?>"><img class="second-slide center-block" src="<?php echo $imagem;?>" alt="<?php echo $linhas['nome'];?>"></a>
           <!--<img class="second-slide center-block" src="<?php echo $imagem;?>" alt="First slide">-->
          <div class="container">
            <div class="carousel-caption">
              <h1><?php echo $linhas['nome'];?></h1>
              <p></p>
              <p><a class="btn btn-lg btn-primary" href="<?php echo $linhas['url'];?>" role="button">Saiba mais</a></p>
            </div>
          </div>
        </div>
      <?php }elseif($controle == 3){?>
        <div class="item">
          <a href="<?php echo $linhas['url'];?>"><img class="third-slide center-block" src="<?php echo $imagem;?>" alt="<?php echo $linhas['nome'];?>"></a>
          <!--<img class="third-slide center-block" src="<?php echo $imagem;?>" alt="First slide">-->
          <div class="container">
            <div class="carousel-caption">
              <h1><?php echo $linhas['nome'];?></h1>
              <p></p>
              <p><a class="btn btn-lg btn-primary" href="<?php echo $linhas['url'];?>" role="button">Saiba mais</a></p>
            </div>
          </div>
        </div>
      <?php }
      $controle = $controle + 1;
    } ?>
      </div>
      
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->
  
 















      <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
  <?php
  //Pesquisar o id dos conteudos em destaque no nivel 1 página principal
  $resultado_cont = mysqli_query($conectar, "SELECT * FROM conteudos WHERE softDelete != 1  ORDER BY 1 ASC");
  $linhas_cont = mysqli_num_rows($resultado_cont);
  
  ?>
    <div class="container marketing">
    <h1>Conteudos </h1>
      <!-- Three columns of text below the carousel -->
      <div class="row">
    <?php 
      while($linhas_cont = mysqli_fetch_array($resultado_cont)){ 
        //id do conteudo na tabela conteudo em destaque
        $conteudo = $linhas_cont['id'];
        
        
        
        $imagem = pg.'/foto/'.$linhas_cont['imagem']; 
        ?>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
          <img class="img-circle" src="<?php echo $imagem; ?>" alt="Generic placeholder image" width="140" height="140">
          <h2><?php 
          $texto=$linhas_cont['titulo'];

  $tam = strlen($texto);
  $max = 60;
  if($tam > $max){
  $texto = substr_replace($texto, " ...", $max, $tam - $max);
  }
          echo $texto; ?></h2>
          <!-- <p><?php echo $linhas_cont['descricao_curta']; ?></p> -->
          <p><a class="btn btn-default" href="<?php echo pg.'/detalhe_conteudo/'.$linhas_cont['id'].'/'.$linhas_cont['slug']; ?>" role="button">Mais detalhes &raquo;</a></p>
        </div><!-- /.col-lg-4 -->   
      <?php } ?>
      </div><!-- /.row -->





      <footer>
        <p>&copy; Henrique Brites <?php echo date("Y") ?></p>
      </footer>
    </div> <!-- /container -->

