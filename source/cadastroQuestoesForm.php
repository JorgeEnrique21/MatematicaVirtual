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
        // Tenta se conectar ao servidor MySQL
        mysql_connect('localhost', 'nestor', 'quero.prototipos') or trigger_error(mysql_error());
        // Tenta se conectar a um banco de dados MySQL
        mysql_select_db('matematicavirtual') or trigger_error(mysql_error());
        //seleciona lista de materias
        $sql = "SELECT nome FROM materias";
        $select = mysql_query($sql);
        if (!$select) {
            echo "Ocorreu um erro no carregamento de materias ". mysql_error();
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
                    <div id="titAtividade">Cadastro de questões</div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        </div>
        <div class="container-fluid">
	<form action="cadastroQuestoes.php" method="post">
	<legend><h2>Insira os dados da questão:</h2></legend>
    Assunto:<br>
    <select name="assunto">
    <?php 
        while($row = mysql_fetch_assoc($select)) {                              
            echo "<option value = \"".$row['nome']."\">".$row['nome']."</option>";
        } 
    ?>
    </select><br>
	Enunciado:<br><textarea name="enunciado"></textarea><br>
        Alternativa VERDADEIRA:<br><textarea name="alternativaVerdadeira"></textarea><br>
        Alternativa FALSA 1:<br><textarea name="alternativaFalsa1"></textarea><br>
        Alternativa FALSA 2:<br><textarea name="alternativaFalsa2"></textarea><br>
        Alternativa FALSA 3:<br><textarea name="alternativaFalsa3"></textarea><br>
        Link de video(Disponível em youtube.com > Compartilhar > Inconrporar):<br><input type="text" name="linkVideo" size="62" /><br><br>
        <input type="submit" value="Cadastrar Questão" id="botaoConfirmar" />
        </form>
        </div>
        </body>
</html>