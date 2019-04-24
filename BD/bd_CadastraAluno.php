<?php
	include "template/topoAdm.php";

		  $codUsuario = $_POST['aluno'];
		  $codCurso = $_POST['curso'];
		  
		 if ($codUsuario == "escolha" || $codCurso == "escolha")
		  {
			 echo 'Os dados não foram preenchidos completamente<br />';
			 exit;
		  }
		 
		  //inserindo dados do formulario no bd
		  $query = "insert into Tb_Aluno values (null, null,$codUsuario, $codCurso)";

		  $result = mysqli_query($db,$query);
		  if ($result)
			   echo 'O Aluno foi cadastrado.</br>'; 
			   else echo mysqli_error($db).'<br>';
		  
		$cod = mysqli_insert_id($db);

		
		$query = "update Tb_Aluno set Biometria=$cod where Cod_Aluno = $cod";
		 $result = mysqli_query($db,$query);
		
		
		header("location:form_CadastroAluno2.php?Cod_Aluno=$cod");
	
	include "template/rodape.php";
?>