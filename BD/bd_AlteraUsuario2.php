<?php
	include "template/topoAdm.php";

		  $nome = $_POST['Nome'];
		  $sexo = $_POST['sexo'];
		  $tipoUsuario = $_POST['tipoUsuario'];
		  $prontuario = $_POST['Prontuario'];
		  $CodUsuario = $_POST['Cod_Usuario'];
		  
		  if (!$nome || !$sexo || !$tipoUsuario || !$prontuario)
		  {
			 echo 'Nenhuma alteração foi realizada<br />';
			 exit;
		  }
		  
		  mysqli_select_db($db,'bd_chamada');

		  $query= "update Tb_Usuario set Nome_Usuario='$nome', Sexo='$sexo', Prontuario='$prontuario' where Cod_Usuario='$CodUsuario'";
		  $result = mysqli_query($db,$query);
		  if (mysqli_affected_rows($db)) echo "<br />O usuario $nome foi alterado.</br>"; 
		  else echo mysqli_error($db).'</br>';
		  // Commit transaction
			mysqli_commit($db);
			
		echo "<form action='form_Usuario.php' method='post'>
		<input type='submit' value='Retornar'/>
		</form>";
	
	include "template/rodape.php";
?>