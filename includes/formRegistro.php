<?php
include ('config.php');
require_once 'ModelScripts/GestorUsuarios.php';
use \Examen1314\includes\Aplicacion as App;
//use \AW\proyecto\estatica\includes\ModelScripts\GestorUsuarios as GestorUsuarios;
	$app = App::getSingleton();
	$lista = new GestorUsuarios();//::new GestorUsuarios();
	$email = $_REQUEST['email'];
	$pass = $_REQUEST['pass'];
	$nombre = $_REQUEST['nombre'];
	$salida = $lista->nuevoUsuario($nombre, $email, $pass);
	if ($salida){ //Se ha hecho el registro correctamente
			$app->login($salida);
			header("Location: ../index.php");
			echo "Se ha registrado";
	}
	else{
		echo "No se ha registrado";
		header("Location: ../registrate.php");
	}
	

?>