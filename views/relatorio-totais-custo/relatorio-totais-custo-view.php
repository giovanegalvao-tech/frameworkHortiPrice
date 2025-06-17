<?php 
// Evita acesso direto a este arquivo
if ( ! defined('ABSPATH')) exit;

$adm_uri = HOME_URI . '/relatorio-totais-custo/';
$edit_uri = $adm_uri . 'index/consultar/';
		
$modelo->consultar();

$modelo->sem_limite = true;
?>

<div style="padding: 35px;" align="center" class="card">

	
	<section class="container">
		<div class="row">
		<h3 class="center-align">RELATÓRIO TOTAIS POR CUSTO <a href="#" style="color: #000000" onclick="window.print();">
						<i class="material-icons prefix">local_printshop</i>
					</a></h3>

			<article class="col s6 offset-s3">
				<form method="post" action="">
					<?php
						$tipo = $modelo->carrega_tipo();
					?>

					<div class="input-field ">
    					<select name="tipo">
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

  					
  					
	    </div>
	    		
	    <p class="center-align">	
       			<button class="btn waves-effect waves-green green darken-4" type="submit" value="action">CONSULTAR
    			</button>
    	</p>

    	<p class="center-align">
    		<?php 
			// Mensagem de configuração caso o usuário tente apagar algo
				echo $modelo->form_confirma;
			?>
       	</p>	

				</form>

	<!-- LISTA as produtividades -->
	<?php $lista = $modelo->consultar(); ?>

	<div class="container" >
	<table class="centered">
		<thead>
			<tr>
				 <th>Custo</th>
				 <th>Valor Total</th>
			</tr>
		</thead>

	<?php if(!empty($lista)): foreach ($lista as $fetch_custo): ?>
			
			<tr>
				<td><?php echo $fetch_custo['custo_descricao']?></td>
				<td><?php echo $fetch_custo['total']?></td>
			</tr>
			
		<?php endforeach; endif;?>

		
   </ul>



	</table>

	<!--<ul class="pagination">
	    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
	    <li class=""><?php $modelo->paginacao(); ?><li>
	    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
   </ul>-->
	

</div> 

	