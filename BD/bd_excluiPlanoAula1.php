<?php
	include "template/topoAdm.php";

		  $professor = $_POST['professor'];
		  $disciplina = $_POST['disciplina'];
		  $ano = $_POST['ano'];
		  $semestre = $_POST['semestre'];
		  $CodPlano = $_GET['Cod_Plano'];
		  
		  mysqli_select_db($db,'bd_chamada');

		  $query= "DELETE From Tb_Plano where Cod_Plano='$CodPlano'";
		  $result = mysqli_query($db,$query);
		  if (mysqli_affected_rows($db)) echo "<br />O plano de aula foi deletado.</br>"; 
		  else echo mysqli_error($db).'</br>';
		  // Commit transaction
			mysqli_commit($db);
			
		echo "<form action='form_PlanoAula.php' method='post'>
		<input type='submit' value='Retornar'/>
		</form>";
	
	include "template/rodape.php";
?>