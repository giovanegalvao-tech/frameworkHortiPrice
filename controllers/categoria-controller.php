<?php
/**
 * Categoria Controller
 */
class CategoriaController extends MainController
{

    /**
    * INDEX
    *
    * Carrega a página "/views/categoria/index.php"
    */
    public function index() {
	// Título da página
	$this->title = 'Categoria';
	
	// Carrega o modelo para este view
        $modelo = $this->load_model('categoria/categoria-model');
				
	/** Carrega os arquivos do view **/
		
	// /views/_includes/header.php
        require ABSPATH . '/views/_includes/header.php';
		
	// /views/_includes/menu.php
        require ABSPATH . '/views/_includes/menu.php';
		
	// /views/noticias/index.php
        require ABSPATH . '/views/categoria/categoria-view.php';
		
	// /views/_includes/footer.php
        require ABSPATH . '/views/_includes/footer.php';
		
    } // index
	
   	
} // class CategoriaController