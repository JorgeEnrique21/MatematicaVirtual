<html>
	<head>
		<meta charset="utf-8">
	</head>
	<?php
	//validação de dados de usuário
		if (!empty($_POST) and (empty($_POST['usuario']) or empty($_POST['senha']) or empty($_POST['nome']) or empty($_POST['email'])))
		{
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

		//verifica se foi enviado um foto
		if ( isset( $_FILES[ 'foto' ][ 'name' ] ) && $_FILES[ 'foto' ][ 'error' ] == 0 ) 
		{
			$foto_tmp = $_FILES[ 'foto' ][ 'tmp_name' ];
	        $nomeFoto = $_FILES[ 'foto' ][ 'name' ];
	        // Pega a extensão
	        $extensao = pathinfo ( $nomeFoto, PATHINFO_EXTENSION );
	        // Converte a extensão para minúsculo
	        $extensao = strtolower ( $extensao );
	        // Somente imagens, .jpg;.jpeg;.gif;.png
	        // Aqui eu enfileiro as extensões permitidas e separo por ';'
	        // Isso serve apenas para eu poder pesquisar dentro desta String
		    if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
		        // Cria um nome único para esta imagem
		        // Evita que duplique as imagens no servidor.
		        // Evita nomes com acentos, espaços e caracteres não alfanuméricos
		        $novoNome = uniqid ( time () ) . "." . $extensao;
		        // Concatena a pasta com o nome
		        $destino = 'imagens/' . $novoNome;
		        // tenta mover o foto para o destino
	            if ( @move_uploaded_file ( $foto_tmp, $destino ) ) {
		            echo 'foto salvo com sucesso em : <strong>' . $destino . '</strong><br />';
		            echo ' <img src = "' . $destino . '" />';
	            }
	            else
	            echo 'Erro ao salvar o foto. Aparentemente você não tem permissão de escrita.<br />';
	        }
	        else
	        echo 'Você poderá enviar apenas fotos "*.jpg;*.jpeg;*.gif;*.png"<br />';
        }
        else
        {
            echo 'Você não enviou nenhum foto!';
        }

        if ($logarray == $usuario) {
			echo "Esse login já foi cadastrado";
			die();
		}
		//insere os dados de ususario na tabela
		else{
			$query = "INSERT INTO usuarios (usuario, senha, nome, email, linkFoto) VALUES ('".$usuario."', '".$senha."', '".$nome."', '".$email."', '".$destino."')";
			$insert = mysql_query($query);
		}
		if ($insert) {
		// Salva os dados do usuário
			$sql = "SELECT `id`, `nome`, `ativo` FROM `usuarios` WHERE (`usuario` = '".$usuario."') AND (`senha` = '".$senha."') AND (`ativo` = '1') LIMIT 1";
			$select = mysql_query($sql);
    		$resultado = mysql_fetch_assoc($select);
    	// Inicia uma sessão se ela não existir
    		if(!isset($_SESSION))
	    		session_start();
	    		//salva dados da sessão
	    		$_SESSION['usuarioId'] = $resultado['id'];
	    		$_SESSION['usuarioNome'] = $resultado['nome'];
    			//mensagem de erro caso não seja possível cadastrar
			
		
		//redireciona o usuário
    		header("location: restrito.php"); exit;
		}
	?>
</html>