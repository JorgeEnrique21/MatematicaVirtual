<html>
	<head>
		<meta charset="utf-8">
	</head>
		<?php
    	// Checa se usuário está logado como admin
    		//inicia a sessão
			if (!isset($_SESSION)) session_start();
			//checa se existe usuário
			if (!isset($_SESSION['usuarioId']) || $_SESSION['usuarioTipo'] != 1) {
				//finaliza a sessão caso não haja usuário
				session_destroy();
				//redireciona para o início
				header("location: index.php");
				die();
			}		
		// Tenta se conectar ao servidor MySQL
    		mysql_connect('localhost', 'nestor', 'quero.prototipos') or trigger_error(mysql_error());
    	// Tenta se conectar a um banco de dados MySQL
    		mysql_select_db('matematicavirtual') or trigger_error(mysql_error());
		//guarda os dados da questão em variáveis
			$nome = mysql_real_escape_string($_POST['nome']);
			$descricao = mysql_real_escape_string($_POST['descricao']);
		//insere questão no banco de dados
			$sql = "INSERT INTO materias (`nome`, `descricao`) VALUES('".$nome."', '".$descricao."')";
			$insert = mysql_query($sql);
			if(!$insert){
				echo "Não foi possível cadastrar matéria";
			}
		?>
</html>