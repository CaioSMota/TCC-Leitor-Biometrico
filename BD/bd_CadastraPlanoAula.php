<?php
	include "template/topoAdm.php";

		  $professor = $_POST['professor'];
		  $disciplina = $_POST['disciplina'];
		  $ano = $_POST['ano'];
		  $semestre = $_POST['semestre'];
		  
		  if (!$professor == "escolha" || !$disciplina == "escolha" || !$ano || !$semestre){
			 echo 'Os dados não foram preenchidos completamente <br />';
			 exit;
		  }
		  
		  //inserindo dados do formulario no bd
		  $query = "insert into Tb_Plano values (null,'$ano','$disciplina','$semestre','$professor')";
		  $result = mysqli_query($db,$query);
		  if ($result)
			   echo 'O plano de aula foi cadastrado.</br>'; 
			   else echo mysqli_error($db).'</br>';
			   
		echo "<form action='form_PlanoAula.php' method='post'>
		<input type='submit' value='Retornar'/>
		</form>";
	
	include "template/rodape.php";
?>