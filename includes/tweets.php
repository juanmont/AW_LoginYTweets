<?php
class vistaTweets{
		
		private $gestorTweets;
		private $gestorUsuarios;
		function __construct(){
			require_once 'ModelScripts/GestorTweets.php';
			$this->gestorTweets = new GestorTweets();
			require_once 'ModelScripts/GestorUsuarios.php';
			$this->gestorUsuarios = new GestorUsuarios();
		}

	function muestraTweets(){
		
		$lista = $this->gestorTweets->getListaTweets();
		$iterator = $lista->getIterator();

		while($iterator->valid()) {
			$texto =  $iterator->current()->getTexto();
			$idUsu = $iterator->current()->getIdUsu();
			$id = $iterator->current()->getId();
			$hora= $iterator->current()->getHora();

			$nombreUsuario = $this->gestorUsuarios->getNombreUsuario($idUsu);
			  	 $html = <<<EOS
  				<div class="tweet">
				  		<p> $texto </p>
						<p> Publicado por $nombreUsuario el $hora </p>
			  	</div> 
EOS;
			echo $html;  		
		    $iterator->next();
		}		 	
	}

}
?>