<?php

	class tweet{
		private $id;
		private $idUsu;
		private $texto;
		private $hora;

		function __construct($id, $idUsu, $texto, $hora){
			$this->id = $id;
			$this->idUsu = $idUsu;
			$this->texto = $texto;
			$this->hora = $hora;
		}

		public function getId(){
			return $this->id;
		} 

		public function getIdUsu(){
			return $this->idUsu;
		} 

		public function getTexto(){
			return $this->texto;
		} 

		public function getHora(){
			return $this->hora;
		}  
	}
?>