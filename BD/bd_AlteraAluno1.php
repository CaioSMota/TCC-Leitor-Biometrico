<?php
	include "template/topoAdm.php";
	
		$CodAluno = $_GET['Cod_Aluno'];
		
		  $query = "select * from Tb_Aluno a inner join Tb_usuario u on a.Cod_Usuario = u.Cod_Usuario inner join Tb_curso c on a.Cod_Curso = c.Cod_Curso where Cod_Aluno = $CodAluno";
		  $result = mysqli_query($db, $query);
		  
		  $query2 = "select * from Tb_Curso";
		  $result2 = mysqli_query($db, $query2);
		  
		  $num_results = mysqli_num_rows($result);
	      $Aluno = mysqli_fetch_array($result);
		   echo "<form action='bd_alteraAluno2.php?Cod_Aluno=".$Aluno["Cod_Aluno"]."' method='post'>
		   <table>
			<tr><td>Prontuario</td><td><input type='text' name='prontuario' value='$Aluno[8]' readonly /></td></tr>
			<tr><td>Nome</td><td><input type='text' name='nome' value='$Aluno[5]' readonly /> </tr>
			<tr><td>Curso:</td><td><select name='curso'>
					<OPTION VALUE='escolha'>Escolha</OPTION>";
					while($curso = mysqli_fetch_array($result2)){
						echo"<OPTION value='";
						echo $curso['Cod_Curso']. "'";
						if ($curso['Cod_Curso'] == $Aluno["Cod_Curso"]){
							echo " selected ";
						}
						echo ">".$curso['Nome_Curso']."</OPTION>";
					}
		 echo"</SELECT></td></tr>
		 <td><input type='submit' value='Alterar'></td>
		 </form>
		 
		<form action='form_Aluno.php' method='post'>
		  <td><input type='submit' value='Cancelar'></td></tr>
		  </form>
		  
		</table>
		</table>";
	include "template/rodapeAdm.php";
?>