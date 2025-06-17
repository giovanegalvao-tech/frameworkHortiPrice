<?php
/**
 * componente Controller
 */
class ComponenteController extends MainController
{


    /**
    * INDEX
    *
    * Carrega a página "/views/componente/index.php"
    */
    public function index() {
	// Título da página
	$this->title = 'Componente';
	
	// Carrega os modelos para este view
        $modelo = $this->load_model('componente/componente-model');
				
	/** Carrega os arquivos do view **/
		
	// /views/_includes/header.php
        require ABSPATH . '/views/_includes/header.php';
		
	// /views/_includes/menu.php
        require ABSPATH . '/views/_includes/menu.php';
		
	// /views/noticias/index.php
        require ABSPATH . '/views/componente/componente-view.php';
		
	// /views/_includes/footer.php
        require ABSPATH . '/views/_includes/footer.php';
		
    } // index
	
   	
} // class componenteController