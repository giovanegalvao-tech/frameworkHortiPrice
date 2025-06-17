<?php


class RelatorioTotaisCustoModel extends MainModel
{

	public $posts_por_pagina = 5;
	
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

	public function consultar() {

		// Configura os dados do formulário
		$this->form_data = array();

		/*if ( 'POST' != $_SERVER['REQUEST_METHOD'] || empty( $_POST['incluir_produtividade'] ) ) {
			return;
		}*/

		if ( 'POST' == $_SERVER['REQUEST_METHOD'] && ! empty ( $_POST ) ) {
		
			// Faz o loop dos dados do post
			foreach ( $_POST as $key => $value ) {
			
						// Configura os dados do post para a propriedade $form_data
						$this->form_data[$key] = $value;
				
							if ( empty( $value ) ) {
						
								// Configura a mensagem
								$this->form_msg = '<p class="form_error">Existem campos vazios. Os dados não serão enviados.</p>';
								
								// Termina
								return;
						
							}	
			}			
			
		} 

				
		// Verifica se a propriedade $form_data foi preenchida
		if( empty( $this->form_data ) ) {
			return;
		}

		$tipo = chk_array($this->form_data, 'tipo');


		$query = $this->db->query(
			'SELECT round(sum(componente_quantidade * componente_valor_unitario) ,2) as total, custo_descricao FROM componente, tipo, produtividade, custo WHERE componente_fk_tipo = ?  AND tipo_id = ? AND produtividade_fk_tipo = ?  AND componente_fk_custo = custo_id group by componente_fk_custo', 
			array(
				$tipo, $tipo, $tipo
			)
		);

		return $query->fetchAll();

	
	
	} 

	

	public function carrega_tipo() {
	
		// Simplesmente seleciona os dados na base de dados 
		$query = $this->db->query('SELECT * FROM `tipo`');
		
		// Verifica se a consulta está OK
		if ( ! $query ) {
			return array();
		}
		// Preenche a tabela com os dados da subcategoria
		return $query->fetchAll();
	} // carrega_tipo

	public function paginacao () {

		// Configura os dados do formulário
		$this->form_data = array();

		/*if ( 'POST' != $_SERVER['REQUEST_METHOD'] || empty( $_POST['incluir_produtividade'] ) ) {
			return;
		}*/

		if ( 'POST' == $_SERVER['REQUEST_METHOD'] && ! empty ( $_POST ) ) {
		
			// Faz o loop dos dados do post
			foreach ( $_POST as $key => $value ) {
			
						// Configura os dados do post para a propriedade $form_data
						$this->form_data[$key] = $value;
				
							if ( empty( $value ) ) {
						
								// Configura a mensagem
								$this->form_msg = '<p class="form_error">Existem campos vazios. Os dados não serão enviados.</p>';
								
								// Termina
								return;
						
							}	
			}			
			
		} 

				
		// Verifica se a propriedade $form_data foi preenchida
		if( empty( $this->form_data ) ) {
			return;
		}

		$tipo = chk_array($this->form_data, 'tipo');
	
		/* 
		Verifica se o primeiro parâmetro não é um número. Se for é um single
		e não precisa de paginação.
		*/
		if ( is_numeric( chk_array( $this->parametros, 0) ) ) {	
			return;
		}
		
		$query = $this->db->query(
			'SELECT COUNT(*) as total FROM componente, tipo, produtividade, unidade WHERE componente_fk_tipo = ?  AND tipo_id = ? AND produtividade_fk_tipo = ? AND componente_fk_unidade = unidade_id ', 
			array(
				$tipo, $tipo, $tipo
			)
		);
		$total = $query->fetch();
		$total = $total['total'];
		
		// Configura o caminho para a paginação
		$caminho_relatorio_custo = HOME_URI . '/relatorio-custo/index/page/';
		
		// Itens por página
		$posts_per_page = $this->posts_por_pagina;
		
		// Obtém a última página possível
		$last = ceil($total/$posts_per_page);
		
		// Configura a primeira página
		$first = 1;
		
		// Configura os offsets
		$offset1 = 3;
		$offset2 = 6;
		
		// Página atual
		$current = $this->parametros[1] ? $this->parametros[1] : 1;
		
		// Exibe a primeira página e reticências no início
		if ( $current > 4 ) {
			echo "<a href='$caminho_relatorio_custo$first'>$first</a> ... ";
		}
		
		// O primeiro loop toma conta da parte esquerda dos números
		for ( $i = ( $current - $offset1 ); $i < $current; $i++ ) {
			if ( $i > 0 ) {
				echo "<a href='$caminho_relatorio_custo$i'>$i</a>";
				
				// Diminiu o offset do segundo loop
				$offset2--;
			}
		}
		
		// O segundo loop toma conta da parte direita dos números
		// Obs.: A primeira expressão realmente não é necessária
		for ( ; $i < $current + $offset2; $i++ ) {
			if ( $i <= $last ) {
				echo "<a href='$caminho_relatorio_custo$i'>$i</a>";
			}
		}
		
		// Exibe reticências e a última página no final
		if ( $current <= ( $last - $offset1 ) ) {
			echo " ... <a href='$caminho_relatorio_custo$last'>$last</a>";
		}
	} // paginacao


}


?>