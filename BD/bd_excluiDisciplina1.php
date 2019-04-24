<?php
	include "template/topoAdm.php";

		  $nome = $_POST['nome'];
		  $cargaHoraria = $_POST['cargaHoraria'];
		  $qtdAulas = $_POST['qtdAulas'];
		  $curso = $_POST['curso'];
		  $CodDisciplina = $_GET['Cod_Disciplina'];
		  
		  mysqli_select_db($db,'bd_chamada');

		  $query= "DELETE From Tb_Disciplina where Cod_Disciplina='$CodDisciplina'";
		  $result = mysqli_query($db,$query);
		  if (mysqli_affected_rows($db)) echo "<br />A Disciplina $nome foi deletada.</br>"; 
		  else echo mysqli_error($db).'</br>';
		  // Commit transaction
			mysqli_commit($db);
			
		echo "<form action='form_Disciplina.php' method='post'>
		<input type='submit' value='Retornar'/>
		</form>";
	
	include "template/rodape.php";
?>