<?php
	use \Examen1314\includes\Aplicacion as App;
	$app = App::getSingleton();
 	echo '<div id="cabecera">';
			echo '<div class="login">';
				if ($app->usuarioLogueado()) {
					echo 'Estas registrado como ' .$_SESSION['nombre']. '> <a href="includes/formLogout.php">Logout</a> <';
				} else {
					echo '<p>Usuario desconocido. <a href="login.php">Inicia sesion</a> o <a href="registro.php">Registrate</a>!</p>';
				}
			echo '</div>';
 	echo '</div>'
?>