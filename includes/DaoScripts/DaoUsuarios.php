<?php
	
	use \Examen1314\includes\Aplicacion as App;

	class DaoUsuarios{
		

		public function getNombreUsuario($idUsu){
			$app = App::getSingleton();
    		$con = $app->conexionBd();
			$sql = "SELECT * FROM usuarios WHERE id = '$idUsu'";
			$rs = $con->query($sql) or die ($con->error);
			if($rs != NULL)
			{
		 		$nombre = $rs->fetch_assoc()['nombre'];
				$rs->free();
				return ($nombre);
			}
		}

		public function login($nombre, $pass){
			$app = App::getSingleton();
            $con = $app->conexionBd();
			$sql = sprintf("SELECT * FROM usuarios WHERE nombre='%s' OR correo='%s' ", $con->real_escape_string($nombre), $con->real_escape_string($nombre));
			$rs = $con->query($sql) or die ($con->error);
	
			if($row = $rs->fetch_assoc()){    
					//Si el usuario es correcto ahora validamos su contraseña
					$passBd = $row["pass"];
					if (password_verify($pass,$passBd)){
						//contraseña correcta hacemos sesion

						$usuario = new Usuario($row["id"], $row["nombre"], $row["pass"], $row["correo"]);
						$app->login($usuario);
						return $usuario;
					}
			}
			return null;
		}

		public function insertarUsuario($nombre, $email, $pass){
			$app = App::getSingleton();
    		$con = $app->conexionBd();
    		$opciones = [
				'cost' => 11,
				'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
			];

			$pass = password_hash($pass, PASSWORD_BCRYPT, $opciones);

			$sql = "INSERT INTO usuarios(nombre, correo, pass) VALUES";
			$sql.= "('".$nombre."' , '".$email."', '".$pass."')";
			$rs = $con->query($sql) or die ($con->error);
			$num = $con->insert_id;
			return ($num);
		}

	}	
?>	