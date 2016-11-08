<html>
	<head>
		<meta charset="utf-8">
	</head>
	<?php
	//validação de dados de usuário
		if (!empty($_POST) and (empty($_POST['usuario']) or empty($_POST['senha']) or empty($_POST['nome']) or empty($_POST['email']))) {
			header("location: cadastroform.php"); exit;
		}
	//tenta se conectar ao servidos MySQL
		mysql_connect('localhost', 'nestor', 'quero.prototipos') or trigger_error(mysql_error());
	//tenta se conectar ao banco de dados MatematicaVirtual
		mysql_select_db('matematicavirtual') or trigger_error(mysql_error());
	//guarda os nomes de usuario, senha, nome e email em variáveis
		$usuario = mysql_real_escape_string($_POST['usuario']);
		$senha = mysql_real_escape_string($_POST['senha']);
		$nome = mysql_real_escape_string($_POST['nome']);
		$email = mysql_real_escape_string($_POST['email']);
	//validação de dados inseridos
		$query = "SELECT usuario FROM usuarios WHERE ('usuario' = '".$usuario."')";
		$select = mysql_query($query);
		$array = mysql_fetch_array($select);
		$logarray = $array['usuario'];
		if ($logarray == $usuario) {
			echo "Esse login já foi cadastrado";
			die();
		}
		//insere os dados de ususario na tabela
		else{
			$query = "INSERT INTO usuarios (usuario, senha, nome, email) VALUES ('".$usuario."', '".$senha."', '".$nome."', '".$email."')";
			$insert = mysql_query($query);
		}
		if ($insert) {
		// Salva os dados do usuário
			$sql = "SELECT `id`, `nome`, `ativo` FROM `usuarios` WHERE (`usuario` = '".$usuario."') AND (`senha` = '".$senha."') AND (`ativo` = '1') LIMIT 1";
			$select = mysql_query($sql);
    		$resultado = mysql_fetch_assoc($select);
    	// Inicia uma sessão se ela não existir
    		if(!isset($_SESSION)) session_start();
    	//salva dados da sessão
    		$_SESSION['usuarioId'] = $resultado['id'];
    		$_SESSION['usuarioNome'] = $resultado['nome'];
    	//redireciona o usuário
    		header("location: restrito.php"); exit;
		}
		//mensagem de erro caso não seja possível cadastrar
		else{
			echo "Não foi possível cadastrar o usuário";
		}
	?>
</html>