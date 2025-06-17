<?php 
// Evita acesso direto a este arquivo
if ( ! defined('ABSPATH')) exit;
// Configura as URLs
$adm_uri = HOME_URI . '/registro-usuario/';
$edit_uri = $adm_uri . 'index/edit/';
$delete_uri = $adm_uri . 'index/del/';

// Carrega o método para inserir uma usuario
$modelo->incluir_usuario();

?>

<div style="padding: 35px;" align="center" class="card">
	<section class="container">
		<div class="row">
		<h3 class="center-align">USUÁRIO</h3>
		<div>

					<?php 
							// Mensagem de feedback para o usuário
							echo $modelo->form_msg;
					?>
			</div>

			<article class="">
				<form method="post" action="">
					<div class="input-field col s12">
						<i class="material-icons prefix">account_circle</i>
						<input type="text" name="usuario_login" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'usuario_login') );
					?>" placeholder="Login"/>
				    </div>

				    <div class="input-field col s12">
						<i class="material-icons prefix">mode_edit</i>
						<input type="password" name="usuario_senha" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'usuario_senha') );
					?>" placeholder="Senha"/>
				    </div>

				    <?php
				    	$area = $modelo->carrega_area();
				    ?>

				    <div class="input-field col s12">
    					<select name="usuario_fk_area">
							<option value="" disabled selected>Escolha sua opção</option>
								<?php foreach( $area as $fetch_areadata ): ?>

							<option value="<?php echo $fetch_areadata['area_id'];?>"> 
								<?php 
									echo $fetch_areadata['area_descricao'];
								?>
							</option>
							<?php endforeach;?>	
						</select>
					<label>Área</label>
  					</div>

				    <div class="input-field col s12">
						<i class="material-icons prefix">person</i>
						<input type="text" name="usuario_nome" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'usuario_nome') );
					?>" placeholder="Nome"/>
				    </div>

				    <div class="input-field col s6">
						<i class="material-icons prefix">mode_edit</i>
						<input type="text" name="usuario_cpf" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'usuario_cpf') );
					?>" placeholder="CPF"/>
				    </div>

				    <div class="input-field col s6">
						<i class="material-icons prefix">mode_edit</i>
						<input type="text" name="usuario_rg" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'usuario_rg') );
					?>" placeholder="RG"/>
				    </div>

				    <?php

				    $sexo = $modelo->carrega_sexo();
				    $estadocivil = $modelo->carrega_estadocivil();

				    ?>

				    <div class="input-field col s12">
    					<select name="usuario_fk_sexo">
							<option value="" disabled selected>Escolha sua opção</option>
								<?php foreach( $sexo as $fetch_sexodata ): ?>

							<option value="<?php echo $fetch_sexodata['sexo_id'];?>"> 
								<?php 
									echo $fetch_sexodata['sexo_descricao'];
								?>
							</option>
							<?php endforeach;?>	
						</select>
					<label>Sexo</label>
  					</div>

  					<div class="input-field col s12">
    					<select name="usuario_fk_estado_civil">
							<option value="" disabled selected>Escolha sua opção</option>
								<?php foreach( $estadocivil as $fetch_estadocivildata ): ?>

							<option value="<?php echo $fetch_estadocivildata['estadocivil_id'];?>"> 
								<?php 
									echo $fetch_estadocivildata['estadocivil_descricao'];
								?>
							</option>
							<?php endforeach;?>	
						</select>
					<label>Estado civil</label>
  					</div>

				    <div class="input-field col s12">
						<i class="material-icons prefix">mode_edit</i>
						<input type="text" name="usuario_profissao" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'usuario_profissao') );
					?>" placeholder="Profissao"/>
				    </div>

				    <div class="input-field col s12">
						<i class="material-icons prefix">edit_location</i>
						<input type="text" name="usuario_endereco_cep" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'usuario_endereco_cep') );
					?>" placeholder="CEP"/>
				    </div>

				    <div class="input-field col s12">
						<i class="material-icons prefix">edit_location</i>
						<input type="text" name="usuario_endereco_rua" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'usuario_endereco_rua') );
					?>" placeholder="Rua"/>
				    </div>

				    <div class="input-field col s6">
						<i class="material-icons prefix">edit_location</i>
						<input type="text" name="usuario_endereco_numero" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'usuario_endereco_numero') );
					?>" placeholder="Número"/>
				    </div>

				    <div class="input-field col s6">
						<i class="material-icons prefix">edit_location</i>
						<input type="text" name="usuario_endereco_cidade" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'usuario_endereco_cidade') );
					?>" placeholder="Cidade"/>
				    </div>

				    <div class="input-field col s12">
						<i class="material-icons prefix">edit_location</i>
						<input type="text" name="usuario_endereco_estado" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'usuario_endereco_estado') );
					?>" placeholder="Estado"/>
				    </div>

				    <?php

				    $pais = $modelo->carrega_pais();

				    ?>

				    <div class="input-field col s12">
    					<select name="usuario_endereco_pais">
							<option value="" disabled selected>Escolha sua opção</option>
								<?php foreach( $pais as $fetch_paisdata ): ?>

							<option value="<?php echo $fetch_paisdata['pais_id'];?>"> 
								<?php 
									echo $fetch_paisdata['pais_descricao'];
								?>
							</option>
							<?php endforeach;?>	
						</select>
					<label>País</label>
  					</div>

				    <div class="input-field col s6">
						<i class="material-icons prefix">contact_phone</i>
						<input type="text" name="usuario_celular" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'usuario_celular') );
					?>" placeholder="Celular"/>
				    </div>

				    <div class="input-field col s6">
						<i class="material-icons prefix">contact_mail</i>
						<input type="text" name="usuario_email" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'usuario_email') );
					?>" placeholder="Email"/>

					
  					</div>

  					<div>
				    <p class="center-align">	
			    			<!--<input type="submit" value="Inserir" >-->
			    			<button class="btn waves-effect waves-green green darken-4" type="submit" value="action">INSERIR
			    			</button>
			    	</p>
    		
			       </div>
			       <div>
			       	<input type="hidden" name="incluir_usuario" value="1" />
			       </div>
					
				</form>
			</article>
		</div>
	</section>
</div>





				
					
			