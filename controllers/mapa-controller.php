<?php
/**
 * Mapa - Controller de exemplo
 */
class MapaController extends MainController
{

	/**
	 * Carrega a página "/views/Mapa/Mapa-view.php"
	 */
    public function index() {
		// Título da página
		$this->title = 'Mapa';
		
		// Parametros da função
		$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();
	
		// Essa página não precisa de modelo (model)
		
		/** Carrega os arquivos do view **/
		
		// /views/_includes/header.php
                require ABSPATH . '/views/_includes/header.php';
		
		// /views/_includes/menu.php
                require ABSPATH . '/views/_includes/menu.php';
		
		// /views/Mapa/Mapa-view.php
                require ABSPATH . '/views/mapa/mapa-view.php';
		
		// /views/_includes/footer.php
                require ABSPATH . '/views/_includes/footer.php';
		
    } // index
	
} // class MapaController