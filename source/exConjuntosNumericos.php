<html>
<head>
	<meta charset="utf-8">
	<title>Exerc�cios</title>
</head>
<?php
	// Tenta se conectar ao servidor MySQL
    	$link = mysqli_connect('localhost', 'nestor', 'quero.prototipos') or trigger_error(mysql_error());
    // Tenta se conectar a um banco de dados MySQL
    	mysqli_select_db($link, 'matematicavirtual') or trigger_error(mysqli_error($link));	
    // Seleciona 5 questoes aleat�rias no db relacionadas ao assunto
    	$sql = "SELECT id, enunciado FROM questoes WHERE assunto = 'conjuntosNumericos' ORDER BY RAND() LIMIT 5";
    	$select = mysqli_query($link, $sql);
    	// Mensagem de erro caso n�o seja poss�vel selecionar quest�es
    	if(!$select){
    		echo "N�o foi poss�vel obter uma lista de exerc�cios";
    		die();
    	}
    	$rowsQuestoes = array();
    	while($row=mysqli_fetch_assoc($select)){
    		$rowsQuestoes[] = $row;
    	}
    	echo $rowsQuestoes[0]['enunciado'];
?>
<body>
	ol� meu nome � jo�o
</body>
</html>