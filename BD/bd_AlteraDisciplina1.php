<?php
	include "template/topoAdm.php";
	
		$CodDisciplina = $_GET['Cod_Disciplina'];
		
		  $query = "select * from Tb_Disciplina u inner join Tb_Curso c on u.Cod_Curso = c.Cod_Curso where Cod_Disciplina = $CodDisciplina";
		  $query2 = "select * from Tb_Curso";
		  $result = mysqli_query($db, $query);
		  $result2 = mysqli_query($db, $query2);
	      $Disciplina = mysqli_fetch_array($result);

		   
		   
		   echo "<form action='bd_alteraDisciplina2.php?Cod_Disciplina=".$Disciplina["Cod_Disciplina"]."' method='post'>
		   <table>
			<tr><td>Nome</td><td><input type='text' name='nome' value='$Disciplina[3]'/></td></tr>
			<tr><td>Carga Horaria</td><td><input type='text' name='cargaHoraria' value='$Disciplina[1]' /> </tr>
			<tr><td>Quantidade de Aulas</td><td><input type='text' name='qtdAulas' value='$Disciplina[2]'/></td></tr>
			<tr><td>Curso:</td><td><select name='curso'>
					<OPTION VALUE='escolha'>Escolha</OPTION>";
					while($curso = mysqli_fetch_array($result2)){
						echo"<OPTION value='";
						echo $curso['Cod_Curso']. "'";
						if ($curso['Cod_Curso'] == $Disciplina["Cod_Curso"]){
							echo " selected ";
						}
						echo ">".$curso['Nome_Curso']."</OPTION>";
					}
		 echo"</SELECT></td></tr>
		 <td><input type='submit' value='Alterar'></td>
		 </form>";
		  echo "<form action='form_Disciplina.php' method='post'>
		  <td><input type='submit' value='Cancelar'></td></tr>
		  </form>
		</table>";
	include "template/rodapeAdm.php";
?>