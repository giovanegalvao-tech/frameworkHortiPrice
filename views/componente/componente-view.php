<?php 
// Evita acesso direto a este arquivo
if ( ! defined('ABSPATH')) exit;
// Configura as URLs
$adm_uri = HOME_URI . '/componente/';
$edit_uri = $adm_uri . 'index/edit/';
$delete_uri = $adm_uri . 'index/del/';
		

// Carrega o método para inserir uma componente
$modelo->incluir_componente();
$modelo->editar_componente();
// Carrega o método para apagar a componente
$modelo->form_confirma = $modelo->excluir_componente();
// Remove o limite de valores da lista de componente
//$modelo->sem_limite = true;

?>

<div style="padding: 35px;" align="center" class="card">
	<section class="container">
		<div class="row">
		<h3 class="center-align">COMPONENTE</h3>
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
					<input type="text" name="componente_descricao" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'componente_descricao') );
					?>" placeholder="Descrição"/>
					</div>

					<div class="input-field ">
						<i class="material-icons prefix">mode_edit</i>
					<input type="text" name="componente_quantidade" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'componente_quantidade') );
					?>" placeholder="Quantidade"/>
					</div>

					<div class="input-field ">
						<i class="material-icons prefix">attach_money</i>
					<input type="text" name="componente_valor_unitario" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'componente_valor_unitario') );
					?>" placeholder="Valor Unitário"/>
					</div>

					<?php

					$unidade = $modelo->carrega_unidade();

					?>

					<div class="input-field">
    					<select name="componente_fk_unidade">
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
					<input type="text" name="componente_mes" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'componente_mes') );
					?>" placeholder="Mês"/>
					</div>

					<div class="input-field">
						<i class="material-icons prefix">today</i>
					<input type="text" name="componente_ano" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'componente_ano') );
					?>" placeholder="Ano"/>
					</div>
			
					
					<?php
						$tipo = $modelo->carrega_tipo();
						$custo = $modelo->carrega_custo();
						$classificacao = $modelo->carrega_classificacao();
					?>

					<div class="input-field">
    					<select name="componente_fk_tipo">
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

  					<div class="input-field ">
    					<select name="componente_fk_custo">
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
    					<select name="componente_fk_classificacao">
							<option value="" disabled selected>Escolha sua opção</option>
								<?php foreach( $classificacao as $fetch_classificacaodata ): ?>
							<option value="<?php echo $fetch_classificacaodata['classificacao_id'];?>"> 
								<?php 
									echo $fetch_classificacaodata['classificacao_descricao'];
								?>
							</option>
							<?php endforeach;?>	
						</select>
					<label>Classificação</label>

					
  					</div>

  					<div>
				    <p class="center-align ">	
			    			<!--<input type="submit" value="Inserir" >-->
			    			<button class="btn waves-effect waves-green green darken-4" type="submit" value="action">INSERIR
			    			</button>
			    	</p>

			    	
			       </div>
					<input type="hidden" name="incluir_componente" value="1" />
				</form>
			</article>
		</div>
	</section>

	<!-- LISTA os componentes -->
	<?php 

		$lista = $modelo->consultar_componente(); 
		$modelo->posts_por_pagina = 5;

	?>
	

	<div>
	<table class="centered">
		<thead>
			<tr>
				 <th>ID</th>
				 <th>Descrição</th>
				 <th>Quantidade</th>
				 <th>Valor Unitário</th>
				 <th>Unidade</th>
				 <th>Mês</th>
				 <th>Ano</th>
				 <th>Tipo</th>
				 <th>Custo</th>
				 <th>Classificação</th>
			</tr>
		</thead>

        

		<?php foreach ($lista as $fetch_componentedata): ?>

					
			<tr>
				<td><?php echo $fetch_componentedata['componente_id']?></td>
				<td><?php echo $fetch_componentedata['componente_descricao']?></td>
				<td><?php echo $fetch_componentedata['componente_quantidade']?></td>
				<td><?php echo $fetch_componentedata['componente_valor_unitario']?></td>
				<td><?php echo $fetch_componentedata['unidade_descricao']?></td>
				<td><?php echo $fetch_componentedata['componente_mes']?></td>
				<td><?php echo $fetch_componentedata['componente_ano']?></td>
				<td><?php echo $fetch_componentedata['tipo_descricao']?></td>
				<td><?php echo $fetch_componentedata['custo_descricao']?></td>
				<td><?php echo $fetch_componentedata['classificacao_descricao']?></td>
				<td>
					<a href="<?php echo $edit_uri . $fetch_componentedata['componente_id']?>" style="color: #000000">
						<i class="material-icons prefix">edit</i>
					</a> 
					
					<a href="<?php echo $delete_uri . $fetch_componentedata['componente_id']?>" style="color: #000000">
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

	

</div> 
</div>