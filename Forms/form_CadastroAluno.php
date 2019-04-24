<?php
include "template/topoAdm.php";

		$query = "SELECT * FROM Tb_Curso order by Nome_Curso;";
		$result = mysqli_query($db, $query);
		
		$query2 = "SELECT * FROM Tb_Usuario order by Cod_Usuario;";
		$result2 = mysqli_query($db, $query2);
		
		echo"<form action='bd_CadastraAluno.php' method='post'>
		<table>
			<tr><td>Aluno:</td><td><select name='aluno'>
					<OPTION VALUE='escolha'>Escolha</OPTION>";
					while($tipo = mysqli_fetch_assoc($result2)){
							if($tipo['Cod_TipoUsuario'] == 3){
								echo"<OPTION value='".$tipo['Cod_Usuario']."'>".$tipo['Nome_Usuario']."</OPTION>";
							}
					}
			
			echo "<tr><td>Curso:</td><td><select name='curso'>
					<OPTION VALUE='escolha'>Escolha</OPTION>";
					while($curso = mysqli_fetch_assoc($result)){
						echo"<OPTION value='".$curso['Cod_Curso']."'>".$curso['Nome_Curso']."</OPTION>";
					}
	echo "</SELECT></td></tr>
			</select></tr></td>
			</br>
		 <tr><td rowspan='1' align='center'><input type='submit' value='Cadastrar'/></tr></td>
		 </table>
		 </form>";
		 
include "template/rodapeAdm.php";
?>