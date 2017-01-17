<html>
        <head>
	<meta charset="UTF-8">
        <link rel="shortcut icon" href="css/imagens/LOGO.ico" type="image/x-icon" />
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/css.css">
        <script src="javascript/jquery-3.1.0.min.js"></script>  
	</head>
        <body>
        <?php
        //inicia a sessão
        if (!isset($_SESSION)) session_start();
        //checa se existe usuário
        if (!isset($_SESSION['usuarioId']) || $_SESSION['usuarioTipo'] != 1) {
        //finaliza a sessão caso não haja usuário
        session_destroy();
        //redireciona para o início
        header("location: index.php");
        die();
        }
        ?>
        <div class="container-fluid">
        <div class="row" id="topoAtividade">
            <div class="col-md-1">
                <a href="index.php">   <img id="logoAtividade" src="css/imagens/LOGO.png" onmouseover="this.src='css/imagens/LOGOhover.png'" onmouseout="this.src='css/imagens/LOGO.png'"></a>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-4">
                <div id="statusAtividade">
                    <div id="titAtividade">Cadastro de Matéria</div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        </div>
        <div class="container-fluid">
	<form action="cadastroAssuntos.php" method="post">
	<legend><h2>Insira os dados da Matéria:</h2></legend>
        Nome:<br><input type="text" name="nome" maxlength="25" /><br>
	    Descrição:<br><textarea name="descricao" maxlength="60"></textarea><br>
        <input type="submit" value="Cadastrar Matéria" id="botaoConfirmar" />
        </form>
        </div>
        </body>
</html>