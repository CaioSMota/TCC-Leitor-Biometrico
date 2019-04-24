<?php
session_start();

	include "template/topo.php";
		  
		echo "Bem Vindo A tela de Aluno";
		?>
		<html>
		<body>
		   <table>
			<tr><td>Prontuario:</td><td><input type='text' name='Prontuario_Adm' value="<?php echo $_SESSION['prontuario']; ?>" readonly></td></tr>
			<tr><td>Nome:</td><td><input type='text' name='Nome_Adm' value="<?php echo $_SESSION['nome']; ?>" readonly> </tr>
			</table>
			</body>
			</html>
			
<?php
	include "template/rodapeAdm.php";
?>