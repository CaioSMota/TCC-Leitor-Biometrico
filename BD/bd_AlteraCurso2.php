<?php
	include "template/topoAdm.php";

		  $nome = $_POST['nome'];
		  $sigla = $_POST['sigla'];
		  $ano = $_POST['ano'];
		  $semestre = $_POST['semestre'];
		  $CodCurso = $_GET['Cod_Curso'];
		  
		  if (!$nome || !$sigla || !$ano || !$semestre)
		  {
			 echo 'Nenhuma alteração foi realizada<br />';
			 exit;
		  }
		  
		  mysqli_select_db($db,'bd_chamada');

		  $query= "update Tb_Curso set Nome_Curso='$nome', Sigla='$sigla', Ano='$ano', Semestre='$semestre' where Cod_Curso='$CodCurso'";
		  $result = mysqli_query($db,$query);
		  if (mysqli_affected_rows($db)) echo "<br />O Curso $nome foi alterado.</br>"; 
		  else echo mysqli_error($db).'</br>';
		  // Commit transaction
			mysqli_commit($db);
			
		echo "<form action='form_Curso.php' method='post'>
		<input type='submit' value='Retornar'/>
		</form>";
	
	include "template/rodape.php";
?>