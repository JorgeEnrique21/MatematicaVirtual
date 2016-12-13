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
			$enunciado = mysql_real_escape_string($_POST['enunciado']);
			$assunto = mysql_real_escape_string($_POST['assunto']);
			$linkVideo = mysql_real_escape_string($_POST['linkVideo']);
			$alternativaVerdadeira = mysql_real_escape_string($_POST['alternativaVerdadeira']);
			$alternativaFalsa1 = mysql_real_escape_string($_POST['alternativaFalsa1']);
			$alternativaFalsa2 = mysql_real_escape_string($_POST['alternativaFalsa2']);
			$alternativaFalsa3 = mysql_real_escape_string($_POST['alternativaFalsa3']);			
		//insere questão no banco de dados
			$sql = "INSERT INTO questoes (`enunciado`, `assunto`, `linkVideo` ) VALUES('".$enunciado."', '".$assunto."', '".$linkVideo."' )";
			$insert = mysql_query($sql);
			if(!$insert){
				echo "Não foi possível cadastrar questão";
			}
		//seleciona id da questão inserida	
			$sql = "SELECT id FROM questoes ORDER BY id DESC LIMIT 1";
			$select = mysql_query($sql);
			$resultado = mysql_fetch_assoc($select);
			$questaoId = $resultado['id'];
			if (!$select) {
				echo "Ocorreu um erro na busca de dados no sevidor";
			}
		//insere alternativas da respectiva questão através do campo id
			$sql = "INSERT INTO alternativas (`questaoId`, `alternativa`, `tipo`) VALUES ('".$questaoId."', '".$alternativaVerdadeira."', '1'),('".$questaoId."', '".$alternativaFalsa1."', '0'),('".$questaoId."', '".$alternativaFalsa2."', '0'),('".$questaoId."', '".$alternativaFalsa3."', '0')";
			$insert = mysql_query($sql);
			if (!$insert) {
				echo "A questão não pode ser inserida";
			}
			echo "Questão inserida com sucesso!";
		?>
</html>