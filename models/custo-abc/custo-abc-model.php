<?php 
/**
 * Classe para gerenciar custo abc
 */

class CustoAbcModel extends MetodoCusteio
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

	public function consultar_custoabc () {
	
		// Configura as variáveis que vamos utilizar
		$id = $where = $query_limit = null;
		
		// Verifica se um parâmetro foi enviado para carregar uma produtividade
		if ( is_numeric( chk_array( $this->parametros, 0 ) ) ) {
			
			// Configura o ID para enviar para a produtividade
			$id = array ( chk_array( $this->parametros, 0 ) );
			
			// Configura a cláusula where da consulta
			$where = " WHERE custoabc_id = ? ";
		}
		
		// Configura a página a ser exibida
		$pagina = ! empty( $this->parametros[1] ) ? $this->parametros[1] : 1;
		
		// A páginação inicia do 0
		$pagina--;
		
		// Configura o número de posts por página
		$produtividade_por_pagina = $this->posts_por_pagina;
		
		// O offset dos posts da consulta
		$offset = $pagina * $produtividade_por_pagina;
		
		
		// Faz a consulta
		$query = $this->db->query(
			'SELECT custoabc_id, tipo.tipo_descricao, produtividade.produtividade_mes, produtividade.produtividade_ano, custoabc_precovenda, custoabc_margem FROM custoabc, tipo, produtividade WHERE custoabc_fk_tipo = tipo.tipo_id and custoabc_fk_produtividade = produtividade.produtividade_id' . ' ORDER BY custoabc_id DESC' . $query_limit,
			$id
		);
		
		// Retorna
		return $query->fetchAll();
	} // consultar_produtividade

	public function calcular(){

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

		

		//$precovenda = $this->calcularPrecoVenda();
   
		// Insere os dados na base de dados
		$query = $this->db->insert( 'custoabc', array(
				'custoabc_fk_tipo' => chk_array( $this->form_data, 'custoabc_fk_tipo' ),
				'custoabc_fk_produtividade' => chk_array($this->form_data, 'custoabc_fk_produtividade'),
				'custoabc_precovenda' => $this->calcularPrecoVenda(chk_array( $this->form_data, 'custoabc_fk_tipo' ), chk_array($this->form_data, 'custoabc_fk_produtividade'), chk_array( $this->form_data, 'custoabc_margem' )),
				'custoabc_margem' => chk_array($this->form_data, 'custoabc_margem')
				
			));
		
		// Verifica a consulta
		if ( $query ) {
		
			// Retorna uma mensagem
			$this->form_msg = '<p class="success">Operação realizada com sucesso!</p>';
			return;
			
		} 

	}

	public function calcularPrecoVenda($tipo, $produtividade, $valor){

		$margem = $valor/100;

		$query = $this->db->query(
			'SELECT round(sum(componente_quantidade*componente_valor_unitario)/produtividade.produtividade_valor,2) as resultado FROM componente, tipo, produtividade WHERE componente_fk_tipo = ?  AND tipo_id = ? AND produtividade_fk_tipo = ? AND componente_fk_classificacao = 1 ', 
			array(
				$tipo, $tipo, $tipo
			)
		);

		$lista = $query->fetchAll();

		foreach ($lista as $fetch_custoabcdata):
			$custoUnitario =  $fetch_custoabcdata['resultado'];
		 endforeach;

		$precoVenda = $custoUnitario / (1 - $margem);
		
		return $precoVenda;
	}

	/**
	 * Obtém a lista de tipo
	 */
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

	/**
	 * Obtém a lista de produtividade
	 */
	public function carrega_produtividade() {
	
		// Simplesmente seleciona os dados na base de dados 
		$query = $this->db->query('SELECT * FROM `produtividade`');
		
		// Verifica se a consulta está OK
		if ( ! $query ) {
			return array();
		}
		// Preenche a tabela com os dados da subcategoria
		return $query->fetchAll();
	} // carrega_tipo	

	public function excluir_custoabc () {
		
		// O parâmetro del deverá ser enviado
		if ( chk_array( $this->parametros, 0 ) != 'del' ) {
			return;
		}
		
		// O segundo parâmetro deverá ser um ID numérico
		if ( ! is_numeric( chk_array( $this->parametros, 1 ) ) ) {
			return;
		}
		
		// Para excluir, o terceiro parâmetro deverá ser "confirma"
		if ( chk_array( $this->parametros, 2 ) != 'confirma' ) {
		
			// Configura uma mensagem de confirmação para o usuário
			$mensagem  = '<div class="z-depth-3" style="border-color: #ef6c00; background-color: #1b5e20;
  			color: white;">Tem certeza que deseja apagar a simulação(ID: '. $this->parametros[1].')?</div>';
			$mensagem .= '<p><a class="waves-effect waves-light btn green darken-4" href="' . $_SERVER['REQUEST_URI'] . '/confirma/">Sim</a> | ';
			$mensagem .= '<a class="waves-effect waves-light btn red darken-4" href="' . HOME_URI . '/atividade/">Não</a></p>';
			
			// Retorna a mensagem e não excluir
			return $mensagem;
		}
		
		// Configura o ID da custoabc
		$custoabc_id = (int)chk_array( $this->parametros, 1 );
		
		// Executa a consulta
		$query = $this->db->delete( 'custoabc', 'custoabc_id', $custoabc_id );
		
		// Redireciona para a página de administração de notícias
		echo '<meta http-equiv="Refresh" content="0; url=' . HOME_URI . '/custo-abc/">';
		echo '<script type="text/javascript">window.location.href = "' . HOME_URI . '/custo-abc/";</script>';
		
	} // apaga_custoabc

	public function paginacao () {
	
		/* 
		Verifica se o primeiro parâmetro não é um número. Se for é um single
		e não precisa de paginação.
		*/
		if ( is_numeric( chk_array( $this->parametros, 0) ) ) {	
			return;
		}
		
		// Obtém o número total de notícias da base de dados
		$query = $this->db->query(
			'SELECT COUNT(*) as total FROM custoabc '
		);
		$total = $query->fetch();
		$total = $total['total'];
		
		// Configura o caminho para a paginação
		$caminho_custoabc = HOME_URI . '/custo-abc/index/page/';
		
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
			echo "<a href='$caminho_custoabc$first'>$first</a> ... ";
		}
		
		// O primeiro loop toma conta da parte esquerda dos números
		for ( $i = ( $current - $offset1 ); $i < $current; $i++ ) {
			if ( $i > 0 ) {
				echo "<a href='$caminho_custoabc$i'>$i</a>";
				
				// Diminiu o offset do segundo loop
				$offset2--;
			}
		}
		
		// O segundo loop toma conta da parte direita dos números
		// Obs.: A primeira expressão realmente não é necessária
		for ( ; $i < $current + $offset2; $i++ ) {
			if ( $i <= $last ) {
				echo "<a href='$caminho_custoabc$i'>$i</a>";
			}
		}
		
		// Exibe reticências e a última página no final
		if ( $current <= ( $last - $offset1 ) ) {
			echo " ... <a href='$caminho_custoabc$last'>$last</a>";
		}
	} // paginacao	
	
}