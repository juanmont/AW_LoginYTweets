<?php
namespace Examen1314\includes;
require_once __DIR__.'/config.php';
use Examen1314\includes\ModelScripts\GestorUsuarios as gestorUsuarios;

class FormRegistro extends Form {

	const HTML5_EMAIL_REGEXP = '^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$';

  public function __construct() {
    parent::__construct('FormRegistro');
  }
  
  protected function generaCamposFormulario ($datos) {
    $camposFormulario=<<<EOF
		<fieldset>
		  <legend>Registro</legend>
		  <p><label>Name:</label> <input type="text" name="username" value="usuario"/></p>
		  <p><label>Password:</label> <input type="password" name="password" value="password"/><br /></p>
		  <p><label>email:</label> <input type="text" name="email" value="email"/><br /></p>
		  <button type="submit">Entrar</button>
		</fieldset>
EOF;
    return $camposFormulario;
  }

  /**
   * Procesa los datos del formulario.
   */
  protected function procesaFormulario($datos) {
    $result = array();
    $ok = true;
    $username = isset($datos['username']) ? $datos['username'] : null ;
    if ( !$username){// || ! mb_ereg_match(self::HTML5_EMAIL_REGEXP, $username) ) {
      $result[] = 'El nombre de usuario no es válido';
      $ok = false;
    }

    $password = isset($datos['password']) ? $datos['password'] : null ;
    if ( ! $password ||  mb_strlen($password) < 4 ) {
      $result[] = 'La contraseña no es válida';
      $ok = false;
    }

     $email = isset($datos['email']) ? $datos['email'] : null ;
    if ( ! $email || ! mb_ereg_match(self::HTML5_EMAIL_REGEXP, $email)) {
      $result[] = 'email invalido';
      $ok = false;
    }
    if ( $ok ) {
      $user = gestorUsuarios::getSingleton()->nuevoUsuario($username,$email, $password);
      if ( $user ) {
        // SEGURIDAD: Forzamos que se genere una nueva cookie de sesión por si la han capturado antes de hacer login
        session_regenerate_id(true);
        Aplicacion::getSingleton()->login($user);
        $result = \Examen1314\includes\Aplicacion::getSingleton()->resuelve('/index.php');
      }else {
        $result[] = 'Registro incorrecto';
      }
    }
    return $result;
  }
}

?>