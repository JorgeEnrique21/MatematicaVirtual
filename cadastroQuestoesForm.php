<html>
        <head>
	<meta charset = "utf-8">
	</head>
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
	<form action="cadastroQuestoes.php" method="post">
	<legend>Cadastro de questoes do tio Gerald:</legend>
        Assunto:<br><input type="text" name="assunto" maxlength="25" /><br>
	Enunciado:<br><textarea name="enunciado"></textarea><br>
        Alternativa VERDADEIRA:<br><textarea name="alternativaVerdadeira"></textarea><br>
        Alternativa FALSA 1:<br><textarea name="alternativaFalsa1"></textarea><br>
        Alternativa FALSA 2:<br><textarea name="alternativaFalsa2"></textarea><br>
        Alternativa FALSE 3:<br><textarea name="alternativaFalsa3"></textarea><br>
        Link de video(Disponível em Compartilhar > Inconrporar):<br><input type="text" name="linkVideo" /><br>
        <input type="submit" value="Cadastrar Questão"/>
        </form>
</html>