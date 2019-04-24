<?php
	include "template/topoAdm.php";

		  $professor = $_POST['professor'];
		  $disciplina = $_POST['disciplina'];
		  $ano = $_POST['ano'];
		  $semestre = $_POST['semestre'];
		  $CodPlano = $_GET['Cod_Plano'];
		  
		  if ($professor == "escolha" || $disciplina  == "escolha"|| !$ano || !$semestre)
		  {
			 echo 'Nenhuma alteração foi realizada<br />';
			 exit;
		  }
		  
		  mysqli_select_db($db,'bd_chamada');

		  $query= "update Tb_Plano set Ano='$ano', Cod_Disciplina='$disciplina', Semestre='$semestre', Cod_Usuario='$professor' where Cod_Plano='$CodPlano'";
		  $result = mysqli_query($db,$query);
		  if (mysqli_affected_rows($db)) echo "<br />O plano de aula foi alterado.</br>"; 
		  else echo mysqli_error($db).'</br>';
		  // Commit transaction
			mysqli_commit($db);
			
		echo "<form action='form_PlanoAula.php' method='post'>
		<input type='submit' value='Retornar'/>
		</form>";
	
	include "template/rodape.php";
?>