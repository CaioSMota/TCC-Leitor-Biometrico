<?php
	include "template/topoAdm.php";
	session_start();

		echo"<table><tr>
		<form action='bd_alteraCurso.php' method='post'>
			<td style='width:100px;'>&nbsp;</td>
			<td>Pesquisa:</td>
			<td><input name='chave' type='text'></td>
			<td><input type='submit' value='Buscar'/></td>
			<td style='width:200px;'>&nbsp;</td>
		</form>
		<form action='form_CadastroCurso.php' method='post'>
			<td><input type='submit' value='Cadastrar'/></td>
		</form>
		</tr></table>";
			
				$query = "select * from Tb_Curso";
				$result = mysqli_query($db, $query);
				$num_results = mysqli_num_rows($result);
	
				echo "<div id='pesq'><table border='3' width='80%'>
					<tr id='ln1'><td>Nome</td><td>Sigla</td><td>Ano</td><td>Semestre</td></tr>";
	
				while($curso = mysqli_fetch_assoc($result)) { 
				echo "<form action='bd_alteraCurso1.php?Cod_Curso=".$curso["Cod_Curso"]."' method='post'>";
					echo "<tr>";
					echo "<td>".$curso["Nome_Curso"];
					echo "</td><td>".$curso["Sigla"];
					echo "</td><td>".$curso["Ano"];
					echo "</td><td>".$curso["Semestre"];
					echo "</td><td><input type='submit' value='Alterar'></td>";
				echo "</form>";
				echo "<form action='bd_excluiCurso.php?Cod_Curso=".$curso["Cod_Curso"]."' method='post'>";
					echo "<td><input type='submit' value='Excluir'></td></tr>";
				echo "</form>";
				}

				echo "</table></div>";
				
	include "template/rodapeAdm.php";
?>
