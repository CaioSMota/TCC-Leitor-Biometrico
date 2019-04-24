<?php
	include "template/topoAdm.php";
	
		$CodUsuario = $_GET['Cod_Usuario'];
		
		  $query = "select * from Tb_Usuario where Cod_Usuario = $CodUsuario ";
		  $result = mysqli_query($db, $query);
		  $num_results = mysqli_num_rows($result);
	      $usuario = mysqli_fetch_array($result);
		   echo "<form action='bd_excluiUsuario1.php?Cod_Usuario=".$usuario["Cod_Usuario"]."' method='post'>
		   <table>
			<tr><td>Prontuario</td><td><input type='text' name='Prontuario' value='$usuario[4]' readonly /></td></tr>
			<tr><td>Nome</td><td><input type='text' name='Nome' value='$usuario[1]' readonly /> </tr>
			<tr><td>Sexo</td><td><input type='text' name='Sexo' value='$usuario[3]'readonly /></td></tr>
			<tr><td>Tipo de Usuario</td><td><input type='text' name='tipoUsuario' value='$usuario[5]'readonly /></td></tr>";
			
			echo"</td><td><input type='submit' value='Excluir'></td>
		 </form>";
		  echo "<form action='form_Usuario.php' method='post'>
		  <td><input type='submit' value='Cancelar'></td></tr>
		  </form>
		</table>";

	include "template/rodapeAdm.php";
?>