<html>
	<head>
		<meta charset="utf-8">
	</head>
		<?php
			//inicia a sessão
			if (!isset($_SESSION)) session_start();
			//checa se existe usuário
			if (!isset($_SESSION['usuarioId'])) {
				//finaliza a sessão caso não haja usuário
				session_destroy();
				//redireciona para o início
				header("location: index.php");
			}
		?>
		<body>
			<h2>Olá, <?php echo $_SESSION["usuarioNome"]; ?>!</h2>
			<?php if ($_SESSION['usuarioTipo'] == 1) {
				echo "<a href=\"cadastroQuestoesForm.php\">Cadastro de questões</a><br>";
			} ?>
			<a href="logout.php">Sair</a>
		</body>
</html>