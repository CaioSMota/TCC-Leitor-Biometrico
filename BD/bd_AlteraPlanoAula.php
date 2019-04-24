<?php
	include "template/topoAdm.php";
	
	echo"<table><tr>
		<form action='bd_alteraPlanoAula.php' method='post'>
			<td style='width:100px;'>&nbsp;</td>
			<td>Pesquisa:</td>
			<td><input name='chave' type='text'></td>
			<td><input type='submit' value='Buscar'/></td>
			<td style='width:200px;'>&nbsp;</td>
		</form>
		<form action='form_CadastraPlanoAula.php' method='post'>
			<td><input type='submit' value='Cadastrar'/></td>
		</form>
		</tr></table>";

		  $chave = trim($_POST['chave']);

		  $query = "select * from Tb_Plano a inner join Tb_Usuario u on a.Cod_Usuario = u.Cod_Usuario inner join Tb_Disciplina d on a.Cod_Disciplina = d.Cod_Disciplina where Nome_Usuario LIKE '%".$chave."%'OR Nome_Disciplina LIKE '%".$chave."%' OR Ano LIKE '%".$chave."%' OR Semestre LIKE '%".$chave."%' ORDER BY Cod_Plano";
		  $result = mysqli_query($db, $query);
		 
		echo "<div id='pesq'><table border='3' width='80%'>
		<tr id='ln1'><td>Professor</td><td>Disciplina</td><td>Ano</td><td>Semestre</td></tr>";
			while($Plano = mysqli_fetch_assoc($result)) {
				echo "<form action='bd_alteraPlanoAula1.php?Cod_Plano=".$Plano["Cod_Plano"]."' method='post'>";
					echo "<tr>";
					echo "<td>".$Plano["Nome_Usuario"];
					echo "</td><td>".$Plano["Nome_Disciplina"];
					echo "</td><td>".$Plano["Ano"];
					echo "</td><td>".$Plano["Semestre"];
					echo "</td><td><input type='submit' value='Alterar'></td>";
				echo "</form>";
				echo "<form action='bd_excluiPlanoAula.php?Cod_Plano=".$Plano["Cod_Plano"]."' method='post'>";
					echo "<td><input type='submit' value='Excluir'></td></tr>";
				echo "</form>";
				}

			echo "</table></div>";
		
	include "template/rodapeAdm.php"; 
?>