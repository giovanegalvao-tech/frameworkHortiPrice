<?php 
// Evita acesso direto a este arquivo
if ( ! defined('ABSPATH')) exit;
// Configura as URLs
$adm_uri = HOME_URI . '/unidade/';
$edit_uri = $adm_uri . 'index/edit/';
$delete_uri = $adm_uri . 'index/del/';
		
// Carrega o método para obter uma unidade
$modelo->editar_unidade();
// Carrega o método para inserir uma unidade
$modelo->incluir_unidade();
// Carrega o método para apagar a unidade
$modelo->form_confirma = $modelo->excluir_unidade();
// Remove o limite de valores da lista de unidade
//$modelo->sem_limite = true;
?>

<div style="padding: 35px;" align="center" class="card">

	
	<section class="container">
		<div class="row">
		<h3 class="center-align">UNIDADE</h3>
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
			      		<input type="text" name="unidade_descricao" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'unidade_descricao') );
					?>" placeholder="Descrição">
	    			</div>
	    		
	    </div>
	    		
	    <p class="center-align">	
    			<!--<input type="submit" value="Inserir" >-->
    			<button class="btn waves-effect waves-green green darken-4" type="submit" value="action">INSERIR
    			</button>
    	</p>

    	
    

		<input type="hidden" name="incluir_unidade" value="1" />
	</form>
	
	<!-- LISTA AS unidadeS -->
	<?php $lista = $modelo->consultar_unidade(); ?>

	<div class="container" >
	<table class="centered">

		<thead>
		<tr>
			<th >ID</th>
			<th >Descrição</th>
		</tr>
		</thead>

		<?php foreach( $lista as $unidade ):?>
			
			<tr>
				<td><?php echo $unidade['unidade_id']?></td>
				<td><?php echo $unidade['unidade_descricao']?></td>
				<td>
					<a href="<?php echo $edit_uri . $unidade['unidade_id']?>" style="color: #000000">
						<i class="material-icons prefix">edit</i>
					</a> 
					
					<a href="<?php echo $delete_uri . $unidade['unidade_id']?>" style="color: #000000" >
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
</div> <!-- .wrap -->