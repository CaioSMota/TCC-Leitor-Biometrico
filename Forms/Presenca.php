<?php
	include "template/topoAdm.php";
	session_start();
	
		$id = $_GET['id'];
		echo"<table><tr>";
				
				$query = "select * from Tb_Aluno a
				inner join Tb_Usuario u on a.Cod_Usuario = u.Cod_Usuario
				inner join Tb_Frequencia f on a.Cod_Aluno = f.Cod_Aluno
				where Biometria = '$id'";
				$result = mysqli_query($db, $query);
				$num_results = mysqli_num_rows($result);
				
				$usuario = mysqli_fetch_assoc($result);
				
					echo "<tr>";
					echo "<td>".$usuario["Prontuario"];
					echo "</td><td>".$usuario["Nome_Usuario"];
					echo "</td><td>".$usuario["Faltas"];
					
					
				$fAtual = $usuario["Faltas"];
			
					$fAtual = $fAtual-4;
				mysqli_select_db($db,'bd_chamada');

				$query2 = "update Tb_Frequencia set Faltas='$fAtual' where Cod_Aluno='".$usuario['Cod_Aluno']."'";
				$result2 = mysqli_query($db, $query2);
				
				echo "</table>
				</div>";
				
	include "template/rodapeAdm.php";
?>
