<?php  
// arquivo de funções de manipulação de dados no BD

include_once 'conn.php';

// função para inserir jogo na tabela jogos_tb
function inserir_jogo($jogo)
{
	global $conn; // variável de conexão do arquivo conn.php

	// formatar valores que serão inseridos na tabela:
	$values = "'".$jogo['titulo']."', " .
			  "'".$jogo['genero']."', " .
			  $jogo['ano'];

	// criar comando sql
	$sql = "INSERT INTO jogos_tb (titulo, genero, ano) VALUES ($values)";


	// EXECUTAR o comando
	mysqli_query($conn, $sql);

	// verificar linhas afetadas no mysql
	if(mysqli_affected_rows($conn) > 0)
	{
		return '<h3>Jogo cadastrado com sucesso</h3>';
	}

	return '<h3>Erro ao cadastrar jogo...</h3>';

}


// função para listar jogos cadastrados
function listar_jogos()
{

	global $conn;

	$sql = "SELECT * FROM jogos_tb";

	$result = mysqli_query($conn, $sql);

	if(mysqli_affected_rows($conn) > 0)
	{
		while($jogo = mysqli_fetch_assoc($result))
		{
			echo '<p>';
			foreach($jogo as $indice => $valor)
			{
				if ($indice == 'id')
				{
					$id = $valor;
				}

				echo "<b>" . ucfirst($indice) . "</b>: " . $valor . "<br>";
			}

			echo '<a href="editar.php?id='.$id.'">Editar</a> | '; 
			echo '<a href="deletar.php?id='.$id.'" onclick="return confirm(\'Tem certeza que deseja excluir este jogo?\')">Deletar</a>'; 

			echo '</p>';
		}
	}
	else
	{
		echo '<h3>Não há jogos cadastrados...</h3>';
	}

}

// função para deletar um jogo especifico
function deletar_jogo($id)
{
	global $conn;

	$sql = "DELETE FROM jogos_tb WHERE id = $id";

	mysqli_query($conn, $sql); // executa, no bd conectado, o comando sql especificado

	// verifica se o numero de linhas afetadas pelo ultimo comando sql executado no banco de dados é maior do que zero.
	// OBS: TODO COMANDO SQL EXECUTADO COM SUCESSO, RETORNARÁ UM NUMERO
	// DE LINHAS SUPEIOR A ZERO
	if(mysqli_affected_rows($conn) > 0)
	{
		// redirecionar para outra pagina
		header('location:jogos.php?msg=delok');
	}
	else
	{
		header('location:jogos.php?msg=delerro');
	}

}

// função para retornar dados de um jogo específico
function retornar_jogo($id)
{
	global $conn;

	$sql = "SELECT * FROM jogos_tb WHERE id = $id";

	$result = mysqli_query($conn, $sql);

	if(mysqli_affected_rows($conn) > 0)
	{
		$jogo = mysqli_fetch_assoc($result);

		return $jogo;
	}

	return null;
}

// função para editar um jogo específico
function editar_jogo($jogo)
{
	global $conn;

	$values = "titulo = '".$jogo['titulo']."', ".
			  "genero = '".$jogo['genero']."', ".
			  "ano    =  ".$jogo['ano'];

	$where = "id = ".$jogo['id'];

	$sql = "UPDATE jogos_tb SET $values WHERE $where";

	mysqli_query($conn, $sql);

	if(mysqli_affected_rows($conn) > 0)	
	{
		header('location:jogos.php?msg=edtok');
	}
	else
	{
		//header('location:jogos.php?msg=edterro');
		echo $sql;
	}
}


?>