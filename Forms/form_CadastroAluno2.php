<?php
include "template/topoAdm.php";

		$codAluno = $_GET['Cod_Aluno'];
		
		$query = "SELECT * FROM Tb_Aluno a 
		inner join Tb_Usuario u on a.Cod_Usuario = u.Cod_Usuario
		inner join Tb_Curso c on a.Cod_Curso = c.Cod_Curso
		where Cod_Aluno =  $codAluno;";
		$result = mysqli_query($db, $query);
		
		
		
			$port = fopen('COM6', 'w');
			fwrite($port, '$codAluno');
			fclose($port);
		
		echo"
		<table>
			<tr><td>Cadastro da Digital do Aluno: </td><td>";
					while($tipo = mysqli_fetch_assoc($result)){
								echo $tipo['Nome_Usuario'];
								
					
					echo"</tr><form action='form_Aluno.php' method='post'>
				<tr><input type='submit' value='Voltar'/></tr>
				</form>";
					}

		 echo "</table>
		 </form>";
			
		
		 
include "template/rodapeAdm.php";
?>