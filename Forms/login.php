	<?php
	session_start();
	
	include "conexao/conecta.php";
	
		$login=$_POST['login'];
		$senha=$_POST['senha'];

		if(!$login || !$senha )
		{
			die("Faltam dados usuario e/ou senha!");
		}
	
		$SQL = "SELECT *
		FROM tb_usuario
		WHERE Prontuario = '$login' AND Senha='$senha'";

		$result_id= mysqli_query($db,$SQL) or die ("Erro no banco de dados!");
		
		$row=mysqli_fetch_array($result_id, MYSQLI_ASSOC);
		
		if(mysqli_num_rows($result_id) > 0){
			
		$_SESSION ['nome']=$row["Nome_Usuario"];
		$_SESSION ['prontuario']=$row["Prontuario"];
	
		}else{
			unset ($_SESSION ['nome']);
			unset ($_SESSION ['prontuario']);
			
		}
		$tipo = $row["Cod_TipoUsuario"];
		
		if($tipo==3)
		{
		include "Tl_Aluno.php";
		}
		else if($tipo==1)
		{
			include "Tl_ADM.php";	
		}else{
			
			echo "Usuario ou senha invalida";
				echo "<form action='index.php' method='post'>
				<input type='submit' value='Voltar'/>
				</form>";
		}
		
	


?>
