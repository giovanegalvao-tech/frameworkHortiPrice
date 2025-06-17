<?php 
// Evita acesso direto a este arquivo
if ( ! defined('ABSPATH')) exit;
// Configura as URLs
$adm_uri = HOME_URI . '/atividade/';
$edit_uri = $adm_uri . 'index/edit/';
$delete_uri = $adm_uri . 'index/del/';
		

// Carrega o método para inserir uma atividade
$modelo->incluir_atividade();
$modelo->editar_atividade();
// Carrega o método para apagar a atividade
$modelo->form_confirma = $modelo->excluir_atividade();
// Remove o limite de valores da lista de atividade
//$modelo->sem_limite = true;

?>

<div style="padding: 35px;" align="center" class="card">
	<section class="container">
		<div class="row">
		<h3 class="center-align">ATIVIDADE</h3>
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
					<div class="input-field">
						<i class="material-icons prefix">description</i>
					<input type="text" name="atividade_descricao" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'atividade_descricao') );
					?>" placeholder="Descrição"/>
					</div>


					<?php

						$custo = $modelo->carrega_custo();
						$direcionador = $modelo->carrega_direcionador();
					?>

					<div class="input-field ">
    					<select name="atividade_fk_custo">
							<option value="" disabled selected>Escolha sua opção</option>
								<?php foreach( $custo as $fetch_custodata ): ?>
							<option value="<?php echo $fetch_custodata['custo_id'];?>"> 
								<?php 
									echo $fetch_custodata['custo_descricao'];
								?>
							</option>
							<?php endforeach;?>	
						</select>
					<label>Custo</label>

					<div class="input-field ">
    					<select name="atividade_fk_direcionador">
							<option value="" disabled selected>Escolha sua opção</option>
								<?php foreach( $direcionador as $fetch_direcionadordata ): ?>
							<option value="<?php echo $fetch_direcionadordata['direcionador_id'];?>"> 
								<?php 
									echo $fetch_direcionadordata['direcionador_descricao'];
								?>
							</option>
							<?php endforeach;?>	
						</select>
					<label>Direcionador</label>

					<div class="input-field ">
						<i class="material-icons prefix">mode_edit</i>
					<input type="text" name="atividade_direcionador_quantidade" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'atividade_direcionador_quantidade') );
					?>" placeholder="Quantidade (Direcionador)"/>
					</div>

					<?php

					$unidade = $modelo->carrega_unidade();

					?>

					<div class="input-field">
    					<select name="atividade_fk_unidade">
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
				
					

  					<div>
				    <p class="center-align ">	
			    			<!--<input type="submit" value="Inserir" >-->
			    			<button class="btn waves-effect waves-green green darken-4" type="submit" value="action">INSERIR
			    			</button>
			    	</p>

			    	
			       </div>
					<input type="hidden" name="incluir_atividade" value="1" />
				</form>
			</article>
		</div>
	</section>

	
	<!-- LISTA os atividades -->
	<?php $lista = $modelo->consultar_atividade(); ?>

	<div  >
	<table class="centered">
		<thead>
			<tr>
				 <th>ID</th>
				 <th>Descrição</th>
				 <th>Custo</th>
				 <th>Direcionador</th>
				 <th>Quantidade (Direcionador)</th>
				 <th>Unidade</th>
			</tr>
		</thead>

		<?php foreach ($lista as $fetch_atividadedata): ?>
			
			<tr>
				<td><?php echo $fetch_atividadedata['atividade_id']?></td>
				<td><?php echo $fetch_atividadedata['atividade_descricao']?></td>
				<td><?php echo $fetch_atividadedata['custo_descricao']?></td>
				<td><?php echo $fetch_atividadedata['direcionador_descricao']?></td>
				<td><?php echo $fetch_atividadedata['atividade_direcionador_quantidade']?></td>
				<td><?php echo $fetch_atividadedata['unidade_descricao']?></td>

				<td>
					<a href="<?php echo $edit_uri . $fetch_atividadedata['atividade_id']?>" style="color: #000000">
						<i class="material-icons prefix">edit</i>
					</a> 
					
					<a href="<?php echo $delete_uri . $fetch_atividadedata['atividade_id']?>" style="color: #000000">
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
</div>