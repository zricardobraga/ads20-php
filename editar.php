<?php  
if(empty($_GET['id'])) :
	header('location:jogos.php');
else:
	$id = $_GET['id'];
	include_once 'func.php';
	$jogo = retornar_jogo($id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Editar Jogo</title>
</head>
<body>

	<?php if ($jogo != null): ?>

	<h1>Editar - Jogo</h1>

	<h4><a href="jogos.php">Ver Jogos Cadastrados</a></h4>

	<form action="editado.php" method="post">
		
		<p>
			<label>Título:</label><br>
			<input type="text" name="titulo" maxlength="80" 
			value="<?php echo $jogo['titulo'] ?>">
		</p>

		<p>
			<label>Gênero:</label><br>
			<input type="text" name="genero" maxlength="40"
			value="<?php echo $jogo['genero'] ?>">
		</p>

		<p>
			<label>Ano:</label><br>
			<input type="number" name="ano" min="1970" max="2021"
			value="<?php echo $jogo['ano'] ?>">
		</p>

		<input type="hidden" name="id" value="<?php echo $jogo['id'] ?>">

		<p>
			<button type="submit">Editar</button>
		</p>

	</form>

	<?php else: ?>

		<h3>Eror ao carregar form de edição de jogo...</h3>

	<?php endif; ?>


</body>
</html>
<?php endif; ?>