<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<link rel="stylesheet" type="text/css" href="includes/css/estilos.css"/>

	<script type="text/javascript">
		function reloadPage() {
		location.reload(true)
		}

		setInterval('reloadPage()','60000');
	</script>
</head>
<body>
	<?php require('includes/config.php'); ?>
	<div class="container">
		<h1>Bienvenido a TwitterUCM!</h1>
		<?php require 'includes/cabecera.php'; ?>
		<div class="contenido" id="contenido">
			<?php require 'includes/tweetNuevo.php'; ?>
			<?php
					require_once "includes/tweets.php";
					$vista = new vistaTweets();
					$vista->muestraTweets();
				?>	
		</div>
	</div>
</body>
</html>