<?php
	namespace Examen1314\includes\ModelScripts;
	use Examen1314\includes\DaoScripts\DaoTweets as daoTweets;
	class GestorTweets{
		private static $instancia;
		private $dao;

		public static function getSingleton() {
      if (  !self::$instancia instanceof self) {
         self::$instancia = new self;
      }
      return self::$instancia;
  }
		function __construct(){
			require_once '/Tweet.php';
		}

		public function getListaTweets(){
			$lista = daoTweets::getSingleton()->getListaTweets();
			$array = [];
			for($i= 0; $i <sizeof($lista)-1 ; $i++){
			$array[] = (new Tweet($lista[$i]['id'], $lista[$i]['idUsuario'], $lista[$i]['texto'], $lista[$i]['hora']));
			}
			return $array;
		}

		public static function nuevoTweet($idUsu, $texto){
			htmlspecialchars(trim(strip_tags($idUsu)));
			htmlspecialchars(trim(strip_tags($texto)));

			return daoTweets::getSingleton()->insertaTweet($idUsu,$texto);
		}
	}	
?>	