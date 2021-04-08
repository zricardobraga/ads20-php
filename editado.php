<?php  
if( empty($_POST['titulo']) || 
	empty($_POST['genero']) || 
	empty($_POST['ano']) 	|| 
	empty($_POST['id']) ) 
{
	header('location:jogos.php?msg=edtblank');
}
else
{
	$jogo['id'] 	= $_POST['id'];
	$jogo['titulo'] = $_POST['titulo'];
	$jogo['genero'] = $_POST['genero'];
	$jogo['ano'] 	= $_POST['ano'];

	include_once 'func.php';
	editar_jogo($jogo);
}
?>