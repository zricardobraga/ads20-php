<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Cadastro de Jogos - Home</title>
</head>
<body>

	<h1>Cadastro de Jogos - Home</h1>

	<h4><a href="jogos.php">Ver Jogos Cadastrados</a></h4>

	<form action="jogos.php" method="post">
		
		<p>
			<label>Título:</label><br>
			<input type="text" name="titulo" maxlength="80">
		</p>

		<p>
			<label>Gênero:</label><br>
			<input type="text" name="genero" maxlength="40">
		</p>

		<p>
			<label>Ano:</label><br>
			<input type="number" name="ano" min="1970" max="2021">
		</p>

		<p>
			<button type="submit" name="cadastrar">Cadastrar</button>
		</p>

	</form>


</body>
</html>