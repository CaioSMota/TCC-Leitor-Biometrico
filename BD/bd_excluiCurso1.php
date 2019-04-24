<?php
	include "template/topoAdm.php";

		  $nome = $_POST['Nome'];
		  $sigla = $_POST['Sigla'];
		  $ano = $_POST['Ano'];
		  $semestre = $_POST['Semestre'];
		  $CodCurso = $_GET['Cod_Curso'];
		  
		  mysqli_select_db($db,'bd_chamada');

		  $query= "DELETE From Tb_Curso where Cod_Curso='$CodCurso'";
		  $result = mysqli_query($db,$query);
		  if (mysqli_affected_rows($db)) echo "<br />O Curso $nome foi deletado.</br>"; 
		  else echo mysqli_error($db).'</br>';
		  // Commit transaction
			mysqli_commit($db);
			
		echo "<form action='form_Curso.php' method='post'>
		<input type='submit' value='Retornar'/>
		</form>";
	
	include "template/rodape.php";
?>