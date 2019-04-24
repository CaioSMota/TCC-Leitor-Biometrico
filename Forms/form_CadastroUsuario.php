

<?php
include "template/topoAdm.php";

		$query = "SELECT Tipo_Usuario FROM Tb_TipoUsuario order by Tipo_Usuario;";
		$result = mysqli_query($db, $query);
		
		echo"<form action='bd_CadastraUsuario.php' method='post'>
		<table>
			<tr><td>Nome:</td><td><input type='text' name='nome'/><br/></tr></td>
			<tr><td>Prontuario:</td><td><input type='text' name='prontuario'/><br/></tr></td>
			<tr><td>Sexo:</td><td><input type='radio' name='sexo' value='F' onclick='myFunction2()'/>Feminino
			<input type='radio' name='sexo' value='M' onclick='myFunction2()'/>Masculino
			<input type='radio' name='sexo' value='O' onclick='myFunction()'/>Outro</tr></td>
			<tr><td>Tipo de Usuario:</td><td><select name='tipoUsuario'>
			
					<OPTION VALUE='escolha'>Escolha</OPTION>";
					while($tipo = mysqli_fetch_assoc($result)){
						echo"<OPTION name='tipoUsuario'>".$tipo['Tipo_Usuario']."</OPTION>";
					}
	echo "</SELECT></td></tr>
			</select></tr></td>
			</br>";
	

			
	echo "<tr id = 'nSocial'><td>Nome Social</td><td><input type='text' name='nomeSocial'/></td></tr>
	<tr id = 'nSocial2'><td>Genero</td><td><input type='text' name='genero'/></td></tr>";
	
	echo"<tr><td rowspan='1' align='center'><input type='submit' value='Envia'/></tr></td>
		 </table>
		 </form>";
		 
include "template/rodapeAdm.php";
?>	

		<script>
			function myFunction() {
				document.getElementById("nSocial").style.visibility = "visible";
				document.getElementById("nSocial2").style.visibility = "visible";
			}
			function myFunction2() {
				document.getElementById("nSocial").style.visibility = "hidden";
				document.getElementById("nSocial2").style.visibility = "hidden";
			}

			myFunction2();
		
			
		</script>