<?php
	include "template/topoAdm.php";
	
		$CodPlano = $_GET['Cod_Plano'];
		
		  $query = "select Nome_Usuario, Nome_Disciplina, Ano, Semestre, Cod_Plano from Tb_Plano  a inner join Tb_Usuario u on a.Cod_Usuario = u.Cod_Usuario inner join Tb_Disciplina d on a.Cod_Disciplina = d.Cod_Disciplina where Cod_Plano = $CodPlano ";
		  $result = mysqli_query($db, $query);
		  $num_results = mysqli_num_rows($result);
	      $Plano = mysqli_fetch_array($result);
		   echo "<form action='bd_excluiPlanoAula1.php?Cod_Plano=".$Plano["Cod_Plano"]."' method='post'>
		   <table>
			<tr><td>Professor</td><td><input type='text' name='professor' value='$Plano[0]' readonly /></td></tr>
			<tr><td>Disciplina</td><td><input type='text' name='disciplina' value='$Plano[1]' readonly /> </tr>
			<tr><td>Ano</td><td><input type='text' name='ano' value='$Plano[2]'readonly /></td></tr>
			<tr><td>Semestre</td><td><input type='text' name='semestre' value='$Plano[3]'readonly /></td></tr>";
			
			echo"</td><td><input type='submit' value='Excluir'></td>
		 </form>";
		  echo "<form action='form_PlanoAula.php' method='post'>
		  <td><input type='submit' value='Cancelar'></td></tr>
		  </form>
		</table>";

	include "template/rodapeAdm.php";
?>