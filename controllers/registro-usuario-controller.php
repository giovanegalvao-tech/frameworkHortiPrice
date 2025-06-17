<?php
/**
 * Registro de Usuario Controller
 */
class RegistroUsuarioController extends MainController
{


    /**
    * INDEX
    *
    * Carrega a página "/views/registro-usuario/index.php"
    */
    public function index() {
	// Título da página
	$this->title = 'Cadastro de Usuário';
	
	// Carrega os modelos para este view
        $modelo = $this->load_model('registro-usuario/registro-usuario-model');
				
	/** Carrega os arquivos do view **/
		
	// /views/_includes/header.php
        require ABSPATH . '/views/_includes/header.php';
		
	// /views/noticias/index.php
        require ABSPATH . '/views/registro-usuario/registro-usuario-view.php';
		
	// /views/_includes/footer.php
        require ABSPATH . '/views/_includes/footer-login.php';
		
    } // index
	
   	
} // class RegistroUsuarioController