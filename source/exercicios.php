<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/css.css">
	<title>Exercícios</title>
</head>
<?php
	// Tenta se conectar ao servidor MySQL
    	mysql_connect('localhost', 'nestor', 'quero.prototipos') or trigger_error(mysql_error());
        // Tenta se conectar a um banco de dados MySQL
    	mysql_select_db('matematicavirtual') or trigger_error(mysql_error());	
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
            $sql = "SELECT id, enunciado, linkVideo FROM questoes WHERE assunto = '".$_POST['nomeAssunto']."' ORDER BY rand() LIMIT 4";
            $select = mysql_query($sql);
            // Mensagem de erro caso não seja possível selecionar questões
            if(!$select){
                echo "Não foi possível obter uma lista de exercícios";
                die();
            }
            // guarda lista de quesões dentro de um array
            $rowsQuestoes = array();
            while($row=mysql_fetch_assoc($select)){
                $rowsQuestoes[] = $row;
            }
            $_SESSION['rowsQuestoes'] = $rowsQuestoes;
        }
    //determina enunciado da questão
        $enunciado = $rowsQuestoes[$_POST['contador']]['enunciado'];
        $linkVideo = $rowsQuestoes[$_POST['contador']]['linkVideo'];
    //seleciona 4 alternativas de acordo com a questao selecionada
        $sql = "SELECT * FROM alternativas WHERE questaoId = ".$rowsQuestoes[$_POST['contador']]['id']." ORDER BY rand()";
        $select = mysql_query($sql);
        // Mensagem de erro caso não seja possível selecionar alternativas
        if(!$select){
            echo "Não foi possível obter alternativas da questão";
            die();
        }
        // guarda alternativas dentro de um array
        $rowsAlternativas = array();
        while($row=mysql_fetch_assoc($select)){
            $rowsAlternativas[] = $row;
        }
?>
<body>
    <div class="container-fluid">
        <div class="row" id="topoAtividade">
            <div class="col-md-1">
                <a href="index.php">   <img id="logoAtividade" src="css/imagens/LOGO.png" onmouseover="this.src='css/imagens/LOGOhover.png'" onmouseout="this.src='css/imagens/LOGO.png'"></a>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-4">
                <div id="statusAtividade">
                    <div id="titAtividade">Conjuntos Numéricos</div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <div id="cardQuestao" class="row">
            <form action="<?php 
            if ($_POST['contador'] == 3) {
                echo "resultado.php";
            } 
            else echo "exercicios.php";    
            ?>" method="post">
                <h1 id="questaoTitle">Questão <?php echo $_POST['contador']+1; ?></h1>
                <?php if (isset($linkVideo)) {
                	echo "<iframe width=\"100%\" height=\"315\" src=\"$linkVideo\" frameborder=\"0\" ></iframe>";} 
                ?>
                <p><?php echo $enunciado; ?></p>
                <table id="alternativas">
                    <input type="hidden" name="contador" value="<?php echo $_POST['contador']?>">
                    <tr class="alternativa" id="alternativaA" onclick="alteraCor('alternativaA')">
                        <td class="letra">
                            &nbsp &nbsp A ) &nbsp 
                        </td>
                        <td class="alternativaInput">
                            <input type="radio" name="alt" id="A" value="<?php echo $rowsAlternativas[0]['tipo'] ?>">    
                        </td>
                        <td>
                            <?php echo $rowsAlternativas[0]['alternativa']; ?><br>
                        </td>
                    </tr>

                    <tr class="alternativa" id="alternativaB" onclick="alteraCor('alternativaB')">
                        <td class="letra">
                            &nbsp &nbsp B ) &nbsp 
                        </td>
                        <td class="alternativaInput">
                            <input type="radio" name="alt" id="B" value="<?php echo $rowsAlternativas[1]['tipo'] ?>">    
                        </td>
                        <td>
                            <?php echo $rowsAlternativas[1]['alternativa']; ?><br>
                        </td>
                    </tr>

                    <tr class="alternativa" id="alternativaC" onclick="alteraCor('alternativaC')">
                        <td class="letra">
                            &nbsp &nbsp C ) &nbsp 
                        </td>
                        <td class="alternativaInput">
                            <input type="radio" name="alt" id="C" value="<?php echo $rowsAlternativas[2]['tipo'] ?>">    
                        </td>
                        <td>
                            <?php echo $rowsAlternativas[2]['alternativa']; ?><br>
                        </td>
                    </tr>

                    <tr id="alternativaD" onclick="alteraCor('alternativaD')">
                        <td class="letra">
                            &nbsp &nbsp D ) &nbsp 
                        </td>
                        <td class="alternativaInput">
                            <input type="radio" name="alt" id="D" value="<?php echo $rowsAlternativas[3]['tipo'] ?>">    
                        </td>
                        <td>
                            <?php echo $rowsAlternativas[3]['alternativa']; ?><br>
                        </td>
                    </tr>
                </table>
                <input type="hidden" name="nomeAssunto" value="<?php echo $_POST['nomeAssunto'] ?>">
                <div id="cardQuestaoBotoes">
                    <input type="submit" id="botaoConfirmar" value="<?php
                    if ($_POST['contador'] == 3) {
                    echo "Pronto!";
                    } 
                    else echo "Próxima";
                    ?>">
                </div>
            </form>
        </div>
    </div>
