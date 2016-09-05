<?php
include ('config.php');
require_once 'ModelScripts/GestorUsuarios.php';
use \Examen1314\includes\Aplicacion as App;
//use \AW\proyecto\estatica\includes\ModelScripts\GestorUsuarios as GestorUsuarios;
	$app = App::getSingleton();
	$lista = new GestorUsuarios();//::new GestorUsuarios();
	$pass = $_REQUEST['pass'];
	$nombre = $_REQUEST['nombre'];
	$salida = $lista->login($nombre,$pass);
	if ($salida){ //Se ha hecho el registro correctamente
			$app->login($salida);
			echo "<p> Login correcto <a href='../index.php'> Inicio </a> </p>";
	}
	else{
		echo "<p> Login incorrecto <a href='../index.php'> Inicio </a> </p>";
	}
	

?>