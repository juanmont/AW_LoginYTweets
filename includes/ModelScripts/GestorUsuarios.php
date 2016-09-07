<?php
	namespace Examen1314\includes\ModelScripts;
	use Examen1314\includes\DaoScripts\DaoUsuarios as daoUsuarios;

	require __DIR__.'/Usuario.php';
	class GestorUsuarios{
		private static $instancia;
		private $dao;

		public static function getSingleton() {
      if (  !self::$instancia instanceof self) {
         self::$instancia = new self;
      }
      return self::$instancia;
  }

		function __construct(){
			$this->dao = daoUsuarios::getSingleton();
		}

		public function getNombreUsuario($idUsu){
			return $this->dao->getNombreUsuario($idUsu);
		}

		public function Login($nombre, $pass){
			htmlspecialchars(trim(strip_tags($nombre)));
			htmlspecialchars(trim(strip_tags($pass)));

			return $this->dao->login($nombre,$pass);
		}

		public function nuevoUsuario($nombre, $email, $pass){
			htmlspecialchars(trim(strip_tags($nombre)));
			htmlspecialchars(trim(strip_tags($pass)));
			htmlspecialchars(trim(strip_tags($email)));

			$id = $this->dao->insertarUsuario($nombre,$email, $pass);


			return new Usuario($id,$nombre,$pass, $email);
		}
	}	
?>	