<?php
/**
 * Relatorio de Totais Custo Controller
 */
class RelatorioTotaisCustoController extends MainController
{


    /**
    * INDEX
    *
    * Carrega a página "/views/relatorio-custo-unitario/index.php"
    */
    public function index() {
	// Título da página
	$this->title = 'Relatório Totais por Custo';
	
	// Carrega o modelo para este view
        $modelo = $this->load_model('relatorio-totais-custo/relatorio-totais-custo-model');
				
	/** Carrega os arquivos do view **/
		
	// /views/_includes/header.php
        require ABSPATH . '/views/_includes/header.php';
		
	// /views/_includes/menu.php
        require ABSPATH . '/views/_includes/menu.php';
		
	// /views/noticias/index.php
        require ABSPATH . '/views/relatorio-totais-custo/relatorio-totais-custo-view.php';
		
	// /views/_includes/footer.php
        require ABSPATH . '/views/_includes/footer.php';
		
    } // index
	
   	
} // class RelatorioTotaisCustoController