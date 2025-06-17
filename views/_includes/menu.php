<?php if ( ! defined('ABSPATH')) exit; ?>

<?php if ( $this->login_required && ! $this->logged_in ) return; ?>




<ul id="dropdown1" class="dropdown-content ">
            <li><a href="<?php echo HOME_URI;?>/area/" class="green-text text-darken-4">Área</a></li>
			<li><a href="<?php echo HOME_URI;?>/categoria/" class="green-text text-darken-4">Categoria</a></li>
			<li><a href="<?php echo HOME_URI;?>/subcategoria/" class="green-text text-darken-4">Subcategoria</a></li>
			<li><a href="<?php echo HOME_URI;?>/custo/" class="green-text text-darken-4">Custo</a></li>
			<li><a href="<?php echo HOME_URI;?>/tipo/" class="green-text text-darken-4">Tipo</a></li>
			<li><a href="<?php echo HOME_URI;?>/unidade/" class="green-text text-darken-4">Unidade</a></li>
			<li><a href="<?php echo HOME_URI;?>/componente/" class="green-text text-darken-4">Componente</a></li>
			<li><a href="<?php echo HOME_URI;?>/produtividade/" class="green-text text-darken-4">Produtividade</a></li>
			<li><a href="<?php echo HOME_URI;?>/direcionador/" class="green-text text-darken-4">Direcionador</a></li>
			<li><a href="<?php echo HOME_URI;?>/atividade/" class="green-text text-darken-4">Atividade</a></li>

</ul>

<ul id="dropdown2" class="dropdown-content">
			<li><a href="<?php echo HOME_URI;?>/custo-abc/" class="green-text text-darken-4">Custeio ABC</a></li>
			<li><a href="<?php echo HOME_URI;?>/custo-absorcao/" class="green-text text-darken-4">Custeio Por Absorção</a></li> 
            <li><a href="<?php echo HOME_URI;?>/custo-variavel/" class="green-text text-darken-4">Custeio Variável</a></li>
                    
</ul>

<ul id="dropdown3" class="dropdown-content">
			<li><a href="<?php echo HOME_URI;?>/relatorio-custo/" class="green-text text-darken-4">Custos de Produção</a></li>
			<li><a href="<?php echo HOME_URI;?>/relatorio-custo-unitario/" class="green-text text-darken-4">Custo Unitário</a></li>
			<li><a href="<?php echo HOME_URI;?>/relatorio-totais-custo/" class="green-text text-darken-4">Totais por Custo</a></li>
			<li><a href="<?php echo HOME_URI;?>/relatorio-abc/" class="green-text text-darken-4">Custeio ABC</a></li>
			   
</ul>

<nav class="green darken-4">
	<div class="nav-wrapper">
		<a href="<?php echo HOME_URI . '/home';?>" class="brand-logo"><img src="<?php echo HOME_URI;?>/imagens/icone.png" class="responsive-img"></img>
			<a href="#" data-activates="menu-mobile" class="button-collapse">
				<i class="material-icons">menu</i>
			</a>

			<ul class="right hide-on-med-and-down">
				<li><a class="dropdown-button" id="btn-dropdown1" href="#!" data-activates="dropdown1">Cadastros<i class="material-icons right">arrow_drop_down</i></a></li>
				<li><a class="dropdown-button" id="btn-dropdown2" href="#!" data-activates="dropdown2">Simulações<i class="material-icons right">arrow_drop_down</i></a></li>
				<li><a class="dropdown-button" id="btn-dropdown3" href="#!" data-activates="dropdown3">Relatórios<i class="material-icons right">arrow_drop_down</i></a></li>
				<li><a href="<?php echo HOME_URI;?>/ajuda/">Ajuda</a></li>
				<li><a href="<?php echo HOME_URI;?>">Sair</a></li>
			</ul>

			<ul class="side-nav" id="menu-mobile">
			<li><a href="#">Cadastros</a></li>
			<li><a href="<?php echo HOME_URI;?>/area/" class="green-text text-darken-4">Área</a></li>
			<li><a href="<?php echo HOME_URI;?>/categoria/" class="green-text text-darken-4">Categoria</a></li>
			<li><a href="<?php echo HOME_URI;?>/subcategoria/" class="green-text text-darken-4">Subcategoria</a></li>
			<li><a href="<?php echo HOME_URI;?>/custo/" class="green-text text-darken-4">Custo</a></li>
			<li><a href="<?php echo HOME_URI;?>/tipo/" class="green-text text-darken-4">Tipo</a></li>
			<li><a href="<?php echo HOME_URI;?>/unidade/" class="green-text text-darken-4">Unidade</a></li>
			<li><a href="<?php echo HOME_URI;?>/componente/" class="green-text text-darken-4">Componente</a></li>
			<li><a href="<?php echo HOME_URI;?>/produtividade/" class="green-text text-darken-4">Produtividade</a></li>
			<li><a href="<?php echo HOME_URI;?>/direcionador/" class="green-text text-darken-4">Direcionador</a></li>
			<li><a href="<?php echo HOME_URI;?>/atividade/" class="green-text text-darken-4">Atividade</a></li>

			<li><a href="#">Simulações</a></li>
			<li><a href="<?php echo HOME_URI;?>/custo-abc/" class="green-text text-darken-4">Custeio ABC</a></li>
			<li><a href="<?php echo HOME_URI;?>/custo-absorcao/" class="green-text text-darken-4">Custeio Por Absorção</a></li> 
            <li><a href="<?php echo HOME_URI;?>/custo-variavel/" class="green-text text-darken-4">Custeio Variável</a></li>

            <li><a href="#">Relatórios</a></li>
            <li><a href="<?php echo HOME_URI;?>/relatorio-custo/" class="green-text text-darken-4">Custos de Produção</a></li>
			<li><a href="<?php echo HOME_URI;?>/relatorio-custo-unitario/" class="green-text text-darken-4">Custo Unitário</a></li>
			<li><a href="<?php echo HOME_URI;?>/relatorio-totais-custo/" class="green-text text-darken-4">Totais por Custo</a></li>
			<li><a href="<?php echo HOME_URI;?>/relatorio-abc/" class="green-text text-darken-4">Custeio ABC</a></li>

			 
			<li><a href="<?php echo HOME_URI;?>/ajuda/">Ajuda</a></li>
			<li><a href="<?php echo HOME_URI;?>">Sair</a></li>
           </ul>

	</div>
</nav>

