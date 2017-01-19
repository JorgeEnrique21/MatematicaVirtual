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
		<body onresize="fun()" onload="fun()">
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
										<a href="turma.php">Turmas</a>
									<li>
										<a href="desempenho.php">Desempenho</a>
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
										<div id=\"formLoginCadastro\"><a href=\"cadastroForm.php\">Cadastre-se</a></div><button id=\"botaoLogar\" type=\"submit\">Entrar</button>
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
						</div>
						<!-- Cards de aulas -->
						<div class="row">
						<?php 
							$sql = "SELECT * FROM materias";
							$select = mysql_query($sql);
							if (!$select) {
								echo "Ocorreu um erro no carregamento de materias ". mysql_error();
							}
							while($row = mysql_fetch_assoc($select)) {								
								echo "<div class=\"col-md-3 col-sm-4 col-xs-12\">
									<div class=\"cardConteudo\">
										<div class=\"imgPlaceholder\">
											<h1>img</h1>
										</div>
										<form action=\"exercicios.php\" method=\"post\">
										<h2>".$row['nome']."</h2>
										<div class=\"textoCard\">
											<p>
												".$row['descricao']."
											</p>
										</div>
										<input type=\"hidden\" value=\"".$row['nome']."\" name=\"nomeAssunto\">										
										<a href=\"exercicios.php\">
											<input type=\"submit\" class=\"botaoComecar\" value=\"Começar\">											
										</a>
										</form>
									</div>
								</div>";
							}
						?>
						</div>
						<!-- Fim dos cards de aulas -->						
					</div>
				</div>
			</div>
			</div>
		</body>
		<script type="text/javascript">
			$(document).ready(
						function() {
							$("#menuHamburger").click(MostrarEsconder1);
						}
					);
					function MostrarEsconder1(){
						$("#menuItens").slideToggle(500);
					}
				function fun(){
					if ($(window).width() > 991) {
					   document.getElementById('menuItens').style.display = "block";
					   document.getElementById('hamburger').style.display = "none";
					}
					else{
						document.getElementById('hamburger').style.display = "block";
						document.getElementById('menuItens').style.display = "none";
					}
				}
				function mostrarLogin()
				{
					document.getElementById('formLogin').style.display = 'block';
				}
				function esconderLogin()
				{
					document.getElementById('formLogin').style.display = 'none';
				}
			</script>
	</html>