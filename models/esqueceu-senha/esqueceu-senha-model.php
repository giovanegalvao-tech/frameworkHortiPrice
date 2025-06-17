<?php 
/**
 * Classe para gerenciar usuario
 */

class EsqueceuSenhaModel 
{

	public $form_data;
	public $form_msg;
	public $db;

	
	public function __construct( $db = false ) {
        // Carrega o BD
		$this->db = $db;
	}


	


}