<?php
	include "template/topoAdm.php";
	
		$CodCurso = $_GET['Cod_Curso'];
		
		  $query = "select * from Tb_Curso where Cod_Curso = $CodCurso ";
		  $result = mysqli_query($db, $query);
		  $num_results = mysqli_num_rows($result);
	      $Curso = mysqli_fetch_array($result);
		   echo "<form action='bd_excluiCurso1.php?Cod_Curso=".$Curso["Cod_Curso"]."' method='post'>
		   <table>
			<tr><td>Nome</td><td><input type='text' name='Nome' value='$Curso[1]' readonly /></td></tr>
			<tr><td>Sigla</td><td><input type='text' name='Sigla' value='$Curso[2]' readonly /> </tr>
			<tr><td>Ano</td><td><input type='text' name='Ano' value='$Curso[3]'readonly /></td></tr>
			<tr><td>Semestre</td><td><input type='text' name='Semestre' value='$Curso[4]'readonly /></td></tr>";
			
			echo"</td><td><input type='submit' value='Excluir'></td>
		 </form>";
		  echo "<form action='form_Curso.php' method='post'>
		  <td><input type='submit' value='Cancelar'></td></tr>
		  </form>
		</table>";

	include "template/rodapeAdm.php";
?>