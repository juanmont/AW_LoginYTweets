<?php

namespace Examen1314\includes;
require_once __DIR__.'/config.php';
use \Examen1314\includes\ModelScripts\GestorTweets;

class FormNuevoTweet extends Form {

  public function __construct() {
    parent::__construct('FormNuevoTweet');
  }
  
  protected function generaCamposFormulario ($datos) {
  	if (Aplicacion::getSingleton()->usuarioLogueado()){
  			 $html = <<<EOS
				<fieldset>
				<legend align="left"> Escribe </legend>
					<textarea rows='4' cols='50' name="texto" id="texto"> </textarea> 
					<button type="submit">Nuevo</button>
				</fieldset>
EOS;
            echo $html; 
    	}
  }

  /**
   * Procesa los datos del formulario.
   */
  protected function procesaFormulario($datos) {
    $result = array();
    $ok = true;
    $texto = isset($datos['texto']) ? $datos['texto'] : null ;
    if ( !$texto) {
      $result[] = 'texto no introducido';
      $ok = false;
    }
    if ( $ok ) {
    	$idUsu = $_SESSION['id'];
     $salida = GestorTweets::nuevoTweet($idUsu, $texto);
      if ( $salida ) {
        // SEGURIDAD: Forzamos que se genere una nueva cookie de sesión por si la han capturado antes de hacer login
        $result = Aplicacion::getSingleton()->resuelve('/index.php');
      }else {
        $result[] = 'Tweet no ha sido guardado';
      }
    }
    return $result;
  }
}

