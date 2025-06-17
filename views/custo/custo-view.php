<?php 
// Evita acesso direto a este arquivo
if ( ! defined('ABSPATH')) exit;
// Configura as URLs
$adm_uri = HOME_URI . '/custo/';
$edit_uri = $adm_uri . 'index/edit/';
$delete_uri = $adm_uri . 'index/del/';
		
// Carrega o método para obter uma custo
$modelo->editar_custo();
// Carrega o método para inserir uma custo
$modelo->incluir_custo();
// Carrega o método para apagar a custo
$modelo->form_confirma = $modelo->excluir_custo();
// Remove o limite de valores da lista de custo
//$modelo->sem_limite = true;
?>

<div style="padding: 35px;" align="center" class="card">

	
	<section class="container">
		<div class="row">
		<h3 class="center-align">CUSTO</h3>
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
			      		<input type="text" name="custo_descricao" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'custo_descricao') );
					?>" placeholder="Descrição">
	    			</div>
	    		
	    </div>
	    		
	    <p class="center-align">	
    			<!--<input type="submit" value="Inserir" >-->
    			<button class="btn waves-effect waves-green green darken-4" type="submit" value="action">INSERIR
    			</button>
    	</p>

    	
    

		<input type="hidden" name="incluir_custo" value="1" />
	</form>
	
	
	<!-- LISTA os custos -->
	<?php $lista = $modelo->consultar_custo(); ?>


	<div class="container" >
	<table class="centered">

		<thead>
			<tr>
				 <th>ID</th>
				 <th>Descrição</th>
			</tr>
		</thead>

		<?php foreach( $lista as $custo ):?>
			
			<tr>
				<td><?php echo $custo['custo_id']?></td>
				<td><?php echo $custo['custo_descricao']?></td>
				<td>
					<a href="<?php echo $edit_uri . $custo['custo_id']?>" style="color: #000000">
						<i class="material-icons prefix">edit</i>
					</a> 
					
					<a href="<?php echo $delete_uri . $custo['custo_id']?>" style="color: #000000">
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