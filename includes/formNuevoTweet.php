<?php
include ('config.php');
require_once 'ModelScripts/GestorTweets.php';
use \AW_LoginYTweets\includes\Aplicacion as App;
//use \AW\proyecto\estatica\includes\ModelScripts\GestorUsuarios as GestorUsuarios;
	$app = App::getSingleton();
	$gestorT = new GestorTweets();//::new GestorUsuarios();
	$texto = $_REQUEST['texto'];
	$idUsu = $_SESSION['id'];
	$salida = $gestorT->nuevoTweet($idUsu, $texto);
	if ($salida){ //Se ha hecho el registro correctamente
			header("Location: ../index.php");
			echo "Tweet guardado";
	}
?>