<?php 
// Evita acesso direto a este arquivo
if ( ! defined('ABSPATH')) exit;
// Configura as URLs
$adm_uri = HOME_URI . '/produtividade/';
$edit_uri = $adm_uri . 'index/edit/';
$delete_uri = $adm_uri . 'index/del/';
		

// Carrega o método para inserir uma produtividade
$modelo->incluir_produtividade();
$modelo->editar_produtividade();
// Carrega o método para apagar a produtividade
$modelo->form_confirma = $modelo->excluir_produtividade();
// Remove o limite de valores da lista de produtividade
//$modelo->sem_limite = true;

?>

<div style="padding: 35px;" align="center" class="card">
	<section class="container">
		<div class="row">
		<h3 class="center-align">PRODUTIVIDADE</h3>
			<div>

					<?php 
							// Mensagem de feedback para o usuário
							echo $modelo->form_msg;
					?>
			</div>

			<div>
			    		<?php 
						// Mensagem de configuração caso o usuário tente apagar algo
							echo $modelo->form_confirma;
						?>
			</div>
			<article class="col s6 offset-s3">
				<form method="post" action="">
					
					<div class="input-field ">
						<i class="material-icons prefix">attach_money</i>
					<input type="text" name="produtividade_valor" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'produtividade_valor') );
					?>" placeholder="Valor"/>
					</div>

					

					<div class="input-field ">
    					<select name="produtividade_fk_unidade">
							<option value="" disabled selected>Escolha sua opção</option>
								<?php foreach( $unidade as $fetch_unidadedata ): ?>
							<option value="<?php echo $fetch_unidadedata['unidade_id'];?>"> 
								<?php 
									echo $fetch_unidadedata['unidade_descricao'];
								?>
							</option>
							<?php endforeach;?>	
						</select>
					<label>Unidade</label>
  					</div>
				
					<div class="input-field ">
						<i class="material-icons prefix">today</i>
					<input type="text" name="produtividade_mes" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'produtividade_mes') );
					?>" placeholder="Mês"/>
					</div>

					<div class="input-field ">
						<i class="material-icons prefix">today</i>
					<input type="text" name="produtividade_ano" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'produtividade_ano') );
					?>" placeholder="Ano"/>
					</div>
			
					
					<?php
						$tipo = $modelo->carrega_tipo();
					
					?>

					<div class="input-field">
    					<select name="produtividade_fk_tipo">
							<option value="" disabled selected>Escolha sua opção</option>
								<?php foreach( $tipo as $fetch_tipodata ): ?>
							<option value="<?php echo $fetch_tipodata['tipo_id'];?>"> 
								<?php 
									echo $fetch_tipodata['tipo_descricao'];
								?>
							</option>
							<?php endforeach;?>	
						</select>
					<label>Tipo</label>
  					
					
  					</div>

  					<div>
				    <p class="center-align ">	
			    			<!--<input type="submit" value="Inserir" >-->
			    			<button class="btn waves-effect waves-green green darken-4" type="submit" value="action">INSERIR
			    			</button>
			    	</p>

			    	
    		
			       </div>
					<input type="hidden" name="incluir_produtividade" value="1" />
				</form>
			</article>
		</div>
	</section>



			
	<!-- LISTA as produtividades -->
	<?php $lista = $modelo->consultar_produtividade(); ?>

	<div class="container" >
	<table class="centered">
		<thead>
			<tr>
				 <th>ID</th>
				 <th>Valor</th>
				 <th>Unidade</th>
				 <th>Mês</th>
				 <th>Ano</th>
				 <th>Tipo</th>
			</tr>
		</thead>

		<?php foreach ($lista as $fetch_produtividadedata): ?>
			
			<tr>
				<td><?php echo $fetch_produtividadedata['produtividade_id']?></td>
				<td><?php echo $fetch_produtividadedata['produtividade_valor']?></td>
				<td><?php echo $fetch_produtividadedata['unidade_descricao']?></td>
				<td><?php echo $fetch_produtividadedata['produtividade_mes']?></td>
				<td><?php echo $fetch_produtividadedata['produtividade_ano']?></td>
				<td><?php echo $fetch_produtividadedata['tipo_descricao']?></td>
				<td>
					<a href="<?php echo $edit_uri . $fetch_produtividadedata['produtividade_id']?>" style="color: #000000">
						<i class="material-icons prefix">edit</i>
					</a> 
					
					<a href="<?php echo $delete_uri . $fetch_produtividadedata['produtividade_id']?>" style="color: #000000">
						<i class="material-icons prefix">clear</i>
					</a>
				</td>
			</tr>
			
		<?php endforeach; ?>

	</table>

	<ul class="pagination">
	    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
	    <li class=""><?php $modelo->paginacao(); ?><li>
	    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
   </ul>

</div> <!-- .wrap -->