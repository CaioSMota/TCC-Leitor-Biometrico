<?php
	include "template/topoAdm.php";
	
		$CodDisciplina = $_GET['Cod_Disciplina'];
		
		  $query = "select * from Tb_Disciplina where Cod_Disciplina = $CodDisciplina ";
		  $result = mysqli_query($db, $query);
	      $Disciplina = mysqli_fetch_array($result);
		   echo "<form action='bd_excluiDisciplina1.php?Cod_Disciplina=".$Disciplina["Cod_Disciplina"]."' method='post'>
		   <table>
			<tr><td>Nome</td><td><input type='text' name='nome' value='$Disciplina[3]' readonly /></td></tr>
			<tr><td>Carga Horaria</td><td><input type='text' name='cargaHoraria' value='$Disciplina[1]' readonly /> </tr>
			<tr><td>Quantidade de Aulas</td><td><input type='text' name='qtdAulas' value='$Disciplina[2]'readonly /></td></tr>
			<tr><td>Curso</td><td><input type='text' name='curso' value='$Disciplina[4]'readonly /></td></tr>";
			
			echo"</td><td><input type='submit' value='Excluir'></td>
		 </form>";
		  echo "<form action='form_Disciplina.php' method='post'>
		  <td><input type='submit' value='Cancelar'></td></tr>
		  </form>
		</table>";

	include "template/rodapeAdm.php";
?>