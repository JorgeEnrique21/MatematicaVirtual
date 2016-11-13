<html>
	<head>
		<meta charset = "utf-8">
	</head>
	<form action="cadastro.php" enctype="multipart/form-data" method="post">
        	<legend>Cadastro:</legend>

        	<label for="txtNome">Nome:</label><br>
                <input type="text" name="nome" id="txtNome" maxlength="25" /><br>

                <label for="txtEmail">Email:</label><br>
                <input type="text" name="email" id="txtEmail" maxlength="45" /><br>

                <label for="txtUsuario">Usuário:</label><br>
                <input type="text" name="usuario" id="txtUsuario" maxlength="25" /><br>

                <label for="txtSenha">Senha:</label><br>
                <input type="password" name="senha" id="txtSenha" /><br>

                <label for="txtFoto">Selecione uma imagem: </label><br>
                <input name="foto" type="file" />
                <br />

                <input type="submit" value="Cadastrar"/>
	</form>
</html>