<?php
/**
 * unidade Controller
 */
class UnidadeController extends MainController
{


    /**
    * INDEX
    *
    * Carrega a página "/views/unidade/index.php"
    */
    public function index() {
	// Título da página
	$this->title = 'Unidade';
	
	// Carrega o modelo para este view
        $modelo = $this->load_model('unidade/unidade-model');
				
	/** Carrega os arquivos do view **/
		
	// /views/_includes/header.php
        require ABSPATH . '/views/_includes/header.php';
		
	// /views/_includes/menu.php
        require ABSPATH . '/views/_includes/menu.php';
		
	// /views/noticias/index.php
        require ABSPATH . '/views/unidade/unidade-view.php';
		
	// /views/_includes/footer.php
        require ABSPATH . '/views/_includes/footer.php';
		
    } // index
	
   	
} // class unidadeController