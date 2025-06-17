<?php
/**
 * Contato Controller
 */
class ContatoController extends MainController
{

    /**
    * INDEX
    *
    * Carrega a página "/views/Contato/index.php"
    */
    public function index() {
	// Título da página
	$this->title = 'Contato';
	
	// Carrega o modelo para este view
        $modelo = $this->load_model('contato/contato-model');
				
	/** Carrega os arquivos do view **/
		
	// /views/_includes/header.php
        require ABSPATH . '/views/_includes/header.php';
		
	// /views/_includes/menu.php
        require ABSPATH . '/views/_includes/menu.php';
		
	// /views/contato/index.php
        require ABSPATH . '/views/contato/contato-view.php';
		
	// /views/_includes/footer.php
        require ABSPATH . '/views/_includes/footer.php';
		
    } // index
	
   	
} // class ContatoController