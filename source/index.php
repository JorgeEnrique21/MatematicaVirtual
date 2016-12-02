<html>
	<head>
		<meta charset="utf-8">
	</head>
    <body>
    	<!--form de login de usuário-->
        <?php
            //inicia a sessão
            if (!isset($_SESSION)) session_start();
            //checa se existe usuário
            if (!isset($_SESSION['usuarioId'])) {
                //finaliza a sessão caso não haja usuário
                session_destroy();
                 //redireciona para o início
        }
                
        ?>
        <?php
                         if (isset($_SESSION)){
                            echo "<a href=\"logout.php\"> sair de sua conta </a>";
                         }
                         //tenta se conectar ao servidos MySQL
                         $link = mysqli_connect('localhost', 'nestor', 'quero.prototipos') or trigger_error(mysqli_error());
                         //tenta se conectar ao banco de dados MatematicaVirtual
                         mysqli_select_db($link, 'matematicavirtual') or trigger_error(mysqli_error($link));
                         $userid = $_SESSION['usuarioId'];
                         $query = mysqli_query($link, "SELECT * FROM usuarios WHERE id = '$userid'") or die(mysqli_error($link));
                         $resultado = mysqli_fetch_array($query);
                         $mostraimagem = $resultado['linkFoto'];             
                     ?>
                     <img src="<?php echo $mostraimagem; ?>" width="100px" height="125px">
    	<form action="validacao.php" method="post">
    	 <legend>Login</legend>
            <label for="txtUsuario">Usuário:</label><br>
            <input type="text" name="usuario" id="txtUsuario" maxlength="25" /><br>
            <label for="txtSenha">Senha:</label><br>
            <input type="password" name="senha" id="txtSenha" /><br>
            <input type="submit" value="Entrar"/>
    	</form>
        <a href="cadastroform.php">cadastre-se aqui</a><br>
        <h3><a href="exercicios.php">Exercícios Conjuntos Numéricos</a></h3>
    </body>
</html>
