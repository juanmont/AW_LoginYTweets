<?php
	namespace Examen1314\includes\ModelScripts;
	class Usuario{
		private $id;
		private $nombre;
		private $pass;
		private $email;
		private static $instancia;

		public static function crea($id,$nombre,$pass,$email) {
 
         return new self($id,$nombre,$pass,$email);
  		}
  		
		function __construct($id,$nombre,$pass,$email){
			$this->id =$id;
			$this->nombre =$nombre;
			$this->pass =$pass;
			$this->email = $email;
		}

		public function getId(){
			return $this->id;
		}

		public function getNombre(){
			return $this->nombre;
		}

		public function getPass(){
			return $this->pass;
		}

		public function getEmail(){
			return $this->email;
		}

	}
?>