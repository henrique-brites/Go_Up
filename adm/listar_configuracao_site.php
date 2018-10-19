
<?php
	
	$resultado=mysqli_query( $conectar, "SELECT * FROM config WHERE softDelete != 1 ORDER BY 'id'");
	$linhas=mysqli_num_rows($resultado);
?>	
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Configuração Site</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=35"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <table class="table">
		<thead>
		  <tr>
			<th>ID</th>
			<th>Titulo</th>
			<th>Sobre</th>
			<th>Home</th>
			<th>Contato</th>
			<th>Admin</th>
			<th>E-mail Padrao</th>
			<th>Cor Menu</th>
			<th>Status</th>
			<th>Ações</th>
		  </tr>
		</thead>
		<tbody>
			<?php 
				while($linhas = mysqli_fetch_array($resultado)){
					echo "<tr>";
						echo "<td>".$linhas['id']."</td>";
						echo "<td>".$linhas['titulo']."</td>";
						echo "<td>".$linhas['sobre']."</td>";
						echo "<td>".$linhas['home']."</td>";
						echo "<td>".$linhas['contato']."</td>";
						echo "<td>".$linhas['admin']."</td>";
						echo "<td>".$linhas['email']."</td>";
						echo "<td>".$linhas['cor_menu']."</td>";
						echo "<td>".$linhas['status']."</td>";
						?>
						<td> 
						<a href='administrativo.php?link=34&id=<?php echo $linhas['id']; ?>'><button type='button' class='btn btn-sm btn-primary'>Visualizar</button></a>
						
						<a href='administrativo.php?link=33&id=<?php echo $linhas['id']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
						
						<a href='processa/proc_apagar_configuracao_site.php?id=<?php echo $linhas['id']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
						
						<?php
					echo "</tr>";
				}
			?>
		</tbody>
	  </table>
	</div>
	</div>
</div> <!-- /container -->

