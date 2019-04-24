<?php
	include "template/topoAdm.php";
	
		$CodUsuario = $_GET['Cod_Usuario'];
		
		  $query = "select * from Tb_Usuario where Cod_Usuario = $CodUsuario";
		  $result = mysqli_query($db, $query);
		  $query2 = "SELECT Tipo_Usuario FROM Tb_TipoUsuario order by Tipo_Usuario;";
			$result2 = mysqli_query($db, $query2);
		  $num_results = mysqli_num_rows($result);
	      $usuario = mysqli_fetch_array($result);
		   echo "<form action='bd_alteraUsuario2.php' method='post'>
		   <table>
		    <tr><td>Codigo de Usuario</td><td><input type='text' name='Cod_Usuario' value='$usuario[0]' readonly /></td></tr>
			<tr><td>Prontuario</td><td><input type='text' name='Prontuario' value='$usuario[4]'/></td></tr>
			<tr><td>Nome</td><td><input type='text' name='Nome' value='$usuario[1]' /> </tr>
			<tr><td>Sexo:</td><td><input type='radio' name='sexo' value='F' onclick='myFunction2()'/>Feminino
			<input type='radio' name='sexo' value='M' onclick='myFunction2()'/>Masculino
			<input type='radio' name='sexo' value='O' onclick='myFunction()'/>Outro</tr></td>";

			echo "<tr><td>Tipo de Usuario</td><td><input type='text' name='tipoUsuario' value='$usuario[5]' readonly /></td></tr>";
			echo "<tr id = 'nSocial'><td>Nome Social</td><td><input type='text' name='nomeSocial'/></td></tr>
			<tr id = 'nSocial2'><td>Genero</td><td><input type='text' name='genero'/></td></tr>";
			
		 echo"</td><td><input type='submit' value='Alterar'></td>
		 </form>";
		  echo "<form action='form_Usuario.php' method='post'>
		  <td><input type='submit' value='Cancelar'></td></tr>
		  </form>
		</table>";
	include "template/rodapeAdm.php";
	
	
	//<tr><td>Sexo</td><td><input type='text' name='Sexo' value='$usuario[3]'/></td></tr>
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