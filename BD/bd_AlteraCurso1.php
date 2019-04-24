<?php
	include "template/topoAdm.php";
	
		$CodCurso = $_GET['Cod_Curso'];
		
		  $query = "select * from Tb_Curso where Cod_Curso = $CodCurso";
		  $result = mysqli_query($db, $query);
		  $num_results = mysqli_num_rows($result);
	      $Curso = mysqli_fetch_array($result);
		   echo "<form action='bd_alteraCurso2.php?Cod_Curso=".$Curso["Cod_Curso"]."' method='post'>
		   <table>
			<tr><td>Nome</td><td><input type='text' name='nome' value='$Curso[1]'/></td></tr>
			<tr><td>Sigla</td><td><input type='text' name='sigla' value='$Curso[2]' /> </tr>
			<tr><td>Ano</td><td><input type='text' name='ano' value='$Curso[3]'/></td></tr>
			<tr><td>Semestre</td><td><input type='text' name='semestre' value='$Curso[4]'/></td></tr>";
		 echo"</td><td><input type='submit' value='Alterar'></td>
		 </form>";
		  echo "<form action='form_Curso.php' method='post'>
		  <td><input type='submit' value='Cancelar'></td></tr>
		  </form>
		</table>";
	include "template/rodapeAdm.php";
?>