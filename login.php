<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<h1>Login</h1>
	<div id="Login">
	<?php require_once __DIR__.'/includes/config.php';
		$formLogin = new \Examen1314\includes\FormLogin(); $formLogin->gestiona();?>
		
	</div>

</body>
</html>