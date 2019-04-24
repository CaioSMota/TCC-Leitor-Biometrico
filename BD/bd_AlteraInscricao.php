<?php
	include "template/topoAdm.php";
	
	echo"<table><tr>
		<form action='bd_alteraInscricao.php' method='post'>
			<td style='width:100px;'>&nbsp;</td>
			<td>Pesquisa:</td>
			<td><input name='chave' type='text'></td>
			<td><input type='submit' value='Buscar'/></td>
			<td style='width:200px;'>&nbsp;</td>
		</form>
		<form action='form_CadastroInscricao.php' method='post'>
			<td><input type='submit' value='Cadastrar'/></td>
		</form>
		</tr></table>";

		  $chave = trim($_POST['chave']);

		  $query = "Select * from Tb_Inscricao i inner join Tb_Aluno a on i.Cod_Aluno = a.Cod_Aluno 
				inner join Tb_Usuario u on a.Cod_Usuario = u.Cod_Usuario
				inner join Tb_Disciplina d on i.Cod_Disciplina = d.Cod_Disciplina
				where Nome_Usuario LIKE '%".$chave."%'OR Nome_Disciplina LIKE '%".$chave."%' OR Ano LIKE '%".$chave."%' OR Semestre LIKE '%".$chave."%' ORDER BY Cod_Inscricao";
		  $result = mysqli_query($db, $query);
		 
		echo "<div id='pesq'>
				<table border='3' width='80%'>
					<tr id='ln1'><td>Aluno</td><td>Disciplina</td><td>Ano</td><td>Semestre</td></tr>";
	
				while($Inscricao = mysqli_fetch_assoc($result)) { 
				echo "<form action='bd_alteraInscricao1.php?Cod_Inscricao=".$Inscricao["Cod_Inscricao"]."' method='post'>";
						echo "<tr>";
						echo "</td><td>".$Inscricao["Nome_Usuario"];
						echo "</td><td>".$Inscricao["Nome_Disciplina"];
						echo "</td><td>".$Inscricao["Ano"];
						echo "</td><td>".$Inscricao["Semestre"];
						echo "</form>";
						echo "<form action='bd_excluiInscricao.php?Cod_Inscricao=".$Inscricao["Cod_Inscricao"]."' method='post'>";
							echo "<td><input type='submit' value='Excluir'></td></tr>";
						echo "</form>";
						
					}
			echo "</table></div>";
		
	include "template/rodapeAdm.php"; 
?>