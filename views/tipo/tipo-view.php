<?php 
// Evita acesso direto a este arquivo
if ( ! defined('ABSPATH')) exit;
// Configura as URLs
$adm_uri = HOME_URI . '/tipo/';
$edit_uri = $adm_uri . 'index/edit/';
$delete_uri = $adm_uri . 'index/del/';
		
// Carrega o método para obter um tipo
$modelo->editar_tipo();
// Carrega o método para inserir uma tipo
$modelo->incluir_tipo();
// Carrega o método para apagar a tipo
$modelo->form_confirma = $modelo->excluir_tipo();
// Remove o limite de valores da lista de tipo
//$modelo->sem_limite = true;

?>

<div style="padding: 35px;" align="center" class="card">
	<section class="container">
		<div class="row">
		<h3 class="center-align">TIPO</h3>
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
						<i class="material-icons prefix">mode_edit</i>
			      		<input type="text" name="tipo_descricao" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'tipo_descricao') );
					?>" placeholder="Descrição">
	    			</div>

	    			<?php
						$area = $modelo->carrega_area();
						$categoria = $modelo->carrega_categoria();
						$subcategoria = $modelo->carrega_subcategoria();
					?>

					<div class="input-field col s12">
    					<select name="tipo_fk_area">
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
    					<select name="tipo_fk_categoria">
							<option value="" disabled selected>Escolha sua opção</option>
								<?php foreach( $categoria as $fetch_categoriadata ): ?>

							<option value="<?php echo $fetch_categoriadata['categoria_id'];?>"> 
								<?php 
									echo $fetch_categoriadata['categoria_descricao'];
								?>
							</option>
							<?php endforeach;?>	
						</select>
					<label>Categoria</label>
  					</div>

  					<div class="input-field col s12">
    					<select name="tipo_fk_subcategoria">
							<option value="" disabled selected>Escolha sua opção</option>
								<?php foreach( $subcategoria as $fetch_subcategoriadata ): ?>

							<option value="<?php echo $fetch_subcategoriadata['subcategoria_id'];?>"> 
								<?php 
									echo $fetch_subcategoriadata['subcategoria_descricao'];
								?>
							</option>
							<?php endforeach;?>	
						</select>
					<label>Subcategoria</label>

						
  					</div>

  					<div>
				    <p class="center-align">	
			    			<!--<input type="submit" value="Inserir" >-->
			    			<button class="btn waves-effect waves-green green darken-4" type="submit" value="action">INSERIR
			    			</button>
			    	</p>

			    	
    		
			       </div>
					<input type="hidden" name="incluir_tipo" value="1" />
				</form>
			</article>
		</div>
	</section>


	<!-- LISTA os tipos -->
	<?php $lista = $modelo->consultar_tipo(); ?>

	<div class="container" >
	<table class="centered">
		<thead>
			<tr>
				 <th>ID</th>
				 <th>Descrição</th>
				 <th>Área</th>
				 <th>Categoria</th>
				 <th>Subcategoria</th>
			</tr>
		</thead>

		<?php foreach ($lista as $fetch_tipodata): ?>
			
			<tr>
				<td><?php echo $fetch_tipodata['tipo_id']?></td>
				<td><?php echo $fetch_tipodata['tipo_descricao']?></td>
				<td><?php echo $fetch_tipodata['area_descricao']?></td>
				<td><?php echo $fetch_tipodata['categoria_descricao']?></td>
				<td><?php echo $fetch_tipodata['subcategoria_descricao']?></td>
				<td>
					<a href="<?php echo $edit_uri . $fetch_tipodata['tipo_id']?>" style="color: #000000">
						<i class="material-icons prefix">edit</i>
					</a> 
					
					<a href="<?php echo $delete_uri . $fetch_tipodata['tipo_id']?>" style="color: #000000">
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