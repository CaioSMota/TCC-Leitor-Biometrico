<?php
	include "template/topoAdm.php";
	
	echo"<table><tr>
		<form action='bd_alteraAula.php' method='post'>
			<td style='width:100px;'>&nbsp;</td>
			<td>Pesquisa:</td>
			<td><input name='chave' type='text'></td>
			<td><input type='submit' value='Buscar'/></td>
			<td style='width:200px;'>&nbsp;</td>
		</form>
		<form action='form_CadastraAula.php' method='post'>
			<td><input type='submit' value='Cadastrar'/></td>
		</form>
		</tr></table>";

		  $chave = trim($_POST['chave']);

		  $query = "select * from Tb_Aula a inner join Tb_Plano p on a.Cod_Plano = p.Cod_Plano 
		  inner join Tb_Disciplina d on p.Cod_Disciplina = d.Cod_Disciplina 
		  where Conteudo LIKE '%".$chave."%'OR Data LIKE '%".$chave."%' OR Num_Semana LIKE '%".$chave."%' 
		  OR Nome_Disciplina LIKE '%".$chave."%' ORDER BY Cod_Aula";
		  
		  $result = mysqli_query($db, $query);
		 
		echo "<div id='pesq'><table border='3' width='80%'>
		<tr id='ln1'><td>Conteudo</td><td>Data</td><td>Semana</td><td>Plano de Aula</td></tr>";
			while($Aula = mysqli_fetch_assoc($result)) {
				echo "<form action='bd_alteraAula1.php?Cod_Aula=".$Aula["Cod_Aula"]."' method='post'>";
					echo "<tr>";
					echo "<td>".$Aula["Conteudo"];
					echo "</td><td>".$Aula["Data"];
					echo "</td><td>".$Aula["Num_Semana"];
					echo "</td><td>".$Aula["Nome_Disciplina"];
					echo "</td><td><input type='submit' value='Alterar'></td>";
				echo "</form>";
				echo "<form action='bd_excluiAula.php?Cod_Aula=".$Aula["Cod_Aula"]."' method='post'>";
					echo "<td><input type='submit' value='Excluir'></td></tr>";
				echo "</form>";
				}

			echo "</table></div>";
		
	include "template/rodapeAdm.php"; 
?>