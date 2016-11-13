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
			<h2>Olá, <?php
						 echo $_SESSION["usuarioNome"]; 
						 //tenta se conectar ao servidos MySQL
						 $link = mysql_connect('localhost', 'nestor', 'quero.prototipos') or trigger_error(mysql_error());
						 //tenta se conectar ao banco de dados MatematicaVirtual
						 mysql_select_db('matematicavirtual') or trigger_error(mysql_error());
						 $userid = $_SESSION['usuarioId'];
						 $query = mysql_query("SELECT * FROM usuarios WHERE id = '$userid'") or die(mysql_error());
						 $resultado = mysql_fetch_array($query);
						 $mostraimagem = $resultado['linkFoto'];			 
					 ?>!</h2><br>
					 <img src="<?php echo $mostraimagem; ?>" width="100px" height="125px">
			<?php 
			if ($_SESSION['usuarioTipo'] == 1) {
				echo "<a href=\"cadastroQuestoesForm.php\">Cadastro de questões</a><br>";
			} ?>
			<a href="index.php">Voltar para a home</a>
			<a href="logout.php">Sair</a>
		</body>
</html>