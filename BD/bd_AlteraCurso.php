<?php
	include "template/topoAdm.php";
	
	echo"<table><tr>
		<form action='bd_alteraCurso.php' method='post'>
			<td style='width:100px;'>&nbsp;</td>
			<td>Pesquisa:</td>
			<td><input name='chave' type='text'></td>
			<td><input type='submit' value='Buscar'/></td>
			<td style='width:200px;'>&nbsp;</td>
		</form>
		<form action='form_CadastraCurso.php' method='post'>
			<td><input type='submit' value='Cadastrar'/></td>
		</form>
		</tr></table>";

		  $chave = trim($_POST['chave']);

		  $query = "select * from Tb_Curso where Nome_Curso LIKE '%".$chave."%'OR Sigla LIKE '%".$chave."%' OR Ano LIKE '%".$chave."%' OR Semestre LIKE '%".$chave."%' ORDER BY Cod_Curso";
		  $result = mysqli_query($db, $query);
		 
		echo "<div id='pesq'><table border='3' width='80%'>
		<tr id='ln1'><td>Nome</td><td>Sigla</td><td>Ano</td><td>Semestre</td></tr>";
			while($Curso = mysqli_fetch_assoc($result)) {
				echo "<form action='bd_alteraCurso1.php?Cod_Curso=".$Curso["Cod_Curso"]."' method='post'>";
					echo "<tr>";
					echo "<td>".$Curso["Nome_Curso"];
					echo "</td><td>".$Curso["Sigla"];
					echo "</td><td>".$Curso["Ano"];
					echo "</td><td>".$Curso["Semestre"];
					echo "</td><td><input type='submit' value='Alterar'></td>";
				echo "</form>";
				echo "<form action='bd_excluiuCurso.php?Cod_Curso=".$Curso["Cod_Curso"]."' method='post'>";
					echo "<td><input type='submit' value='Excluir'></td></tr>";
				echo "</form>";
				}

			echo "</table></div>";
		
	include "template/rodapeAdm.php"; 
?>