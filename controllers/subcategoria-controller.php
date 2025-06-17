<?php
/**
 * Subcategoria Controller
 */
class SubcategoriaController extends MainController
{


    /**
    * INDEX
    *
    * Carrega a página "/views/subcategoria/index.php"
    */
    public function index() {
	// Título da página
	$this->title = 'Subcategoria';
	
	// Carrega o modelo para este view
        $modelo = $this->load_model('subcategoria/subcategoria-model');
				
	/** Carrega os arquivos do view **/
		
	// /views/_includes/header.php
        require ABSPATH . '/views/_includes/header.php';
		
	// /views/_includes/menu.php
        require ABSPATH . '/views/_includes/menu.php';
		
	// /views/noticias/index.php
        require ABSPATH . '/views/subcategoria/subcategoria-view.php';
		
	// /views/_includes/footer.php
        require ABSPATH . '/views/_includes/footer.php';
		
    } // index
	
   	
} // class SubcategoriaController