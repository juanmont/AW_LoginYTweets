<?php
require_once __DIR__.'/includes/config.php';
use \Examen1314\includes\tweets;
?>
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
	<div class="container">
		<h1>Bienvenido a TwitterUCM!</h1>
		<?php
		require RUTA_APP.'../includes/cabecera.php'; 
		?>
		<div class="contenido" id="contenido">
			<div id="nuevo">
				<?php  $FormNuevoTweet = new \Examen1314\includes\FormNuevoTweet(); $FormNuevoTweet->gestiona(); ?>
			</div>
			
			<div id="listaTweets">
				<?php  Tweets::muestraTweets(); ?>
			</div>
				
		</div>
	</div>
</body>
</html>