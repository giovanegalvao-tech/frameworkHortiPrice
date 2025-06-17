<?php
/**
 * Ajuda - Controller de exemplo
 */
class AjudaLoginController extends MainController
{

	/**
	 * Carrega a página "/views/Ajuda-login/Ajuda-login-view.php"
	 */
    public function index() {
		// Título da página
		$this->title = 'Ajuda';
		
		// Parametros da função
		$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();
	
		// Essa página não precisa de modelo (model)
		
		/** Carrega os arquivos do view **/
		
		// /views/_includes/header.php
                require ABSPATH . '/views/_includes/header.php';
		
		// /views/Ajuda/Ajuda-view.php
                require ABSPATH . '/views/ajuda-login/ajuda-login-view.php';
		
		// /views/_includes/footer.php
                require ABSPATH . '/views/_includes/footer-login.php';
		
    } // index
	
} // class AjudaController