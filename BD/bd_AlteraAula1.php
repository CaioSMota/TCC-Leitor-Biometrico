<?php
	include "template/topoAdm.php";
	
		$CodAula = $_GET['Cod_Aula'];
		
		  $query = "select * from Tb_Aula where Cod_Aula = $CodAula";
		  $result = mysqli_query($db, $query);
		  $num_results = mysqli_num_rows($result);
	      $Aula = mysqli_fetch_array($result);
		   echo "<form action='bd_alteraAula2.php?Cod_Aula=".$Aula["Cod_Aula"]."' method='post'>
		   <table>
			<tr><td>Conteudo</td><td><input type='text' name='conteudo' value='$Aula[1]'/></td></tr>
			<tr><td>Data</td><td><input type='text' name='data' value='$Aula[2]' /> </tr>
			<tr><td>Semana</td><td><input type='text' name='semana' value='$Aula[3]'/></td></tr>";
		 echo"</td><td><input type='submit' value='Alterar'></td>
		 </form>";
		  echo "<form action='form_Aula.php' method='post'>
		  <td><input type='submit' value='Cancelar'></td></tr>
		  </form>
		</table>";
	include "template/rodapeAdm.php";
?>