<?php
	//inicia sessão
	session_start();
	//finaliza sessão e redireciona para a página inicial
	session_destroy();
	header("location: index.php");
?>