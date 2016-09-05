<?php
	require 'Usuario.php';
	class GestorUsuarios{
		private $dao;

		function __construct(){
			require_once '/../DaoScripts/DaoUsuarios.php';
			$this->dao = new DaoUsuarios();
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