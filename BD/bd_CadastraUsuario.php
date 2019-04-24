<?php
	include "template/topoAdm.php";

		  $nome = $_POST['nome'];
		  $sexo = $_POST['sexo'];
		  $prontuario = $_POST['prontuario'];
		  $senha = $_POST['prontuario'];
		  $aux = $_POST['tipoUsuario'];
		  $nSocial = $_POST['nomeSocial'];
		  $genero = $_POST['genero'];
		  
		  $query = "SELECT * FROM Tb_TipoUsuario order by Tipo_Usuario;";
		  $result = mysqli_query($db, $query);
		
		while($tipo = mysqli_fetch_assoc($result)){
			if($aux == $tipo['Tipo_Usuario']){
				$tipoUsuario = $tipo['Cod_TipoUsuario'];
			}
		}
		
		if (!$nome || !$sexo || !$prontuario)
		  {
			 echo 'Os dados não foram preenchidos completamente<br />';
			 exit;
		  }
		
		if($sexo == "O"){
			if (!$nSocial || !$genero)
			{
					echo 'Os dados não foram preenchidos completamente<br />';
					exit;
			}
		  }
		  
		  //inserindo dados do formulario no bd
		  $query = "insert into Tb_Usuario values (null,'$nome','$senha','$sexo','$prontuario','$tipoUsuario')";
		  $result = mysqli_query($db,$query);
		  $id = mysqli_insert_id($db);
		  if($sexo == "O"){
			$query2 = "insert into Tb_Genero values (null,'$nSocial','$genero', '$id')";
			$result2 = mysqli_query($db,$query2);
		  }
		  
		  if ($result)
			   echo ' O usuario foi cadastrado.</br>'; 
			   else echo mysqli_error($db).'<br>';
			   
			   
		echo "<form action='form_Usuario.php' method='post'>
		<input type='submit' value='Retornar'/>
		</form>";
	
	include "template/rodape.php";
?>