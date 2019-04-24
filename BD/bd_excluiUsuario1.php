<?php
	include "template/topoAdm.php";

		  $nome = $_POST['Nome'];
		  $sexo = $_POST['Sexo'];
		  $prontuario = $_POST['Prontuario'];
		  $tipoUsuario = $_POST['tipoUsuario'];
		  $CodUsuario = $_GET['Cod_Usuario'];
		  
		  mysqli_select_db($db,'bd_chamada');
		  
		  $query= "DELETE From Tb_Genero where Cod_Usuario='$CodUsuario'";
		  $result = mysqli_query($db,$query);

		  $query= "DELETE From Tb_Usuario where Cod_Usuario='$CodUsuario'";
		  $result = mysqli_query($db,$query);
		  
		  if (mysqli_affected_rows($db)) echo "<br />O usuario $nome foi deletado.</br>"; 
		  else echo mysqli_error($db).'</br>';
		  // Commit transaction
			mysqli_commit($db);
			
		echo "<form action='form_Usuario.php' method='post'>
		<input type='submit' value='Retornar'/>
		</form>";
	
	include "template/rodape.php";
?>