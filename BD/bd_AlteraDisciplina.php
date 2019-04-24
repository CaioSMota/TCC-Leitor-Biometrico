<?php
	include "template/topoAdm.php";
	
	echo"<table><tr>
		<form action='bd_alteraDisciplina.php' method='post'>
			<td style='width:100px;'>&nbsp;</td>
			<td>Pesquisa:</td>
			<td><input name='chave' type='text'></td>
			<td><input type='submit' value='Buscar'/></td>
			<td style='width:200px;'>&nbsp;</td>
		</form>
		<form action='form_CadastroDisciplina.php' method='post'>
			<td><input type='submit' value='Cadastrar'/></td>
		</form>
		</tr></table>";

		  $chave = trim($_POST['chave']);

		  $query = "select * from Tb_Disciplina u inner join Tb_Curso c on u.Cod_Curso = c.Cod_Curso where Nome_Disciplina LIKE '%".$chave."%'OR Carga_Horaria LIKE '%".$chave."%' OR Qtd_Aulas LIKE '%".$chave."%' OR Nome_Curso LIKE '%".$chave."%' ORDER BY Cod_Disciplina";
		  $result = mysqli_query($db, $query);
		 
		echo "<div id='pesq'><table border='3' width='80%'>
				<tr id='ln1'><td>Nome</td><td>Carga Horaria</td><td>Quantidade de Aulas</td><td>Curso</td></tr>";
				while($disciplina = mysqli_fetch_assoc($result)) {
					echo "<form action='bd_alteraDisciplina1.php?Cod_Disciplina=".$disciplina["Cod_Disciplina"]."' method='post'>";
						echo "<tr>";
						echo "<td>".$disciplina["Nome_Disciplina"];
						echo "</td><td>".$disciplina["Carga_Horaria"];
						echo "</td><td>".$disciplina["Qtd_Aulas"];
						echo "</td><td>".$disciplina["Nome_Curso"];
						echo "<input name='Nome_Curso' type='hidden' value=".$disciplina["Nome_Curso"].">";
						echo "</td><td><input type='submit' value='Alterar'></td>";
					echo "</form>";
					echo "<form action='bd_excluiDisciplina.php?Cod_Disciplina=".$disciplina["Cod_Disciplina"]."' method='post'>";
						echo "<td><input type='submit' value='Excluir'></td></tr>";
					echo "</form>";
				}

			echo "</table></div>";
		
	include "template/rodapeAdm.php"; 
?>