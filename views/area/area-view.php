<?php 
// Evita acesso direto a este arquivo
if ( ! defined('ABSPATH')) exit;
// Configura as URLs
$adm_uri = HOME_URI . '/area/';
$edit_uri = $adm_uri . 'index/edit/';
$delete_uri = $adm_uri . 'index/del/';
		
// Carrega o método para obter uma area
$modelo->editar_area();
// Carrega o método para inserir uma area
$modelo->incluir_area();
// Carrega o método para apagar a area
$modelo->form_confirma = $modelo->excluir_area();
// Remove o limite de valores da lista de area
//$modelo->sem_limite = true;
?>

<div style="padding: 35px;" align="center" class="card">

	
	<section class="container">
		<div class="row">
		
		<h3 class="center-align">ÁREA</h3>
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
				<form method="post" action="" enctype="multipart/form-data">
					<div class="input-field">
						<i class="material-icons prefix">description</i>
			      		<input type="text" name="area_descricao" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'area_descricao') );
					?>" placeholder="Descrição">
	    			</div>
	    		
	    </div>
	    		
	    <p class="center-align">	
    			<!--<input type="submit" value="Inserir" >-->
    			<button class="btn waves-effect waves-green green darken-4" type="submit" value="action">INSERIR
    			</button>
    	</p>

    	<p class="center-align">
    		
       	</p>	
    

		<input type="hidden" name="incluir_area" value="1" />
	</form>
	
	<!-- LISTA AS AREAS -->
	<?php $lista = $modelo->consultar_area(); ?>
	

	<div class="container" >
	<table class="centered">

		<thead>
		<tr>
			<th >ID</th>
			<th >Descrição</th>
		</tr>
		</thead>

		<?php foreach( $lista as $area ):?>
			
			<tr>
				<td><?php echo $area['area_id']?></td>
				<td><?php echo $area['area_descricao']?></td>
				<td>
					<a href="<?php echo $edit_uri . $area['area_id']?>" style="color: #000000">
						<i class="material-icons prefix">edit</i>
					</a> 
					
					<a href="<?php echo $delete_uri . $area['area_id']?>" style="color: #000000" >
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