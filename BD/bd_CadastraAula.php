<?php
	include "template/topoAdm.php";

		  $conteudo = $_POST['conteudo'];
		  $data = $_POST['data'];
		  $semana = $_POST['semana'];
		  $plano = $_POST['plano'];
		  
		  if (!$conteudo || !$data || !$semana || !$plano){
			 echo 'Os dados não foram preenchidos completamente <br />';
			 exit;
		  }
		  
		  //inserindo dados do formulario no bd
		  $query = "insert into Tb_Aula values (null,'$conteudo','$data','$semana','$plano')";
		  $result = mysqli_query($db,$query);
		  if ($result)
			   echo 'A Aula foi cadastrado.</br>'; 
			   else echo mysqli_error($db).'</br>';
			   
		echo "<form action='form_Aula.php' method='post'>
		<input type='submit' value='Retornar'/>
		</form>";
	
	include "template/rodape.php";
?>