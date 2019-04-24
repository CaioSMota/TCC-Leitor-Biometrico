<?php
	include "template/topoAdm.php";

		  $nome = $_POST['nome'];
		  $cargaHoraria = $_POST['cargaHoraria'];
		  $qtdAulas = $_POST['qtdAulas'];
		  $CodDisciplina = $_GET['Cod_Disciplina'];
		  $curso = $_POST['curso'];
		  
		  mysqli_select_db($db,'bd_chamada');

		  $query= "update Tb_Disciplina set Nome_Disciplina='$nome', Carga_Horaria='$cargaHoraria', Qtd_Aulas='$qtdAulas', Cod_Curso='$curso' where Cod_Disciplina='$CodDisciplina'";
		  $result = mysqli_query($db,$query);
		  if (mysqli_affected_rows($db)) echo "<br />O Curso $nome foi alterado.</br>"; 
		  else echo mysqli_error($db).'</br>';
		  // Commit transaction
			mysqli_commit($db);
			
		echo "<form action='form_Disciplina.php' method='post'>
		<input type='submit' value='Retornar'/>
		</form>";
	
	include "template/rodape.php";
?>