<?php
session_start();

	include "template/topoAdm.php";
		  
		echo "Bem Vindo A tela de ADMINISTRADOR";
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