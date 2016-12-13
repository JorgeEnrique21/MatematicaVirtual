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
                         $link = mysql_connect('localhost', 'nestor', 'quero.prototipos') or trigger_error(mysql_error());
                         //tenta se conectar ao banco de dados MatematicaVirtual
                         mysql_select_db('matematicavirtual') or trigger_error(mysql_error());
                         $userid = $_SESSION['usuarioId'];
                         $query = mysql_query("SELECT * FROM usuarios WHERE id = '$userid'") or die(mysql_error());
                         $resultado = mysql_fetch_array($query);
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
