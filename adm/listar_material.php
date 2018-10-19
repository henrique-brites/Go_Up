<?php
	
	//$resultado=mysqli_query($conectar, "SELECT * FROM material ORDER BY 'id'");
	$resultado=mysqli_query($conectar, "SELECT m.id, m.nome, m.arquivo, t.nome as turma, s.nome as situacao FROM material m, turmas t, situacaos s WHERE m.softDelete != 1 AND m.turma_id = t.id AND m.situacao_id = s.id ORDER BY 'id'");
	$linhas=mysqli_num_rows($resultado);
?>	
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Lista de Material</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=27"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <table class="table">
		<thead>
		  <tr>
			<th>ID</th>
			<th>Nome</th>
			<th>Turma</th>
			<th>Situação</th>
			<th>Ações</th>
		  </tr>
		</thead>
		<tbody>
			<?php 
				while($linhas = mysqli_fetch_array($resultado)){

					echo "<tr>";
						echo "<td>".$linhas['id']."</td>";
						echo "<td>".$linhas['nome']."</td>";
						echo "<td>".$linhas['turma']."</td>";
						echo "<td>".$linhas['situacao']."</td>";
						?>
						<td> 
						<a href='../arquivo/<?php echo $linhas['arquivo']; ?>' target="_blank"><button type='button' class='btn btn-sm btn-success'>Visualizar Pdf</button></a>

						<a href='administrativo.php?link=28&id=<?php echo $linhas['id']; ?>'><button type='button' class='btn btn-sm btn-primary'>Visualizar</button></a>
						
						<a href='administrativo.php?link=29&id=<?php echo $linhas['id']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
						
						<a href='processa/proc_apagar_material.php?id=<?php echo $linhas['id']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
						
						<?php
					echo "</tr>";
				}
			?>
		</tbody>
	  </table>
	</div>
	</div>
</div> <!-- /container -->

