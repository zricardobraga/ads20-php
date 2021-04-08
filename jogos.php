<?php include_once 'func.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Cadastro de Jogos - Jogos</title>
</head>
<body>

	<h1>Cadastro de Jogos - Jogos Cadastrados</h1>

	<h4><a href="index.php">Voltar para home</a></h4>


	<?php  

	if(isset($_POST['cadastrar']))
	{
		if(!empty($_POST['titulo']) && !empty($_POST['genero']) 
			&& !empty($_POST['ano']))
		{
			// receber os dados enviados via post 
			$jogo['titulo'] = $_POST['titulo'];
			$jogo['genero'] = $_POST['genero'];
			$jogo['ano']	= $_POST['ano'];

			// chamar função inserir_jogo do arquivo func.php
			//$result = inserir_jogo($jogo);
			echo inserir_jogo($jogo);

		}
		else
		{
			echo '<h3>Por favor, preencha todos os dados para cadastrar o jogo!</h3>';
		}
	}

	// chamada da função para exibir os jogos cadastrados
	listar_jogos();

	?>

</body>
</html>