<?php
namespace Examen1314\includes;
require_once __DIR__.'/config.php';
use Examen1314\includes\ModelScripts\GestorTweets as gestorTweets;
use Examen1314\includes\ModelScripts\GestorUsuarios as gestorUsuarios;
class Tweets{
		
		private $gestorTweets;
		private $gestorUsuarios;
		function __construct(){
			
		}

	public static function muestraTweets(){
		
		$lista = gestorTweets::getSingleton()->getListaTweets();

		foreach($lista as $t) {
			$texto =  $t->getTexto();
			$idUsu = $t->getIdUsu();
			$id = $t->getId();
			$hora= $t->getHora();

			$nombreUsuario = gestorUsuarios::getSingleton()->getNombreUsuario($idUsu);
			  	 $html = <<<EOS
  				<div class="tweet">
				  		<p> $texto </p>
						<p> Publicado por $nombreUsuario el $hora </p>
			  	</div> 
EOS;
			echo $html;  		
		}		 	
	}

}
?>