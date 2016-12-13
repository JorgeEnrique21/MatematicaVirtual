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
    		$link = mysqli_connect('localhost', 'nestor', 'quero.prototipos') or trigger_error(mysql_error());
    	// Tenta se conectar a um banco de dados MySQL
    		mysqli_select_db($link, 'matematicavirtual') or trigger_error(mysql_error($link));
		//guarda os dados da questão em variáveis
			$enunciado = mysqli_real_escape_string($link, $_POST['enunciado']);
			$assunto = mysqli_real_escape_string($link, $_POST['assunto']);
			$linkVideo = mysqli_real_escape_string($link, $_POST['linkVideo']);
			$alternativaVerdadeira = mysqli_real_escape_string($link, $_POST['alternativaVerdadeira']);
			$alternativaFalsa1 = mysqli_real_escape_string($link, $_POST['alternativaFalsa1']);
			$alternativaFalsa2 = mysqli_real_escape_string($link, $_POST['alternativaFalsa2']);
			$alternativaFalsa3 = mysqli_real_escape_string($link, $_POST['alternativaFalsa3']);			
		//insere questão no banco de dados
			$sql = "INSERT INTO questoes (`enunciado`, `assunto`, `linkVideo` ) VALUES('".$enunciado."', '".$assunto."', '".$linkVideo."' )";
			$insert = mysqli_query($link, $sql);
			if(!$insert){
				echo "Não foi possível cadastrar questão";
			}
		//seleciona id da questão inserida	
			$sql = "SELECT id FROM questoes ORDER BY id DESC LIMIT 1";
			$select = mysqli_query($link, $sql);
			$resultado = mysqli_fetch_assoc($select);
			$questaoId = $resultado['id'];
			if (!$select) {
				echo "Ocorreu um erro na busca de dados no sevidor";
			}
		//insere alternativas da respectiva questão através do campo id
			$sql = "INSERT INTO alternativas (`questaoId`, `alternativa`, `tipo`) VALUES ('".$questaoId."', '".$alternativaVerdadeira."', '1'),('".$questaoId."', '".$alternativaFalsa1."', '0'),('".$questaoId."', '".$alternativaFalsa2."', '0'),('".$questaoId."', '".$alternativaFalsa3."', '0')";
			$insert = mysqli_query($link, $sql);
			if (!$insert) {
				echo "A questão não pode ser inserida";
			}
			echo "Questão inserida com sucesso!";
		?>
</html>