<?php
include "template/topoAdm.php";

		//$query = "select * from Tb_Aula a inner join tb_plano p on a.Cod_Plano = p.Cod_Plano inner join tb_usuario u on p.Cod_Usuario = u.Cod_Usuario";
		$query = "select * from Tb_Disciplina";
		$result = mysqli_query($db, $query);
		
		echo"<form action='bd_CadastraAula.php' method='post'>
		<table>
			<tr><td>Conteudo:</td><td><input type='text' name='conteudo'/><br/></tr></td>
			<tr><td>Data:</td><td><input type='text' name='data'/> (ano-mes-dia)<br/></tr></td>
			<tr><td>Semana:</td><td><input type='text' name='semana'/><br/></tr></td>
			<tr><td>Disciplina:</td><td><select name='plano'>
					<OPTION VALUE='escolha'>Escolha</OPTION>";
					while($disc = mysqli_fetch_array($result)){
						echo"<OPTION value='";
						echo $disc['Cod_Disciplina']. "'";
							echo ">".$disc['Nome_Disciplina']."</OPTION>";
					}
		 echo"</SELECT></td></tr>";
	echo "<tr><td rowspan='1' align='center'><input type='submit' value='Envia'/></tr></td>
		 </table>
		 </form>";	
include "template/rodapeAdm.php";
?>