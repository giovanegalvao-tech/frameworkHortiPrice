<?php

class EsqueceuSenhaController extends MainController
{

    /**
    * Carrega a página "/views/login/index.php"
    */
    public function index() {
	// Título da página
	$this->title = 'Redefinição Senha';
		
	// Parametros da função
	$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();
	
	// Login não tem Model
		
	/** Carrega os arquivos do view **/
		
	// /views/_includes/header.php
        require ABSPATH . '/views/_includes/header.php';
		
   	// /views/home/login-view.php
        require ABSPATH . '/views/esqueceu-senha/esqueceu-senha-view.php';
		
	// /views/_includes/footer.php
        require ABSPATH . '/views/_includes/footer-login.php';
		
    } // index
	
} // class LoginController