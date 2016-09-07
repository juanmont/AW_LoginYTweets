<?php
	namespace Examen1314\includes\DaoScripts;
	require_once __DIR__.'/../config.php';
	use \Examen1314\includes\Aplicacion as App;

	class DaoTweets{
		private static $instancia;

		public static function getSingleton() {
      if (  !self::$instancia instanceof self) {
         self::$instancia = new self;
      }
      return self::$instancia;
  }

		public function getListaTweets(){
			$app = App::getSingleton();
    		$con = $app->conexionBd();
			$sql = "SELECT * FROM tweets ORDER BY hora";
			$rs = $con->query($sql) or die ($con->error);
			if($rs != NULL)
			{
				while($lista[] = $rs->fetch_assoc());
				$rs->free();
				return ($lista);
			}
		}

		public function insertaTweet($idUsu, $texto){
			$app = App::getSingleton();
    		$con = $app->conexionBd();
			$sql = "INSERT INTO tweets(texto, hora, idUsuario) VALUES ";
			$sql.= "('".$texto."', sysdate() , '".$idUsu."')";
			$con->query($sql) or die ($con->error);
			$num = $con->insert_id;
			return ($num);
		}
	}
?>