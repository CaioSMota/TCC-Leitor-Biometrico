<?php
include "template/topoAdm.php";


		$aluno = $_POST['aluno'];
		
		$query = "SELECT * FROM Tb_Aluno a
		inner join tb_usuario u on a.Cod_Usuario = u.Cod_Usuario;";
		$result = mysqli_query($db, $query);

		$query2 = "SELECT * FROM bd_chamada.tb_Aluno a
				inner join tb_Curso c on a.Cod_Curso = c.Cod_Curso
				inner join tb_disciplina d on d.Cod_Curso = c.Cod_Curso
				where Cod_Aluno = '".$aluno."'";		
		
		$result2 = mysqli_query($db, $query2);
		
		echo"<table>
			<form action='form_CadastroInscricao2.php' method='post'>
			<input type='hidden' name='codigoaluno' value='$aluno'> 
			<tr><td>Aluno:</td><td><select name='aluno'>
					<OPTION VALUE='escolha'>Escolha</OPTION>";
					while($usuario = mysqli_fetch_assoc($result)){
								echo"<OPTION value='".$usuario['Cod_Aluno']."'";
								if ($usuario['Cod_Aluno'] == $aluno){									
									echo " selected ";
								}
								echo ">";
								echo $usuario['Nome_Usuario']."</OPTION>";
					}
					echo "</td><td><input type='submit' value='Consultar'/></tr>
					</form>
					
					
					<form action='bd_CadastraInscricao.php' method='post'>
					<input type='hidden' name='codigoaluno' value='$aluno'> 
					";
			echo "<tr><td>disciplina(s):</td><td>
				<select name='disciplina'>
					<option value='escolha'>Escolha</option>";
					while($disciplina = mysqli_fetch_assoc($result2)){
						echo "<option value='";
						echo $disciplina['Cod_Disciplina'];
						echo "'>".$disciplina['Nome_Disciplina']."</option>";
					}
					echo "</select></td>";

	echo "<tr><td rowspan='1' align='center'><input type='submit' value='Envia'/></tr></td>
		 </table>
		 </form>";	
include "template/rodapeAdm.php";
?>