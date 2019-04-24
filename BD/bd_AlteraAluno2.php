<?php
	include "template/topoAdm.php";

		  $nome = $_POST['nome'];
		  $prontuario = $_POST['prontuario'];
		  $curso = $_POST['curso'];
		  $CodAluno = $_GET['Cod_Aluno'];
		  
		  $query = "select * from Tb_curso";
		  $result = mysqli_query($db, $query);
		  
		  mysqli_select_db($db,'bd_chamada');

		  $query= "update Tb_Aluno set Cod_Curso='$curso' where Cod_Aluno='$CodAluno'";
		  $result = mysqli_query($db,$query);
		  if (mysqli_affected_rows($db)) echo "<br />O Aluno $nome foi alterado.</br>"; 
		  else echo mysqli_error($db).'</br>';
		  // Commit transaction
			mysqli_commit($db);
			
		echo "<form action='form_Aluno.php' method='post'>
		<input type='submit' value='Retornar'/>
		</form>";
	
	include "template/rodape.php";
?>