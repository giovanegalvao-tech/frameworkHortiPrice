<?php 
// Evita acesso direto a este arquivo
if ( ! defined('ABSPATH')) exit;

$adm_uri = HOME_URI . '/custo-abc/';
$edit_uri = $adm_uri . 'index/calcular/';
$delete_uri = $adm_uri . 'index/del/';
		
// Carrega o método para calcular preço de venda
$modelo->calcular();

$modelo->form_confirma = $modelo->excluir_custoabc();

$modelo->sem_limite = true;
?>

<div style="padding: 35px;" align="center" class="card">

	
	<section class="container">
		<div class="row">
		<h3 class="center-align">CUSTEIO ABC  <i class="material-icons prefix tooltipped" data-position="bottom" data-tooltip="ATENÇÃO! Para o cálculo correto da metodologia é necessário informar as atividades, seus respectivos direcionadores e os custos indiretos!">help</i></h3>

		<p class="center-align">
    		<?php 
			// Mensagem de configuração caso o usuário tente apagar algo
				echo $modelo->form_confirma;
			?>
       	</p>	

			<article class="col s6 offset-s3">
				<form method="post" action="">
					<?php
						$tipo = $modelo->carrega_tipo();
						$produtividade = $modelo->carrega_produtividade();
					?>

					<div class="input-field ">
    					<select name="custoabc_fk_tipo">
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
    					<select name="custoabc_fk_produtividade">
							<option value="" disabled selected>Escolha sua opção</option>
								<?php foreach( $produtividade as $fetch_produtividadedata ): ?>
							<option value="<?php echo $fetch_produtividadedata['produtividade_id'];?>"> 
								<?php 
									echo $fetch_produtividadedata['produtividade_mes']."/".$fetch_produtividadedata['produtividade_ano'];
								?>
							</option>
							<?php endforeach;?>	
						</select>
					<label>Mês/Ano</label>
  					</div>

  					<div class="input-field">
						<i class="material-icons prefix">description</i>
			      		<input type="text" name="custoabc_margem" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'custoabc_margem') );
					?>" placeholder="Margem de Contribuição (%)">
	    			</div>
	    </div>
	    		
	    <p class="center-align">	
       			<button class="btn waves-effect waves-green green darken-4" type="submit" value="action">CALCULAR
    			</button>
    	</p>

    	

				</form>


	<!-- LISTA as produtividades -->
	<?php $lista = $modelo->consultar_custoabc(); ?>

	<div class="container" >
	<table class="centered">
		<thead>
			<tr>
				 <th>ID</th>
				 <th>Tipo</th>
				 <th>Mês</th>
				 <th>Ano</th>
				 <th>Preço de Venda</th>
				 <th>Margem de Contribuição (%)</th>
			</tr>
		</thead>

		<?php foreach ($lista as $fetch_custoabcdata): ?>
			
			<tr>
				<td><?php echo $fetch_custoabcdata['custoabc_id']?></td>
				<td><?php echo $fetch_custoabcdata['tipo_descricao']?></td>
				<td><?php echo $fetch_custoabcdata['produtividade_mes']?></td>
				<td><?php echo $fetch_custoabcdata['produtividade_ano']?></td>
				<td><?php echo $fetch_custoabcdata['custoabc_precovenda']?></td>
				<td><?php echo $fetch_custoabcdata['custoabc_margem']?></td>
				<td>
					<a href="<?php echo $delete_uri . $fetch_custoabcdata['custoabc_id']?>" style="color: #000000" >
						<i class="material-icons prefix">clear</i>
					</a>
				</td>
				
			</tr>
			
		<?php endforeach; ?>

		
   </ul>



	</table>

	<ul class="pagination">
		    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
		    <li class=""><?php $modelo->paginacao(); ?></li>
	    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
	</ul>

</div> <!-- .wrap -->
	
	
</div>
