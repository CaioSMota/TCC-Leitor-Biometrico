<?php
	include "template/topoAdm.php";

		  $aluno = $_POST['codigoaluno'];
		  
		  $disciplina = $_POST['disciplina'];
		
		
		$query = "SELECT * FROM tb_disciplina d
		inner join tb_curso c on d.Cod_Curso = c.Cod_Curso
		where Cod_Disciplina = '".$disciplina."';";
		$result = mysqli_query($db, $query);
		
		$disciplina2 = mysqli_fetch_assoc($result);

		$ano = $disciplina2['Ano'];
		$semestre = $disciplina2['Semestre'];
		  
		  //inserindo dados do formulario no bd
		  $query = "insert into Tb_Inscricao values (null,'$aluno','$disciplina','$ano','$semestre')";
		  $result = mysqli_query($db,$query);
		  if ($result)
			   echo 'O Aluno foi inscrito.</br>'; 
			   else echo mysqli_error($db).'<br>';
			   
		echo "<form action='form_Disciplina.php' method='post'>
		<input type='submit' value='Retornar'/>
		</form>";
	
	include "template/rodape.php";
?>