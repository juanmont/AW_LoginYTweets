<?php
	
	namespace Examen1314\includes\DaoScripts;
	use \Examen1314\includes\Aplicacion as App;
	use \Examen1314\includes\ModelScripts\Usuario;

	class DaoUsuarios{
		private static $instancia;

		public static function getSingleton() {
      if (  !self::$instancia instanceof self) {
         self::$instancia = new self;
      }
      return self::$instancia;
  }

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
			$sql = sprintf("SELECT * FROM usuarios WHERE nombre='%s' ", $con->real_escape_string($nombre));
			$rs = $con->query($sql) or die ($con->error);
			if($row = $rs->fetch_assoc()){    
					$passBd = $row["pass"];
					if (password_verify($pass.pimienta, $passBd)){
						$usuario = Usuario::crea($row["id"], $row["nombre"], $row["pass"], $row["correo"]);
						$app->login($usuario);
						return $usuario;
					}
			}
			return null;
		}

		public function insertarUsuario($nombre, $email, $pass){
			$app = App::getSingleton();
    		$con = $app->conexionBd();
			$pass = password_hash($pass.pimienta, PASSWORD_BCRYPT);
			$sql = "INSERT INTO usuarios(nombre, correo, pass) VALUES";
			$sql.= "('".$nombre."' , '".$email."', '".$pass."')";
			$rs = $con->query($sql) or die ($con->error);
			$num = $con->insert_id;
			return ($num);
		}

	}	
?>	