<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
</head>
<body>
	<h1>Datos del nuevo usuario</h1>
	<div id="Registro">

		<form name="registro" action="includes/formRegistro.php" method="POST">
			<p>Username: <input type="text" name="nombre"></p>
			<p>Password: <input type="password" name="pass"></p>
			<p>eMail: <input type="text" name="email"></p>
			<input type="submit" name="entrar" value="Entrar">
		</form>
	</div>

</body>
</html>