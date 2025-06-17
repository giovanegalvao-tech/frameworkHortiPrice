<?php
/**
 * produtividade Controller
 */
class ProdutividadeController extends MainController
{


    /**
    * INDEX
    *
    * Carrega a página "/views/produtividade/index.php"
    */
    public function index() {
	// Título da página
	$this->title = 'Produtividade';
	
	// Carrega os modelos para este view
        $modelo = $this->load_model('produtividade/produtividade-model');
				
	/** Carrega os arquivos do view **/
		
	// /views/_includes/header.php
        require ABSPATH . '/views/_includes/header.php';
		
	// /views/_includes/menu.php
        require ABSPATH . '/views/_includes/menu.php';
		
	// /views/noticias/index.php
        require ABSPATH . '/views/produtividade/produtividade-view.php';
		
	// /views/_includes/footer.php
        require ABSPATH . '/views/_includes/footer.php';
		
    } // index
	
   	
} // class produtividadeController