</body>
<script type="text/javascript">
    function setColorRadioGroup(radioGroup) { 
        var radio = radioGroup;   
        if (radio[0].style) {   
            for (var r = 0; r < radio.length; r++)    
                if (radio[r].checked) swapColor(radio[r]);    
                else swapColor(radio[r]); 
        }
    } 
    function swapColor(oCheckbox) {  
    var pop = oCheckbox, checkedcolor = '#549A98';   
    while (pop.nodeType != 1 || pop.nodeName.toLowerCase() != 'tr')                             
    pop = pop.parentNode;        
        pop.style.backgroundColor = (oCheckbox.checked) ? checkedcolor : '#FFFFFF';
    }
    function alteraCor(x) {
        if(x == 'alternativaA'){
            document.getElementById(x).style.backgroundColor = "#549A98";
            document.getElementById('alternativaB').style.backgroundColor = "#fff";
            document.getElementById('alternativaC').style.backgroundColor = "#fff";
            document.getElementById('alternativaD').style.backgroundColor = "#fff";
            document.getElementById('A').checked = true;
                document.getElementById('B').checked = false;
                document.getElementById('C').checked = false;
                document.getElementById('D').checked = false;
            }
        if(x == 'alternativaB'){
            document.getElementById('alternativaA').style.backgroundColor = "#fff";
            document.getElementById(x).style.backgroundColor = "#549A98";
            document.getElementById('alternativaC').style.backgroundColor = "#fff";
            document.getElementById('alternativaD').style.backgroundColor = "#fff";
            document.getElementById('A').checked = false;
            document.getElementById('B').checked = true;
            document.getElementById('C').checked = false;
            document.getElementById('D').checked = false;
        }
        if(x == 'alternativaC'){
        document.getElementById('alternativaA').style.backgroundColor = "#fff";
            document.getElementById('alternativaB').style.backgroundColor = "#fff";
            document.getElementById(x).style.backgroundColor = "#549A98";
            document.getElementById('alternativaD').style.backgroundColor = "#fff";
            document.getElementById('A').checked = false;
            document.getElementById('B').checked = false;
            document.getElementById('C').checked = true;
            document.getElementById('D').checked = false;
        }
        if(x == 'alternativaD'){
            document.getElementById('alternativaA').style.backgroundColor = "#fff";
            document.getElementById('alternativaB').style.backgroundColor = "#fff";
            document.getElementById('alternativaC').style.backgroundColor = "#fff";
            document.getElementById(x).style.backgroundColor = "#549A98";
            document.getElementById('A').checked = false;
            document.getElementById('B').checked = false;
            document.getElementById('C').checked = false;
            document.getElementById('D').checked = true;
        }
    }
</script>

</html>