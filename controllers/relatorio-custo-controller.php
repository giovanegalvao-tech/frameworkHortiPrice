<?php
/**
 * Relatorio de Custo Controller
 */
class RelatorioCustoController extends MainController
{


    /**
    * INDEX
    *
    * Carrega a página "/views/relatorio-custo/index.php"
    */
    public function index() {
	// Título da página
	$this->title = 'Relatório de Custos';
	
	// Carrega o modelo para este view
        $modelo = $this->load_model('relatorio-custo/relatorio-custo-model');
				
	/** Carrega os arquivos do view **/
		
	// /views/_includes/header.php
        require ABSPATH . '/views/_includes/header.php';
		
	// /views/_includes/menu.php
        require ABSPATH . '/views/_includes/menu.php';
		
	// /views/noticias/index.php
        require ABSPATH . '/views/relatorio-custo/relatorio-custo-view.php';
		
	// /views/_includes/footer.php
        require ABSPATH . '/views/_includes/footer.php';
		
    } // index
	
   	
} // class RelatorioCustoController