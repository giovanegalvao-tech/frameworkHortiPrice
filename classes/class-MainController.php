<?php

abstract class MainController extends Usuario
{
	public $db;
	public $phpass;
	public $title;
	public $login_required = false;
	public $parametros = array();
	
	
	public function __construct ( $parametros = array() ) {
	
		// Instancia do DB
		$this->db = new PrecoVendaDB();
		
		// Phpass
		$this->phpass = new PasswordHash(8, false);
		
		// Parâmetros
		$this->parametros = $parametros;
		
		// Verifica o login
		$this->check_userlogin();
		
	} 

	public abstract function index();
	
	/**
	 * Load model
	 *
	 * Carrega os modelos presentes na pasta /models/.
	 *
	 * @since 0.1
	 * @access public
	 */
	public function load_model( $model_name = false ) {
	
		// Um arquivo deverá ser enviado
		if ( ! $model_name ) return;
		
		// Garante que o nome do modelo tenha letras minúsculas
		$model_name =  strtolower( $model_name );
		
		// Inclui o arquivo
		$model_path = ABSPATH . '/models/' . $model_name . '.php';
		
		// Verifica se o arquivo existe
		if ( file_exists( $model_path ) ) {
		
			// Inclui o arquivo
			require_once $model_path;
			
			// Remove os caminhos do arquivo (se tiver algum)
			$model_name = explode('/', $model_name);
			
			// Pega só o nome final do caminho
			$model_name = end( $model_name );
			
			// Remove caracteres inválidos do nome do arquivo
			$model_name = preg_replace( '/[^a-zA-Z0-9]/is', '', $model_name );
			
			// Verifica se a classe existe
			if ( class_exists( $model_name ) ) {
			
				// Retorna um objeto da classe
				return new $model_name( $this->db, $this );
			
			}
			
			// The end :)
			return;
			
		} 
		
	} 

} 