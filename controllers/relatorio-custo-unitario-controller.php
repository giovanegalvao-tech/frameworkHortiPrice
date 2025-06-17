<?php
/**
 * Relatorio de Custo Unitário Controller
 */
class RelatorioCustoUnitarioController extends MainController
{


    /**
    * INDEX
    *
    * Carrega a página "/views/relatorio-custo-unitario/index.php"
    */
    public function index() {
	// Título da página
	$this->title = 'Relatório Custo Unitário';
	
	// Carrega o modelo para este view
        $modelo = $this->load_model('relatorio-custo-unitario/relatorio-custo-unitario-model');
				
	/** Carrega os arquivos do view **/
		
	// /views/_includes/header.php
        require ABSPATH . '/views/_includes/header.php';
		
	// /views/_includes/menu.php
        require ABSPATH . '/views/_includes/menu.php';
		
	// /views/noticias/index.php
        require ABSPATH . '/views/relatorio-custo-unitario/relatorio-custo-unitario-view.php';
		
	// /views/_includes/footer.php
        require ABSPATH . '/views/_includes/footer.php';
		
    } // index
	
   	
} // class RelatorioCustoUnitarioController