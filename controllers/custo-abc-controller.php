<?php
/**
 * Custo ABC Controller
 */
class CustoAbcController extends MainController
{


    /**
    * INDEX
    *
    * Carrega a página "/views/custo-abc/index.php"
    */
    public function index() {
	// Título da página
	$this->title = 'Custo ABC';
	
	// Carrega o modelo para este view
        $modelo = $this->load_model('custo-abc/custo-abc-model');
				
	/** Carrega os arquivos do view **/
		
	// /views/_includes/header.php
        require ABSPATH . '/views/_includes/header.php';
		
	// /views/_includes/menu.php
        require ABSPATH . '/views/_includes/menu.php';
		
	// /views/custo-abc-view/index.php
        require ABSPATH . '/views/custo-abc/custo-abc-view.php';
		
	// /views/_includes/footer.php
        require ABSPATH . '/views/_includes/footer.php';
		
    } // index
	
   	
} // class CustoABCController