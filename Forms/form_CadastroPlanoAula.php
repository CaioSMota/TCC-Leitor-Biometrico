<?php
include "template/topoAdm.php";

		$query = "select * from Tb_Usuario";
		$result = mysqli_query($db, $query);
		
		$query2 = "select * from Tb_Disciplina d
		where Cod_Disciplina not in (select Cod_Disciplina from Tb_Plano)";
		$result2 = mysqli_query($db, $query2);
		
		$query3 = "select * from Tb_Plano";
		$result3 = mysqli_query($db, $query3);
		
		//$Plano = mysqli_fetch_array($result3);
		
		echo"<form action='bd_CadastraPlanoAula.php' method='post'>
		<table>
			<tr><td>Professor:</td><td><select name='professor'>
					<OPTION VALUE='escolha'>Escolha</OPTION>";
					while($usuario = mysqli_fetch_array($result)){
						if($usuario['Cod_Usuario'] == 2){
						echo"<OPTION value='";
						echo $usuario['Cod_Usuario']. "'";
						echo ">".$usuario['Nome_Usuario']."</OPTION>";
						}
					}
			echo "<tr><td>Disciplina:</td><td><select name='disciplina'>
					<OPTION VALUE='escolha'>Escolha</OPTION>";
					while($Disciplina = mysqli_fetch_array($result2)){
						echo"<OPTION value='";
						echo $Disciplina['Cod_Disciplina']. "'";
						echo ">".$Disciplina['Nome_Disciplina']."</OPTION>";
					}
			echo "<tr><td>Ano:</td><td><input type='text' name='ano'/><br/></tr></td>
			<tr><td>Semestre:</td><td><input type='text' name='semestre'/><br/></tr></td>";
	echo "<tr><td rowspan='1' align='center'><input type='submit' value='Envia'/></tr></td>
		 </table>
		 </form>";	
include "template/rodapeAdm.php";
?>
