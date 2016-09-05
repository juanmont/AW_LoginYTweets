<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<h1>Datos del nuevo usuario</h1>
	<div id="Registro">

		<form name="registro" action="includes/formLogin.php" method="POST">
			<p>Username: <input type="text" name="nombre"></p>
			<p>Password: <input type="password" name="pass"></p>
			<input type="submit" name="entrar" value="Entrar">
		</form>
	</div>

</body>
</html>