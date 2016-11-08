<html>
	<head>
		<meta charset="utf-8">
	</head>
		<?php
		//validação de dados de usuário
			if (!empty($_POST) and (empty($_POST['usuario']) or empty($_POST['senha']))) {
				header("location:index.php"); exit;
			}
		// Tenta se conectar ao servidor MySQL
    		mysql_connect('localhost', 'nestor', 'quero.prototipos') or trigger_error(mysql_error());
    	// Tenta se conectar a um banco de dados MySQL
    		mysql_select_db('matematicavirtual') or trigger_error(mysql_error());		
		//guarda os nomes de usuario e senha em variáveis
			$usuario = mysql_real_escape_string($_POST['usuario']);
			$senha = mysql_real_escape_string($_POST['senha']);
		//validação de usuário e senha digitados
			$sql = "SELECT `id`, `nome`, `ativo`, `tipo` FROM `usuarios` WHERE (`usuario` = '".$usuario."') AND (`senha` = '".$senha."') AND (`ativo` = '1') LIMIT 1";
			$consulta = mysql_query($sql);
        //checa os dados enviados
			if (mysql_num_rows($consulta) != 1) {
        		// Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
        		echo "Login invalido!"; 
        		exit;
    		} 
    		else {
    		    // Salva os dados encontados na variável $resultado
    		    $resultado = mysql_fetch_assoc($consulta);
    		 	// Inicia uma sessão se ela não existir
    		 	if(!isset($_SESSION)) session_start();
    		 	//salva dados da sessão
    		 	$_SESSION['usuarioId'] = $resultado['id'];
                $_SESSION['usuarioNome'] = $resultado['nome'];
    		 	$_SESSION['usuarioTipo'] = $resultado['tipo'];
    		 	//redireciona o usuário
    		 	header("location: restrito.php"); exit;
    		}
		?>
</html>