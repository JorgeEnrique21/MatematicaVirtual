<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php
		// inicia sessão
        if(!isset($_SESSION)) session_start();
        //insere numero de erros e acertos em variáveis 
		$acertos = $_SESSION['contadorAcertos'];
		$erros = $_SESSION['contadorErros'];
		//validação de alternativas
        if (isset($_POST['alt'])){
        	if ($_POST['alt'] == 1) {
            		$acertos += 1;
            	}
            	else
            		$erros += 1;
        }
        else
        	$erros += 1;
		session_destroy();
		//die();
	?>
	Parabéns, Lista de exercícios terminada!<br>
	Aqui estão seus resultados<br>
	Corretas:<?php echo $acertos ?><br>
	Incorretas:<?php echo $erros ?><br>
	<a href="index.php">voltar</a>
</body>
</html>