<?php
	include "template/topoAdm.php";

		  $nome = $_POST['nome'];
		  $cargaHoraria = $_POST['cargaHoraria'];
		  $qtdAulas = $_POST['qtdAulas'];
		  $aux = $_POST['curso'];
		  
		 if (!$nome || !$qtdAulas || !$qtdAulas)
		  {
			 echo 'Os dados não foram preenchidos completamente<br />';
			 exit;
		  }
		
		$query = "SELECT * FROM Tb_Curso order by Nome_Curso;";
		$result = mysqli_query($db, $query);
		
		while($curso = mysqli_fetch_assoc($result)){
			if($aux == $curso['Nome_Curso']){
				$codCurso = $curso['Cod_Curso'];
			}
		}
		  
		  //inserindo dados do formulario no bd
		  $query = "insert into Tb_Disciplina values (null,'$cargaHoraria','$qtdAulas','$nome','$codCurso')";
		  $result = mysqli_query($db,$query);
		  if ($result)
			   echo 'A disciplina foi cadastrada.</br>'; 
			   else echo mysqli_error($db).'<br>';
			   
		echo "<form action='form_Disciplina.php' method='post'>
		<input type='submit' value='Retornar'/>
		</form>";
	
	include "template/rodape.php";
?>