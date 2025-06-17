<?php 


class ContatoModel extends MainModel
{

	
	public function __construct( $db = false, $controller = null ) {
		// Configura o DB (PDO)
		$this->db = $db;
		
		// Configura o controlador
		$this->controller = $controller;
		// Configura os parâmetros
		$this->parametros = $this->controller->parametros;
		// Configura os dados do usuário
		$this->userdata = $this->controller->userdata;
	}

	public function enviarMensagem(){

		/*$this->form_data = array();

		
		$headers = "MIME-Version: 1.1\r\n";
		$headers .= "Content-type: text/plain; charset=UTF-8\r\n";
		$headers .= "From: giovanegalvao@gmail.com\r\n"; // remetente
		$headers .= "Return-Path: giovanegalvao@gmail.com\r\n"; // return-path
		$email = chk_array( $this->form_data, 'email' );
		$mensagem = chk_array( $this->form_data, 'mensagem' );
		$envio = mail($email, "Contato", $mensagem, $headers);
		 
		if($envio)
		 echo "Mensagem enviada com sucesso";
		else
		 echo "A mensagem não pode ser enviada";	*/			
	}
}