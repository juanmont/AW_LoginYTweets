<?php
	use \AW_LoginYTweets\includes\Aplicacion as App;
	$app = App::getSingleton();
	if ($app->usuarioLogueado()) {
			$html = <<<EOS
					<div class="NuevoTweet">
							<h1> Publica nuevo post </h1>
					
						<div class = "textoTweet">
							<form name="vista" action="includes/formNuevoTweet.php" method="POST">
								<fieldset>
								<legend align="left"> Escribe </legend>
				  				<textarea rows='4' cols='50' name="texto" id="texto"> Tu comentario aqui... </textarea> 
				  				<input name="button" type="submit" value="Entrar" />
				  				</fieldset>
				  			</form>
						</div>
							
					</div>
EOS;
                    echo $html; 
 }
?>