<?php
	include "template/topoAdm.php";

		  $aluno = $_POST['aluno'];
		  $disciplina = $_POST['disciplina'];
		  $semestre = $_POST['semestre'];
		  $CodInscricao = $_GET['Cod_Inscricao'];
		  
		  mysqli_select_db($db,'bd_chamada');

		  $query= "DELETE From Tb_Inscricao where Cod_Inscricao='$CodInscricao'";
		  $result = mysqli_query($db,$query);
		  
		  if (mysqli_affected_rows($db)) echo "<br/>A inscricao do aluno $aluno foi deletada.</br>"; 
		  else echo mysqli_error($db).'</br>';
		  // Commit transaction
			mysqli_commit($db);
			
		echo "<form action='form_InscreverAluno.php' method='post'>
		<input type='submit' value='Retornar'/>
		</form>";
	
	include "template/rodape.php";
?>