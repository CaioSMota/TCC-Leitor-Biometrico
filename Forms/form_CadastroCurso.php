<?php
include "template/topoAdm.php";
		
		echo"<form action='bd_CadastraCurso.php' method='post'>
		<table>
			<tr><td>Nome:</td><td><input type='text' name='nome'/><br/></tr></td>
			<tr><td>Sigla:</td><td><input type='text' name='sigla'/><br/></tr></td>
			<tr><td>Ano:</td><td><input type='text' name='ano'/><br/></tr></td>
			<tr><td>Semestre:</td><td><input type='text' name='semestre'/><br/></tr></td>";
	echo "<tr><td rowspan='1' align='center'><input type='submit' value='Envia'/></tr></td>
		 </table>
		 </form>";	
include "template/rodapeAdm.php";
?>
