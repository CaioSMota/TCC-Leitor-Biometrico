<?php
	include "template/topo.php";
	session_start();

		echo"<table><tr>
		
		<form action='bd_frequencia.php' method='post' >
			<td style='width:100px;'>&nbsp;</td>
			<td>Pesquisa:</td>
			<td><input name='chave' type='text'></td>
			<td><input type='submit' value='Buscar'/></td>
			<td style='width:200px;'>&nbsp;</td>
		</form></table>";
			
				$query = "SELECT * FROM bd_chamada.tb_frequencia f
					inner join tb_aluno a on f.Cod_Aluno = a.Cod_Aluno
					inner join Tb_Usuario u on a.Cod_Usuario = u.Cod_Usuario
					inner join Tb_Disciplina d on f.Cod_Disciplina = d.Cod_Disciplina				
					where Nome_Usuario ='". $_SESSION['nome']."'";
					
				//inner join Tb_Frequencia f on a.Cod_Aluno = f.Cod_Aluno
				//inner join Tb_Genero g on u.Cod_Usuario = g.Cod_Usuario
				
				$result = mysqli_query($db, $query);
				$num_results = mysqli_num_rows($result);
	
				echo "<div id='pesq'>
					<table border='3' width='80%' >
					<tr id='ln1'><td>Disciplina</td><td>Frequencia</td></tr>";
	
				while($aluno = mysqli_fetch_assoc($result)) { 
					echo "<tr>";
					echo "<td>".$aluno["Nome_Disciplina"];
					echo "</td><td>".$aluno["Faltas"];
				}

				echo "</table>
				</div>";
				
	include "template/rodape.php";
?>
