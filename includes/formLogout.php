<?php
	require_once 'config.php';
	use \AW_LoginYTweets\includes\Aplicacion as App;
	$app = App::getSingleton();
	$app->logout();
	echo "<p> Logout correcto <a href='../index.php'> Inicio </a> </p>";
?>