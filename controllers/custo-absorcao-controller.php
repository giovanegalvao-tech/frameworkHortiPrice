<?php
/**
 * Custo Absorção Controller
 */
class CustoAbsorcaoController extends MainController
{


    /**
    * INDEX
    *
    * Carrega a página "/views/custo-absorcao/index.php"
    */
    public function index() {
	// Título da página
	$this->title = 'Custo Por Absorção';
	
	// Carrega o modelo para este view
        $modelo = $this->load_model('custo-absorcao/custo-absorcao-model');
				
	/** Carrega os arquivos do view **/
		
	// /views/_includes/header.php
        require ABSPATH . '/views/_includes/header.php';
		
	// /views/_includes/menu.php
        require ABSPATH . '/views/_includes/menu.php';
		
	// /views/custo-absorcao-view/index.php
        require ABSPATH . '/views/custo-absorcao/custo-absorcao-view.php';
		
	// /views/_includes/footer.php
        require ABSPATH . '/views/_includes/footer.php';
		
    } // index
	
   	
} // class CustoAbsorçãoController