<html>
<head>
	<meta charset="utf-8">
	<title>Exercícios</title>
</head>
<?php
	// Tenta se conectar ao servidor MySQL
    	$link = mysqli_connect('localhost', 'nestor', 'quero.prototipos') or trigger_error(mysqli_error());
        // Tenta se conectar a um banco de dados MySQL
    	mysqli_select_db($link, 'matematicavirtual') or trigger_error(mysqli_error($link));	
    // inicia sessão
        if(!isset($_SESSION)) session_start();
    // contador que determina numero da questão
        if(isset($_POST['contador'])){
            $_POST['contador'] += 1;
            $rowsQuestoes = $_SESSION['rowsQuestoes'];
            //contador de acertos e erros
            $contadorAcertos = 0;
            $contadorErros = 0;
            //validação de alternativas
            if (isset($_POST['alt'])) {
            	if ($_POST['alt'] == 1) 
            		$contadorAcertos += 1;
            	else
            		$contadorErros += 1;
            }
            else
            	$contadorErros += 1;
            if (!isset($_SESSION['contadorAcertos']) && !isset($_SESSION['contadorErros'])) {
            	$_SESSION['contadorAcertos'] = 0;
            	$_SESSION['contadorErros'] = 0;
            }
            $_SESSION['contadorAcertos'] += $contadorAcertos;
            $_SESSION['contadorErros'] += $contadorErros;
        }
        else{
            $_POST['contador'] = 0;
            // Seleciona 5 questoes aleatórias no db relacionadas ao assunto
            $sql = "SELECT id, enunciado, linkVideo FROM questoes WHERE assunto = 'conjuntosNumericos' ORDER BY rand() LIMIT 4";
            $select = mysqli_query($link, $sql);
            // Mensagem de erro caso não seja possível selecionar questões
            if(!$select){
                echo "Não foi possível obter uma lista de exercícios";
                die();
            }
            // guarda lista de quesões dentro de um array
            $rowsQuestoes = array();
            while($row=mysqli_fetch_assoc($select)){
                $rowsQuestoes[] = $row;
            }
            $_SESSION['rowsQuestoes'] = $rowsQuestoes;
        }
    //determina enunciado da questão
        $enunciado = $rowsQuestoes[$_POST['contador']]['enunciado'];
        $linkVideo = $rowsQuestoes[$_POST['contador']]['linkVideo'];
    //seleciona 4 alternativas de acordo com a questao selecionada
        $sql = "SELECT * FROM alternativas WHERE questaoId = ".$rowsQuestoes[$_POST['contador']]['id']." ORDER BY rand()";
        $select = mysqli_query($link, $sql);
        // Mensagem de erro caso não seja possível selecionar alternativas
        if(!$select){
            echo "Não foi possível obter alternativas da questão";
            die();
        }
        // guarda alternativas dentro de um array
        $rowsAlternativas = array();
        while($row=mysqli_fetch_assoc($select)){
            $rowsAlternativas[] = $row;
        }
?>
<body>
    <form action="<?php 
    if ($_POST['contador'] == 3) {
        echo "resultado.php";
    } 
    else echo "exercicios.php";    
    ?>" method="post">
        <legend><h4>Questão <?php echo $_POST['contador']+1; ?></h4></legend>
        <?php if (isset($linkVideo)) {
        	echo "<iframe width=\"420\" height=\"315\" src=\"$linkVideo\" frameborder=\"0\" ></iframe>";} 
        ?>
        <h3><?php echo $enunciado; ?></h3>
        <input type="hidden" name="contador" value="<?php echo $_POST['contador']?>">
        <input type="radio" name="alt" value="<?php echo $rowsAlternativas[0]['tipo'] ?>"><?php echo $rowsAlternativas[0]['alternativa']; ?><br>
        <input type="radio" name="alt" value="<?php echo $rowsAlternativas[1]['tipo'] ?>"><?php echo $rowsAlternativas[1]['alternativa']; ?><br>
        <input type="radio" name="alt" value="<?php echo $rowsAlternativas[2]['tipo'] ?>"><?php echo $rowsAlternativas[2]['alternativa']; ?><br>
        <input type="radio" name="alt" value="<?php echo $rowsAlternativas[3]['tipo'] ?>"><?php echo $rowsAlternativas[3]['alternativa']; ?><br><br>
        <input type="submit" value="<?php
        if ($_POST['contador'] == 3) {
        echo "Pronto!";
        } 
        else echo "Próxima";
        ?>">
    </form>
</body>
</html>