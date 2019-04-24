<?php
	include "template/topoAdm.php";
	
	echo"<table><tr>
		<form action='bd_alteraUsuario.php' method='post'>
			<td style='width:100px;'>&nbsp;</td>
			<td>Pesquisa:</td>
			<td><input name='chave' type='text'></td>
			<td><input type='submit' value='Buscar'/></td>
			<td style='width:200px;'>&nbsp;</td>
		</form>
		<form action='form_CadastraUsuario.php' method='post'>
			<td><input type='submit' value='Cadastrar'/></td>
		</form>
		</tr></table>";

		  $chave = trim($_POST['chave']);

		  $query = "select * from Tb_Usuario u inner join Tb_TipoUsuario tu on u.Cod_TipoUsuario = tu.Cod_TipoUsuario where Nome_Usuario LIKE '%".$chave."%'OR Prontuario LIKE '%".$chave."%' OR Tipo_Usuario LIKE '%".$chave."%' ORDER BY Cod_Usuario ";

		  $result = mysqli_query($db, $query);
		 
		echo "<div id='pesq'><table border='3' width='80%'>
		<tr id='ln1'><td>Prontuario</td><td>Nome</td><td>Sexo</td><td>Tipo de Usuario</td></tr>";
			while($usuario = mysqli_fetch_assoc($result)) { 
				echo "<form action='bd_alteraUsuario1.php?Cod_Usuario=".$usuario["Cod_Usuario"]."' method='post'>";
					echo "<tr>";
					echo "<td>".$usuario["Prontuario"];
					echo "</td><td>".$usuario["Nome_Usuario"];
					echo "</td><td>".$usuario["Sexo"];
					echo "</td><td>".$usuario["Tipo_Usuario"];
					echo "</td><td><input type='submit' value='Alterar'></td>";
				echo "</form>";
				echo "<form action='bd_excluiuUsuario.php?Cod_Usuario=".$usuario["Cod_Usuario"]."' method='post'>";
					echo "<td><input type='submit' value='Excluir'></td></tr>";
				echo "</form>";
				}

			echo "</table></div>";
		
	include "template/rodapeAdm.php"; 
?>