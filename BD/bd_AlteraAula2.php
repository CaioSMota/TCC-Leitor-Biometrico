<?php
	include "template/topoAdm.php";

		  $conteudo = $_POST['conteudo'];
		  $data = $_POST['data'];
		  $semana = $_POST['semana'];
		  $CodAula = $_GET['Cod_Aula'];
		  
		  if (!$conteudo || !$data || !$semana)
		  {
			 echo 'Nenhuma alteração foi realizada<br />';
			 exit;
		  }
		  
		  mysqli_select_db($db,'bd_chamada');

		  $query= "update Tb_Aula set Conteudo='$conteudo', Data='$data', Num_Semana='$semana' where Cod_Aula='$CodAula'";
		  $result = mysqli_query($db,$query);
		  if (mysqli_affected_rows($db)) echo "<br />A Aula foi alterada.</br>"; 
		  else echo mysqli_error($db).'</br>';
		  // Commit transaction
			mysqli_commit($db);
			
		echo "<form action='form_Aula.php' method='post'>
		<input type='submit' value='Retornar'/>
		</form>";
	
	include "template/rodape.php";
?>