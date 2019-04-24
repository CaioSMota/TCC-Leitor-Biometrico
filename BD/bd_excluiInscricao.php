<?php
	include "template/topoAdm.php";
	
		$CodInscricao = $_GET['Cod_Inscricao'];
		
		  $query = "select Cod_Inscricao, Nome_Usuario, Nome_Disciplina, Semestre from bd_chamada.Tb_Inscricao i
			inner join Tb_Aluno a on i.Cod_Aluno = a.Cod_Aluno
			inner join Tb_Usuario u on a.Cod_Usuario = u.Cod_Usuario
			inner join Tb_Disciplina d on i.Cod_Disciplina = d.Cod_Disciplina
			where Cod_Inscricao = $CodInscricao";  
		$result = mysqli_query($db, $query);
		  
	      $Inscricao = mysqli_fetch_array($result);
		   echo "<form action='bd_excluiInscricao1.php?Cod_Inscricao=".$Inscricao["Cod_Inscricao"]."' method='post'>
		   <table>
			<tr><td>Aluno</td><td><input type='text' name='aluno' value='$Inscricao[1]' readonly /></td></tr>
			<tr><td>Disciplina</td><td><input type='text' name='disciplina' value='$Inscricao[2]' readonly /> </tr>
			<tr><td>Semestre</td><td><input type='text' name='semestre' value='$Inscricao[3]'readonly /></td></tr>";
			
			echo"</td><td><input type='submit' value='Excluir'></td>
		 </form>";
		  echo "<form action='form_InscreverAluno.php' method='post'>
		  <td><input type='submit' value='Cancelar'></td></tr>
		  </form>
		</table>";

	include "template/rodapeAdm.php";
?>