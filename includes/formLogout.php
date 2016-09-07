<?php
	require_once __DIR__.'/config.php';
	use \Examen1314\includes\Aplicacion as App;
	$app = App::getSingleton();
	$app->logout();
	echo "<p> Logout correcto <a href='../index.php'> Inicio </a> </p>";
?>