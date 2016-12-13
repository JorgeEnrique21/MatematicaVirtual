<html>
<head>
	<meta charset="utf-8">
	<title>Exercícios</title>
</head>
<?php
	// Tenta se conectar ao servidor MySQL
    	mysql_connect('localhost', 'nestor', 'quero.prototipos') or trigger_error(mysql_error());
    // Tenta se conectar a um banco de dados MySQL
    	mysql_select_db('matematicavirtual') or trigger_error(mysql_error());	
    // Seleciona 5 questoes aleatórias no db relacionadas ao assunto
    	$sql = "SELECT id, enunciado FROM questoes WHERE assunto = 'conjuntosNumericos' ORDER BY RAND() LIMIT 5";
    	$select = mysql_query($sql);
    	// Mensagem de erro caso não seja possível selecionar questões
    	if(!$select){
    		echo "Não foi possível obter uma lista de exercícios";
    		die();
    	}
    	$rowsQuestoes = array();
    	while($row=mysql_fetch_assoc($select)){
    		$rowsQuestoes[] = $row;
    	}
    	echo $rowsQuestoes[0]['enunciado'];
?>
<body>
	olá meu nome é joão
</body>
</html>