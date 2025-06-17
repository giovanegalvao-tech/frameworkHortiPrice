<?php
/**
 * Relatorio ABC Controller
 */
class RelatorioAbcController extends MainController
{


    /**
    * INDEX
    *
    * Carrega a página "/views/relatorio-abc/index.php"
    */
    public function index() {
	// Título da página
	$this->title = 'Relatório Custeio ABC';
	
	// Carrega o modelo para este view
        $modelo = $this->load_model('relatorio-abc/relatorio-abc-model');
				
	/** Carrega os arquivos do view **/
		
	// /views/_includes/header.php
        require ABSPATH . '/views/_includes/header.php';
		
	// /views/_includes/menu.php
        require ABSPATH . '/views/_includes/menu.php';
		
	// /views/noticias/index.php
        require ABSPATH . '/views/relatorio-abc/relatorio-abc-view.php';
		
	// /views/_includes/footer.php
        require ABSPATH . '/views/_includes/footer.php';
		
    } // index
	
   	
} // class RelatorioAbcController