<?php
	include "template/topoAdm.php";
	
		$CodPlano = $_GET['Cod_Plano'];
		
		  $query = "select * from Tb_Plano a inner join Tb_Usuario u on a.Cod_Usuario = u.Cod_Usuario inner join Tb_Disciplina d on a.Cod_Disciplina = d.Cod_Disciplina where Cod_Plano = $CodPlano";
		  $result = mysqli_query($db, $query);
		  
		  $query2 = "select * from Tb_Usuario";
		  $result2 = mysqli_query($db, $query2); 
		  
		  $query3 = "select * from Tb_Disciplina";
		  $result3 = mysqli_query($db, $query3);
		  
		  $num_results = mysqli_num_rows($result);
	      $Plano = mysqli_fetch_array($result);
		   echo "<form action='bd_alteraPlanoAula2.php?Cod_Plano=".$Plano["Cod_Plano"]."' method='post'>
		   <table>
			<tr><td>Professor:</td><td><select name='professor'>
					<OPTION VALUE='escolha'>Escolha</OPTION>";
					while($usuario = mysqli_fetch_array($result2)){
						if($usuario['Cod_Usuario'] == 2){
						echo"<OPTION value='";
						echo $usuario['Cod_Usuario']. "'";
						if ($Plano['Cod_Usuario'] == $usuario['Cod_Usuario']){
							echo " selected ";
						}
						echo ">".$usuario['Nome_Usuario']."</OPTION>";
						}
					}
		 echo"</SELECT></td></tr>
			<tr><td>Disciplina:</td><td><select name='disciplina'>
					<OPTION VALUE='escolha'>Escolha</OPTION>";
					while($Disciplina = mysqli_fetch_array($result3)){
						echo"<OPTION value='";
						echo $Disciplina['Cod_Disciplina']. "'";
						if ($Disciplina['Cod_Disciplina'] == $Plano['Cod_Disciplina']){
							echo " selected ";
						}
						echo ">".$Disciplina['Nome_Disciplina']."</OPTION>";
					}
		echo "<tr><td>Ano</td><td><input type='text' name='ano' value='$Plano[1]'/></td></tr>
			<tr><td>Semestre</td><td><input type='text' name='semestre' value='$Plano[3]'/></td></tr>";
		 echo"</td><td><input type='submit' value='Alterar'></td>
		 </form>";
		  echo "<form action='form_PlanoAula.php' method='post'>
		  <td><input type='submit' value='Cancelar'></td></tr>
		  </form>
		</table>";
	include "template/rodapeAdm.php";
?>