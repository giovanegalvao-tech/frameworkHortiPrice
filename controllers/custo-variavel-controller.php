<?php
/**
 * Area Controller
 */
class CustoVariavelController extends MainController
{


    /**
    * INDEX
    *
    * Carrega a página "/views/custo-variavel/index.php"
    */
    public function index() {
	// Título da página
	$this->title = 'Custo Variável';
	
	// Carrega o modelo para este view
        $modelo = $this->load_model('custo-variavel/custo-variavel-model');
				
	/** Carrega os arquivos do view **/
		
	// /views/_includes/header.php
        require ABSPATH . '/views/_includes/header.php';
		
	// /views/_includes/menu.php
        require ABSPATH . '/views/_includes/menu.php';
		
	// /views/noticias/index.php
        require ABSPATH . '/views/custo-variavel/custo-variavel-view.php';
		
	// /views/_includes/footer.php
        require ABSPATH . '/views/_includes/footer.php';
		
    } // index
	
   	
} // class CustoVariavelController