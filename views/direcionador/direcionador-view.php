<?php 
// Evita acesso direto a este arquivo
if ( ! defined('ABSPATH')) exit;
// Configura as URLs
$adm_uri = HOME_URI . '/direcionador/';
$edit_uri = $adm_uri . 'index/edit/';
$delete_uri = $adm_uri . 'index/del/';
		
// Carrega o método para obter uma direcionador
$modelo->editar_direcionador();
// Carrega o método para inserir uma direcionador
$modelo->incluir_direcionador();
// Carrega o método para apagar a direcionador
$modelo->form_confirma = $modelo->excluir_direcionador();
// Remove o limite de valores da lista de direcionador
//$modelo->sem_limite = true;
?>

<div style="padding: 35px;" align="center" class="card">

	
	<section class="container">
		<div class="row">
		
		<h3 class="center-align">DIRECIONADOR</h3>
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
			      		<input type="text" name="direcionador_descricao" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'direcionador_descricao') );
					?>" placeholder="Descrição">
	    			</div>
	    		
	    </div>
	    		
	    <p class="center-align">	
    			<!--<input type="submit" value="Inserir" >-->
    			<button class="btn waves-effect waves-green green darken-4" type="submit" value="action">INSERIR
    			</button>
    	</p>

    	

		<input type="hidden" name="incluir_direcionador" value="1" />
	</form>
	
	<!-- LISTA AS direcionadorS -->
	<?php $lista = $modelo->consultar_direcionador(); ?>

	<div class="container" >
	<table class="centered">

		<thead>
		<tr>
			<th >ID</th>
			<th >Descrição</th>
		</tr>
		</thead>

		<?php foreach( $lista as $direcionador ):?>
			
			<tr>
				<td><?php echo $direcionador['direcionador_id']?></td>
				<td><?php echo $direcionador['direcionador_descricao']?></td>
				<td>
					<a href="<?php echo $edit_uri . $direcionador['direcionador_id']?>" style="color: #000000">
						<i class="material-icons prefix">edit</i>
					</a> 
					
					<a href="<?php echo $delete_uri . $direcionador['direcionador_id']?>" style="color: #000000" >
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