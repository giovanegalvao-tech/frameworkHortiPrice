<?php
/**
 * atividade Controller
 */
class AtividadeController extends MainController
{


    /**
    * INDEX
    *
    * Carrega a página "/views/atividade/index.php"
    */
    public function index() {
	// Título da página
	$this->title = 'atividade';
	
	// Carrega os modelos para este view
        $modelo = $this->load_model('atividade/atividade-model');
				
	/** Carrega os arquivos do view **/
		
	// /views/_includes/header.php
        require ABSPATH . '/views/_includes/header.php';
		
	// /views/_includes/menu.php
        require ABSPATH . '/views/_includes/menu.php';
		
	// /views/noticias/index.php
        require ABSPATH . '/views/atividade/atividade-view.php';
		
	// /views/_includes/footer.php
        require ABSPATH . '/views/_includes/footer.php';
		
    } // index
	
   	
} // class atividadeController