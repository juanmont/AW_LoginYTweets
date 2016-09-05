<?php
	class Usuario{
		private $id;
		private $nombre;
		private $pass;
		private $email;

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