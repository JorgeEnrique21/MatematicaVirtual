<html>
	<head>
		<meta charset = "utf-8">
                <link rel="shortcut icon" href="css/imagens/LOGO.ico" type="image/x-icon" />
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/css.css">
        <script src="javascript/jquery-3.1.0.min.js"></script>  
	</head>
        <body>
        <div class="container-fluid">
        <div class="row" id="topoAtividade">
            <div class="col-md-1">
                <a href="index.php">   <img id="logoAtividade" src="css/imagens/LOGO.png" onmouseover="this.src='css/imagens/LOGOhover.png'" onmouseout="this.src='css/imagens/LOGO.png'"></a>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-4">
                <div id="statusAtividade">
                    <div id="titAtividade">Cadastro</div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        </div>
        <div class="container-fluid">
	<form action="cadastro.php" method="post">
	<legend><h1>Dados do usuário:</h1></legend>
	<label for="txtNome">Nome:</label><br>
        <input type="text" name="nome" id="txtNome" maxlength="25" /><br>
        <label for="txtEmail">Email:</label><br>
        <input type="text" name="email" id="txtEmail" maxlength="45" /><br>
        <label for="txtUsuario">Usuário:</label><br>
        <input type="text" name="usuario" id="txtUsuario" maxlength="25" /><br>
        <label for="txtSenha">Senha:</label><br>
        <input type="password" name="senha" id="txtSenha" /><br><br>
        <input type="submit" value="Cadastrar" id="botaoConfirmar" />
	</form>
        </div>
        </body>
</html>