<?php
	include "template/topoAdm.php";
	
		$CodAluno = $_GET['Cod_Aluno'];
		
		  $query = "select Cod_Aluno, Prontuario, Nome_Usuario, Nome_Curso from Tb_Aluno a inner join Tb_Curso c on a.Cod_Curso = c.Cod_Curso inner join Tb_Usuario u on a.Cod_Usuario = u.Cod_Usuario where Cod_Aluno = $CodAluno ";
		  $result = mysqli_query($db, $query);
	      $Aluno = mysqli_fetch_array($result);
		   echo "<form action='bd_excluiAluno1.php?Cod_Aluno=".$Aluno["Cod_Aluno"]."' method='post'>
		   <table>
			<tr><td>Prontuario</td><td><input type='text' name='prontuario' value='$Aluno[1]' readonly /></td></tr>
			<tr><td>Nome</td><td><input type='text' name='nome' value='$Aluno[2]' readonly /> </tr>
			<tr><td>Curso</td><td><input type='text' name='curso' value='$Aluno[3]'readonly /></td></tr>";
			
			echo"</td><td><input type='submit' value='Excluir'></td>
		 </form>";
		  echo "<form action='form_Aluno.php' method='post'>
		  <td><input type='submit' value='Cancelar'></td></tr>
		  </form>
		</table>";

	include "template/rodapeAdm.php";
?>