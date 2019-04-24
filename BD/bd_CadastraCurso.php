<?php
	include "template/topoAdm.php";

		  $nome = $_POST['nome'];
		  $sigla = $_POST['sigla'];
		  $ano = $_POST['ano'];
		  $semestre = $_POST['semestre'];
		  
		  if (!$nome || !$sigla || !$ano || !$semestre){
			 echo 'Os dados não foram preenchidos completamente <br />';
			 exit;
		  }
		  
		  //inserindo dados do formulario no bd
		  $query = "insert into Tb_Curso values (null,'$nome','$sigla','$ano','$semestre')";
		  $result = mysqli_query($db,$query);
		  if ($result)
			   echo 'O curso foi cadastrado.</br>'; 
			   else echo mysqli_error($db).'</br>';
			   
		echo "<form action='form_Curso.php' method='post'>
		<input type='submit' value='Retornar'/>
		</form>";
	
	include "template/rodape.php";
?>