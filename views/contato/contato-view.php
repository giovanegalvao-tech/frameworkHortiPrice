<?php 
// Evita acesso direto a este arquivo
if ( ! defined('ABSPATH')) exit;
// Configura as URLs
$adm_uri = HOME_URI . '/contato/';
		
$modelo->enviarMensagem();

$modelo->sem_limite = true;

?>


	<section class="container">
		<div class="row">
		<h3 class="center-align">CONTATO</h3>
			<article class="col s6 offset-s3">
				<form method="POST" action="">
					<div class="input-field">
						<i class="material-icons prefix">perm_identity</i>
						<input type="text" name="nome" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'nome') );
					?>" placeholder="Nome">
					</div>

					<div class="input-field">
						<i class="material-icons prefix">person_pin</i>
						<input type="text" name="sobrenome" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'sobrenome') );
					?>" placeholder="Sobrenome">
					</div>
					
					<div class="input-field">
						<i class="material-icons prefix">email</i>
						<input type="text" name="email" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'email') );
					?>" placeholder="Email">
					</div>

					<div class="input-field">
						<i class="material-icons prefix">mode_edit</i>
						<label for="mensagem">Mensagem</label>
						<textarea name="mensagem" id="" rows="10" class="materialize-textarea"  length="140" ></textarea>
					</div>
					
					<p class="center-align">	
    			<!--<input type="submit" value="Inserir" >-->
    			<button class="btn waves-effect waves-green green darken-4" type="submit" value="action">ENVIAR
    			</button>
    			</p>

    			<input type="hidden" name="enviarMensagem()" value="1" />


				</form>

			</article>
		</div>
	</section>

