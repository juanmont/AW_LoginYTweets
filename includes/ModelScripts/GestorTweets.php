<?php
	class GestorTweets{
		private $dao;

		function __construct(){
			require_once '/../DaoScripts/DaoTweets.php';
			require_once '/Tweet.php';
			$this->dao = new DaoTweets();
		}

		public function getListaTweets(){
			$lista = $this->dao->getListaTweets();
			$array = new ArrayObject();
			for($i= 0; $i <sizeof($lista)-1 ; $i++){
			$array->append(new Tweet($lista[$i]['id'], $lista[$i]['idUsuario'], $lista[$i]['texto'], $lista[$i]['hora']));
			}
			return $array;
		}

		public function nuevoTweet($idUsu, $texto){
			htmlspecialchars(trim(strip_tags($idUsu)));
			htmlspecialchars(trim(strip_tags($texto)));

			return $this->dao->insertaTweet($idUsu,$texto);
		}
	}	
?>	