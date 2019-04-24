<?php
include "template/topoAdm.php";

		$query = "SELECT * FROM Tb_Aluno a
		inner join tb_usuario u on a.Cod_Usuario = u.Cod_Usuario;";
		$result = mysqli_query($db, $query);
		
		echo"<table>
			<form action='form_CadastroInscricao2.php?' method='post'>
			<tr><td>Aluno:</td><td><select name='aluno'>
					<OPTION VALUE='escolha'>Escolha</OPTION>";
					while($usuario = mysqli_fetch_assoc($result)){
								echo"<OPTION value='".$usuario['Cod_Aluno']."'";
								echo ">";
								echo $usuario['Nome_Usuario']."</OPTION>";
					}
					echo "</td><td><input type='submit' value='Consultar'/></tr>
		 </table>
		 </form>";
include "template/rodapeAdm.php";
?>