<?php
//WHERE softDelete != 1
	//Pesquisar o id dos conteudos em destaque no nivel 1 página principal
	$resultado_cont_dest=mysqli_query( $conectar, "SELECT * FROM destaques_conteudos WHERE softDelete != 1 AND nivel_um='1' ORDER BY ordem ASC");
	$linhas_cont_dest=mysqli_num_rows($resultado_cont_dest);
	$contr_sob = $linhas_cont_dest;
?>	
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Conteudos em destaque nivel 1</h1>
  </div>
  <div class="row">
	<div class="col-md-12">
	  <table class="table">
		<thead>
		  <tr>
			<th>ID Conteudo</th>
			<th>Titulo</th>
			<th>Categoria</th>
			<th>Ordem</th>
			<th>Ações</th>
		  </tr>
		</thead>
		<tbody>
			<?php 
				$contr_ord = 1;
				while($linhas_cont_dest = mysqli_fetch_array($resultado_cont_dest)){
					//id do conteudo na tabela conteudo em destaque
					$conteudo_id = $linhas_cont_dest['conteudo_id'];
					$conteudo_dest_id = $linhas_cont_dest['id'];
					
					//Selecionar os dados do conteudo no BD
					$resultado_cont=mysqli_query( $conectar, "SELECT * FROM conteudos WHERE id='$conteudo_id' LIMIT 1");
					$linhas_cont=mysqli_fetch_assoc($resultado_cont);
					
					echo "<tr>";
						echo "<td>".$linhas_cont['id']."</td>";
						echo "<td>".$linhas_cont['titulo']."</td>";
						echo "<td>".$linhas_cont['categoria_id']."</td>";						
						echo "<td>".$linhas_cont_dest['ordem']."</td>";						
						?>
						<td> 
						<?php if($contr_sob != $contr_ord){ ?>
							<a href='processa/proc_edit_ordem_nivel_um1.php?situacao=1&id=<?php echo $conteudo_dest_id; ?>'><button type='button' class='btn btn-sm btn-primary'><span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span></button></a>
						<?php }else{ ?>	
							<a href='#'><button type='button' class='btn btn-sm btn-primary'><span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span></button></a>
						<?php } ?>
						<?php if($contr_ord != 1){ ?>
							<a href='processa/proc_edit_ordem_nivel_um1.php?situacao=2&id=<?php echo $conteudo_dest_id; ?>'><button type='button' class='btn btn-sm btn-primary'><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span></button></a>		
						<?php }else{ ?>	
							<a href='#'><button type='button' class='btn btn-sm btn-primary'><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span></button></a>
						<?php } ?>	
						<a href='processa/proc_apagar_conteudo_destaque.php?id=<?php echo $conteudo_dest_id ?>'><button type='button' class='btn btn-sm btn-danger'>Retirar</button></a>
						
						<?php
					echo "</tr>";
					$contr_ord = $contr_ord + 1; 
				}
			?>
		</tbody>
	  </table>
	</div>
	</div>
	
	<?php
	//Pesquisar o id dos conteudos em destaque no nivel 2 página principal
	$resultado_cont_dest=mysqli_query( $conectar, "SELECT * FROM destaques_conteudos WHERE softDelete != 1 AND nivel_dois='1' ORDER BY 'id'");
	$linhas_cont_dest=mysqli_num_rows($resultado_cont_dest);	
	?>
	<div class="page-header">
	<h1>Conteudos em destaque nivel 2</h1>
  </div>
  <div class="row">
	<div class="col-md-12">
	  <table class="table">
		<thead>
		  <tr>
			<th>ID Conteudo</th>
			<th>Titulo</th>
			<th>Categoria</th>
			<th>Ações</th>
		  </tr>
		</thead>
		<tbody>
			<?php 
				while($linhas_cont_dest = mysqli_fetch_array($resultado_cont_dest)){
					//id do conteudo na tabela conteudo em destaque
					$conteudo_id = $linhas_cont_dest['conteudo_id'];
					$conteudo_dest_id = $linhas_cont_dest['id'];
					
					//Selecionar os dados do conteudo no BD
					$resultado_cont=mysqli_query( $conectar, "SELECT * FROM conteudos WHERE id='$conteudo_id' LIMIT 1");
					$linhas_cont=mysqli_fetch_assoc($resultado_cont);
					echo "<tr>";
						echo "<td>".$linhas_cont['id']."</td>";
						echo "<td>".$linhas_cont['titulo']."</td>";
						echo "<td>".$linhas_cont['categoria_id']."</td>";
						?>
						<td> 
						<a href='administrativo.php?link=38&id=<?php echo $linhas_cont['id']; ?>'><button type='button' class='btn btn-sm btn-primary'>Visualizar</button></a>
						
						<a href='administrativo.php?link=37&id=<?php echo $linhas_cont['id']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
						
						<a href='processa/proc_apagar_conteudo_destaque.php?id=<?php echo $conteudo_dest_id ?>'><button type='button' class='btn btn-sm btn-danger'>Retirar</button></a>
						
						<?php
					echo "</tr>";
				}
			?>
		</tbody>
	  </table>
	</div>
	</div>
</div> <!-- /container -->

