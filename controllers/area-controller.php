<?php
/**
 * Area Controller
 */
class AreaController extends MainController
{


    /**
    * INDEX
    *
    * Carrega a página 
    */
    public function index() {
	// Título da página
	$this->title = 'Área';
	
	// Carrega o modelo para este view
        $modelo = $this->load_model('area/area-model');
				
	/** Carrega os arquivos do view **/
		
	// /views/_includes/header.php
        require ABSPATH . '/views/_includes/header.php';
		
	// /views/_includes/menu.php
        require ABSPATH . '/views/_includes/menu.php';
		
	// /views/noticias/index.php
        require ABSPATH . '/views/area/area-view.php';
		
	// /views/_includes/footer.php
        require ABSPATH . '/views/_includes/footer.php';
		
    } // index
	
   	
} // class AreaController