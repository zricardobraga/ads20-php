<?php  
if (empty($_GET['id'])) // se o paramento 'id' estiver vazuio
{
	header('location:jogos.php'); // devolve o usuario para a pagina jogos.php
}
else // senao
{
	$id = $_GET['id']; // armazena o paramentro 'id' na variavel $id
	include_once 'func.php'; // inclui o arquivo de funções

	deletar_jogo($id); // chama a função para deletar o jogo com o id recebido
}

?>