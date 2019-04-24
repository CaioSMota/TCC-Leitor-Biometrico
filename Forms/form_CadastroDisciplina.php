<?php
include "template/topoAdm.php";
	
		$query = "SELECT * FROM Tb_Disciplina order by Nome_Disciplina;";
		$result = mysqli_query($db, $query);
		
		$query2 = "SELECT Nome_Curso FROM Tb_Curso order by Nome_Curso;";
		$result2 = mysqli_query($db, $query2);
		
		echo"<form action='bd_CadastraDisciplina.php' method='post'>
		<table>
			<tr><td>Nome:</td><td><input type='text' name='nome'/>
			<tr><td>Carga Horaria:</td><td><input type='text' name='cargaHoraria'/>
			<tr><td>Quantidade de Aulas:</td><td><input type='text' name='qtdAulas'/>
			
			<tr><td>Curso:</td><td><select name='curso'>
					<OPTION VALUE='escolha'>Escolha</OPTION>";
					while($curso = mysqli_fetch_assoc($result2)){
						echo"<OPTION name='curso'>".$curso['Nome_Curso']."</OPTION>";
					}
	echo "</SELECT></td></tr>
			</select></tr></td>
			</br>
		 <tr><td rowspan='1' align='center'><input type='submit' value='Cadastrar'/></tr></td>
		 </table>
		 </form>";
		 
include "template/rodapeAdm.php";
?>