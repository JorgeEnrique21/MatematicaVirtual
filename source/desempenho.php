<!DOCTYPE html>
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
				// Tenta se conectar ao servidor MySQL
        		mysql_connect('localhost', 'nestor', 'quero.prototipos') or trigger_error(mysql_error());
        		// Tenta se conectar a um banco de dados MySQL
        		mysql_select_db('matematicavirtual') or trigger_error(mysql_error());
			?>
			<div id="containerAll">
			<div class="container-fluid">
				<div class="row" id="containerConteudo">
					<!-- Sidebar -->
					<div class="col-md-2" id="containerSidebar"> 
						<div id="sidebar">
							<a href="index.html" id="home">
								<div id="containerIcone">
									MATEMÁTICA VIRTUAL
									<div id="logo"></div>
								</div>
							</a>
							<ul id="listaSidebar">
								<li id="menuHamburger">
									<img src="css/imagens/menu.png" id="hamburger">
								</li>
								<div id="menuItens">
									<li class="dropdown">
										<a href="#">Turmas</a>
									<li>
										<a href="desempenho.html">Desempenho</a>
									</li>
									<?php
									if (isset($_SESSION['usuarioTipo'])) {
									if ($_SESSION['usuarioTipo'] == 1) { 
										echo "<li>
										<a href=\"cadastroQuestoesForm.php\">Cadastrar questões</a>
										</li>
										<li>
										<a href=\"cadastroAssuntosForm.php\">Cadastrar assuntos</a>
										</li>";
									}
								}
									?>
								</div>
							</ul>
						</div>
					</div>
					<!-- Área de disposição dos cards da página -->
					<div class="col-md-10" id="containerCards"> 
						<div class="row">
							<!-- Card de informações de perfil -->
							<?php if (!isset($_SESSION['usuarioId'])) { 
								echo "<div id=\"cardLogar\" onmouseover=\"mostrarLogin()\" onmouseout=\"esconderLogin()\"> <!-- MUDAR PARA ...infoPerfil -->
								<a href=\"#\"><div id=\"botaoLogin\">Fazer login</div></a>
								<div id=\"formLogin\">
									<form action=\"validacao.php\" method=\"POST\">
										Usuário
										<input type=\"text\" id=\"usuarioLogar\" name=\"usuario\">
										Senha
										<input type=\"password\" id=\"senhaLogar\" name=\"senha\">
										<div id=\"formLoginCadastro\"><a href=\"cadastro.html\">Cadastre-se</a></div><button id=\"botaoLogar\" type=\"submit\">Entrar</button>
									</form>
								</div>
							</div>";
							}
							else{
								echo "<div id=\"cardPerfil\"> <!-- MUDAR PARA ...infoPerfil -->
								<div id=\"fotoPerfil\">
									<img src=\"css/imagens/perfil.png\">
								</div>
								<div id=\"textoPerfil\">
									Bem vindo, ";  
									echo $_SESSION['usuarioNome']; 
									echo "<br>
									<a href=\"perfil.html\">Perfil</a> | <a href=\"logout.php\">Sair</a>	
								</div>
							</div>";
							}
							?>
							<!-- Cards de desempenho -->
							<div class="col-md-12" id="containerDesempenho"> 
										<div id="desempenhoTitle">
											<h1>Desempenho</h1>	
										</div>
										<?php 
										$sql = "SELECT acertos, erros, materiaNome FROM desempenho WHERE usuarioId = ".$_SESSION['usuarioId']."";
										$select = mysql_query($sql);
										if (!$select || mysql_num_rows($select) == 0) {
											echo "<h2>Não há dados de desempenho disponíveis</h2>";
										}
										else{
										$contador = 0;
										while($row = mysql_fetch_assoc($select)) {
										$contador ++;
										$porcAcertos = $row['acertos']/($row['acertos']+$row['erros'])*100;
										$porcErros = 100 - $porcAcertos;							
										echo "
										<div class=\"row\" id=\"barraConteudo".$contador."\" onclick=\"alteraImagem('botaoDesempenho".$contador."')\">
											<div class=\"col-md-11\">
												".$row['materiaNome']."
											</div>
											<div class=\"col-md-1\">
												<a href=\"#\">
													<img src=\"css/imagens/botaoDesempenhoAtivado.png\" class=\"botaoDesempenho\" id=\"botaoDesempenho".$contador."\">
												</a>
											</div>
										</div>
										<div class=\"barraConteudoEspecificacoes".$contador."\" style=\"text-align: center;\">
											<div class=\"row\" id=\"barraConteudoAtividade\">												
												<div class=\"col-md-6\" id=\"barraConteudoAtividadePerf\">Acertos ".$row['acertos']."</div>				
												<div class=\"col-md-6\" id=\"barraConteudoAtividadeErros\">Erros ".$row['erros']."</div>
											</div>
											<div class=\"row\" id=\"barraConteudoResultados\">												
												<div class=\"col-md-6\" id=\"barraConteudoResultadosPerf\">".$porcAcertos."%</div>
												<div class=\"col-md-6\" id=\"barraConteudoResultadosErros\">".$porcErros."%</div>			
											</div>
											<div class=\"row\" id=\"barraConteudoComentarios\">
												<div class=\"col-md-12\">
												<h2>Parabéns! Você tem um domínio da matéria</h2>
												<h3>Continue praticando em casa para manter o conteúdo fresco em sua cabeça</h3></div>
											</div>
										</div>";
										}
										}
										?>
							<!-- Fim das barras de desemepenho -->
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
		</body>
		<script src="javascript/jquery-3.1.0.min.js"></script>  
        <script type="text/javascript">
        <?php 
        for ($contadorJs = 1; $contadorJs<=$contador; $contadorJs++) {
        echo "
            $(document).ready(
				function() {
					$(\"#barraConteudo".$contadorJs."\").click(MostrarEsconder".$contadorJs.");
				}
			);
            function MostrarEsconder".$contadorJs."(){
                $(\".barraConteudoEspecificacoes".$contadorJs."\").slideToggle(600);
            }";
        }
        ?>
			function alteraImagem(img) {
				var src = document.getElementById(img).src.substr(document.getElementById(img).src.lastIndexOf('/') + 1, document.getElementById(img).src.length);

				if (src == 'botaoDesempenhoDesativado.png') {
					document.getElementById(img).src = 'css/imagens/botaoDesempenhoAtivado.png'; //
				} else { 
					document.getElementById(img).src = 'css/imagens/botaoDesempenhoDesativado.png';
				}   
			}
		</script>
	</html>
