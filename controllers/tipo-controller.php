<?php
/**
 * tipo Controller
 */
class TipoController extends MainController
{


    /**
    * INDEX
    *
    * Carrega a página "/views/tipo/index.php"
    */
    public function index() {
	// Título da página
	$this->title = 'Tipo';
	
	// Carrega os modelos para este view
        $modelo = $this->load_model('tipo/tipo-model');
				
	/** Carrega os arquivos do view **/
		
	// /views/_includes/header.php
        require ABSPATH . '/views/_includes/header.php';
		
	// /views/_includes/menu.php
        require ABSPATH . '/views/_includes/menu.php';
		
	// /views/noticias/index.php
        require ABSPATH . '/views/tipo/tipo-view.php';
		
	// /views/_includes/footer.php
        require ABSPATH . '/views/_includes/footer.php';
		
    } // index
	
   	
} // class tipoController