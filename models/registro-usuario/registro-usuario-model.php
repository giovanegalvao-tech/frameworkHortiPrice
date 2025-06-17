<?php 
/**
 * Classe para gerenciar usuario
 */

class RegistroUsuarioModel 
{

	public $form_data;
	public $form_msg;
	public $db;

	
	public function __construct( $db = false ) {
        // Carrega o BD
		$this->db = $db;
	}


	public function incluir_usuario() {
	

		// Configura os dados do formulário
		$this->form_data = array();

		/*if ( 'POST' != $_SERVER['REQUEST_METHOD'] || empty( $_POST['incluir_usuario'] ) ) {
			return;
		}*/

		if ( 'POST' == $_SERVER['REQUEST_METHOD'] && ! empty ( $_POST ) ) {
		
			// Faz o loop dos dados do post
			foreach ( $_POST as $key => $value ) {
			
						// Configura os dados do post para a propriedade $form_data
						$this->form_data[$key] = $value;
				
							if ( empty( $value ) ) {
						
								// Configura a mensagem
								$this->form_msg = '<div class="z-depth-3 scale-transition" style="border-color: #d32f2f;
  background-color: #ef5350; color: white;">Atenção! Para efetuar o cadastrado do usuário é necessário informar todos os campos do formulário.</div>';
								
								// Termina
								return;
						
							}	
			}			
			
		} 

				
		// Verifica se a propriedade $form_data foi preenchida
		if( empty( $this->form_data ) ) {
			return;
		}

		// Verifica se o usuario existe
		$db_check_usuario = $this->db->query (
			'SELECT * FROM `usuario` WHERE `usuario_id` = ? OR `usuario_login` = ?', 
			array( 
				chk_array( $this->form_data, 'usuario_id'),
				chk_array( $this->form_data, 'usuario_login'),			
			) 
		);

		// Verifica se a consulta foi realizada com sucesso
		if ( ! $db_check_usuario ) {
			$this->form_msg = '<div class="z-depth-3 scale-transition" style="border-color: #d32f2f;
  background-color: #ef5350; color: white;">Erro ao enviar dados!</div>';
			return;
		}
		
		// Obtém os dados da base de dados MySQL
		$fetch_usuario = $db_check_usuario->fetch();
		
		// Configura o ID do produto
		$usuario_id = $fetch_usuario['usuario_id'];

		$password_hash = new PasswordHash(8, FALSE);
		
		// Cria o hash da senha
		$password = $password_hash->HashPassword( $this->form_data['usuario_senha'] );
		
		

	
		// Insere os dados na base de dados
		$query = $this->db->insert( 'usuario', array(
				'usuario_login' => chk_array( $this->form_data, 'usuario_login' ),
				'usuario_fk_area' => chk_array($this->form_data, 'usuario_fk_area'),
				'usuario_senha' => $password,
				'usuario_nome' => chk_array($this->form_data, 'usuario_nome'),
				'usuario_rg' => chk_array($this->form_data, 'usuario_rg'),
				'usuario_session_id' => md5(time()), 
				'usuario_cpf' => chk_array($this->form_data, 'usuario_cpf'),
				'usuario_fk_sexo' => chk_array($this->form_data, 'usuario_fk_sexo'),
				'usuario_fk_estado_civil' => chk_array($this->form_data, 'usuario_fk_estado_civil'),
				'usuario_endereco_cep' => chk_array($this->form_data, 'usuario_endereco_cep'),
				'usuario_endereco_rua' => chk_array($this->form_data, 'usuario_endereco_rua'),
				'usuario_endereco_cidade' => chk_array($this->form_data, 'usuario_endereco_cidade'),
				'usuario_endereco_estado' => chk_array($this->form_data, 'usuario_endereco_estado'),
				'usuario_endereco_pais' => chk_array($this->form_data, 'usuario_endereco_pais'),
				'usuario_endereco_cep' => chk_array($this->form_data, 'usuario_endereco_cep'),
				'usuario_celular' => chk_array($this->form_data, 'usuario_celular'),
				'usuario_email' => chk_array($this->form_data, 'usuario_email'),
			));
		
		// Verifica a consulta
		if ( $query ) {
		
			// Retorna uma mensagem
			$this->form_msg = '<div class="z-depth-3" style="border-color: #0288d1; background-color: #1b5e20; color: white;">Usuário cadastrado com sucesso!</div>';
			return;
			
		} 


	} // incluir_usuario

	
	
	/**
	 * Obtém a lista de area
	 */
	public function carrega_area() {
	
		// Simplesmente seleciona os dados na base de dados 
		$query = $this->db->query('SELECT * FROM `area`');
		
		// Verifica se a consulta está OK
		if ( ! $query ) {
			return array();
		}
		// Preenche a tabela com os dados da subcategoria
		return $query->fetchAll();
	} // carrega_area

	/**
	 * Obtém a lista de sexo
	 */
	public function carrega_sexo() {
	
		// Simplesmente seleciona os dados na base de dados 
		$query = $this->db->query('SELECT * FROM `sexo`');
		
		// Verifica se a consulta está OK
		if ( ! $query ) {
			return array();
		}
		// Preenche a tabela com os dados da subcategoria
		return $query->fetchAll();
	} // carrega_sexo


/**
	 * Obtém a lista de estado civil
	 */
	public function carrega_estadocivil() {
	
		// Simplesmente seleciona os dados na base de dados 
		$query = $this->db->query('SELECT * FROM `estadocivil`');
		
		// Verifica se a consulta está OK
		if ( ! $query ) {
			return array();
		}
		// Preenche a tabela com os dados da subcategoria
		return $query->fetchAll();
	} // carrega_estadocivil

/**
	 * Obtém a lista de país
	 */
	public function carrega_pais() {
	
		// Simplesmente seleciona os dados na base de dados 
		$query = $this->db->query('SELECT * FROM `pais`');
		
		// Verifica se a consulta está OK
		if ( ! $query ) {
			return array();
		}
		// Preenche a tabela com os dados da subcategoria
		return $query->fetchAll();
	} // carrega_pais


}