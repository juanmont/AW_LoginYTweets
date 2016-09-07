<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
</head>
<body>
	<h1>Datos del nuevo usuario</h1>
	<div id="Registro">
		<?php require_once __DIR__.'/includes/config.php';
		$formReg = new \Examen1314\includes\FormRegistro(); $formReg->gestiona(); ?>
	</div>

</body>
</html>