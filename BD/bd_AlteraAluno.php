<?php
	include "template/topoAdm.php";
	
	echo"<table><tr>
		<form action='bd_alteraAluno.php' method='post'>
			<td style='width:100px;'>&nbsp;</td>
			<td>Pesquisa:</td>
			<td><input name='chave' type='text'></td>
			<td><input type='submit' value='Buscar'/></td>
			<td style='width:200px;'>&nbsp;</td>
		</form>
		<form action='form_CadastraAluno.php' method='post'>
			<td><input type='submit' value='Cadastrar'/></td>
		</form>
		</tr></table>";

		  $chave = trim($_POST['chave']);

		  $query = "select * from Tb_Aluno a inner join Tb_usuario u on a.Cod_Usuario = u.Cod_Usuario inner join Tb_curso c on a.Cod_Curso = c.Cod_Curso where Nome_Usuario LIKE '%".$chave."%'OR Prontuario LIKE '%".$chave."%' OR Nome_Curso LIKE '%".$chave."%' ORDER BY Cod_Aluno";
		  $result = mysqli_query($db, $query);
		 
		echo "<div id='pesq'>
				<table border='3' width='80%'>
					<tr id='ln1'><td>Prontuario</td><td>Nome</td><td>Curso</td></tr>";
		
			while($aluno = mysqli_fetch_assoc($result)) { 
				echo "<form action='bd_alteraAluno1.php?Cod_Aluno=".$aluno["Cod_Aluno"]."' method='post'>";
						echo "<tr>";
						echo "</td><td>".$aluno["Prontuario"];
						echo "</td><td>".$aluno["Nome_Usuario"];
						echo "</td><td>".$aluno["Nome_Curso"];
						echo "</td><td><input type='submit' value='Alterar'></td>";
						echo "</form>";
						echo "<form action='bd_excluiAluno.php?Cod_Aluno=".$aluno["Cod_Aluno"]."' method='post'>";
							echo "<td><input type='submit' value='Excluir'></td></tr>";
						echo "</form>";
						
					}

				echo "</table></div>";
				
	include "template/rodapeAdm.php";
?>