<?php
	//inicia a sessão
	if (!isset($_SESSION)) session_start();
	// Tenta se conectar ao servidor MySQL
    mysql_connect('localhost', 'nestor', 'quero.prototipos') or trigger_error(mysql_error());
    // Tenta se conectar a um banco de dados MySQL
    mysql_select_db('matematicavirtual') or trigger_error(mysql_error());
    $sql = "SELECT * FROM turmas WHERE turmaNome = '".$_POST['turmaNome']."'";
    $query = mysql_query($sql);
    if(mysql_num_rows($query) == 0){
    	echo "Turma não encontrada";
    }
    else{
    	$sql = "INSERT INTO turmas (turmaNome, alunoId, alunoNome) VALUES ('".$_POST['turmaNome']."', '".$_SESSION['usuarioId']."', '".$_SESSION['usuarioNome']."')";
    	$query = mysql_query($sql);
    	if (!$query) {
    		echo "Ocorreu um erro durante a inserção na turma.";
    	}
    	else
    	header("location:turma.php");
    }
?>