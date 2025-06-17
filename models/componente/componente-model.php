<?php 
/**
 * Classe para gerenciar componente
 */

error_reporting(0);

class ComponenteModel extends MainModel
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

	public function consultar_componente () {
	
		// Configura as variáveis que vamos utilizar
		$id = $where = $query_limit = null;
		
		// Verifica se um parâmetro foi enviado para carregar um componente
		if ( is_numeric( chk_array( $this->parametros, 0 ) ) ) {
			
			// Configura o ID para enviar para  componente
			$id = array ( chk_array( $this->parametros, 0 ) );
			
			// Configura a cláusula where da consulta
			$where = " WHERE componente_id = ? ";
		}
		
		// Configura a página a ser exibida
		$pagina = ! empty( $this->parametros[1] ) ? $this->parametros[1] : 1;
		
		// A páginação inicia do 0
		$pagina--;
		
		// Configura o número de posts por página
		$posts_por_pagina = $this->posts_por_pagina;
		
		// O offset dos posts da consulta
		$offset = $pagina * $posts_por_pagina;

		
		if ( empty ( $this->sem_limite ) ) {
		
			// Configura o limite da consulta
			$query_limit = " LIMIT $offset,$posts_por_pagina ";
		
		}	
		
		// Faz a consulta
		$query = $this->db->query(
			'SELECT componente_id, componente_descricao, componente_quantidade, componente_valor_unitario, unidade.unidade_descricao, componente_mes, componente_ano, tipo.tipo_descricao, custo.custo_descricao, classificacao.classificacao_descricao FROM componente, unidade, tipo, custo, classificacao WHERE componente_fk_tipo = tipo.tipo_id and componente_fk_unidade = unidade.unidade_id and componente_fk_custo = custo.custo_id and componente_fk_classificacao = classificacao.classificacao_id' . ' ORDER BY componente_id DESC' . $query_limit,
			$id
		);
		
		// Retorna
		return $query->fetchAll();
	} // consultar_componente

	public function editar_componente () {

		// Verifica se o primeiro parâmetro é "edit"
		if ( chk_array( $this->parametros, 0 ) != 'edit' ) {
			return;
		}
		
		// Verifica se o segundo parâmetro é um número
		if ( ! is_numeric( chk_array( $this->parametros, 1 ) ) ) {
			return;
		}
		
		// Configura o ID da area
		$componente_id = chk_array( $this->parametros, 1 );
		
		if ( 'POST' == $_SERVER['REQUEST_METHOD'] && ! empty ( $_POST ) ) {
			// Faz o loop dos dados do post
			foreach ( $_POST as $key => $value ) {
			
						// Configura os dados do post para a propriedade $form_data
						$this->form_data[$key] = $value;
				
							if ( empty( $value ) ) {
						
								// Configura a mensagem
								$this->form_msg = '<div class="z-depth-3 scale-transition" style="border-color: #d32f2f;
  background-color: #ef5350; color: white;">Atenção! Para efetuar a ação é necessário informar todos os campos do formulário.</div>';
								
								// Termina
								return;
						
							}	
			}			
			
		}


		/* 
		Verifica se algo foi postado e se está vindo do form que tem o campo
		incluir_area.
		
		Se verdadeiro, atualiza os dados conforme a requisição.
		*/
		if ( 'POST' == $_SERVER['REQUEST_METHOD'] && ! empty( $_POST['incluir_componente'] ) ) {
		
			// Remove o campo incluir_area para não gerar problema com o PDO
			unset($_POST['incluir_componente']);
			
			// Verifica se a descrição foi enviada
			$descricao = chk_array( $_POST, 'componente_descricao' );
			$quantidade = chk_array( $_POST, 'componente_quantidade');
			$valorUnitario = chk_array( $_POST, 'componente_valor_unitario');
			$unidade = chk_array( $_POST, 'componente_fk_unidade');
			$mes = chk_array($_POST, 'componente_mes');
			$ano = chk_array($_POST, 'componente_ano');
			$tipo = chk_array($_POST, 'componente_fk_tipo');
			$custo = chk_array($_POST, 'componente_fk_custo');
			$classificacao = chk_array($_POST, 'componente_fk_classificacao');
						
			// Adiciona a descricao no $_POST		
			$_POST['componente_descricao'] = $descricao;
			$_POST['componente_quantidade'] = $quantidade;
			$_POST['componente_valor_unitario'] = $valorUnitario;
			$_POST['componente_fk_unidade'] = $unidade;
			$_POST['componente_mes'] = $mes;
			$_POST['componente_ano'] = $ano;
			$_POST['componente_fk_tipo'] = $tipo;
			$_POST['componente_fk_custo'] = $custo;
			$_POST['componente_fk_classificacao'] = $classificacao;
			
			
			// Atualiza os dados
			$query = $this->db->update('componente', 'componente_id', $componente_id, $_POST);
			
			// Verifica a consulta
			if ( $query ) {
				echo '<meta http-equiv="Refresh" content="0; url=' . HOME_URI . '/componente/">';
			echo '<script type="text/javascript">window.location.href = "' . HOME_URI . '/componente/";</script>';
			}

			
			
		}
		
		// Faz a consulta para obter o valor
		$query = $this->db->query(
			'SELECT * FROM componente WHERE componente_id = ? LIMIT 1',
			array( $componente_id )
		);
		
		// Obtém os dados
		$fetch_data = $query->fetch();
		
		// Se os dados estiverem nulos, não faz nada
		if ( empty( $fetch_data ) ) {
			return;
		}
		
		// Configura os dados do formulário
		$this->form_data = $fetch_data;

		
		
		
	} // editar_componente

	public function incluir_componente() {
	
		/* 
		Verifica se algo foi postado e se está vindo do form que tem o campo
		incluir_area.
		*/
		if ( 'POST' != $_SERVER['REQUEST_METHOD'] || empty( $_POST['incluir_componente'] ) ) {
			return;
		}

		
		
		/*
		Para evitar conflitos apenas inserimos valores se o parâmetro edit
		não estiver configurado.
		*/
		if ( chk_array( $this->parametros, 0 ) == 'edit' ) {
			return;
		}
		
		// Só pra garantir que não estamos atualizando nada
		if ( is_numeric( chk_array( $this->parametros, 1 ) ) ) {
			return;
		}
			
		// Remove o campo incluir_area para não gerar problema com o PDO
		unset($_POST['incluir_componente']);
		

			$descricao = chk_array( $_POST, 'componente_descricao' );
			$quantidade = chk_array( $_POST, 'componente_quantidade');
			$valorUnitario = chk_array( $_POST, 'componente_valor_unitario');
			$unidade = chk_array( $_POST, 'componente_fk_unidade');
			$mes = chk_array($_POST, 'componente_mes');
			$ano = chk_array($_POST, 'componente_ano');
			$tipo = chk_array($_POST, 'componente_fk_tipo');
			$custo = chk_array($_POST, 'componente_fk_custo');
			$classificacao = chk_array($_POST, 'componente_fk_classificacao');
						
			// Adiciona a descricao no $_POST		
			$_POST['componente_descricao'] = $descricao;
			$_POST['componente_quantidade'] = $quantidade;
			$_POST['componente_valor_unitario'] = $valorUnitario;
			$_POST['componente_fk_unidade'] = $unidade;
			$_POST['componente_mes'] = $mes;
			$_POST['componente_ano'] = $ano;
			$_POST['componente_fk_tipo'] = $tipo;
			$_POST['componente_fk_custo'] = $custo;
			$_POST['componente_fk_classificacao'] = $classificacao;

		$query = $this->db->insert( 'componente', $_POST );
		
		// Verifica a consulta
		if ( $query ) {
		
			// Retorna uma mensagem
			$this->form_msg = '<div class="z-depth-3" style="border-color: #0288d1; background-color: #1b5e20; color: white;">Componente cadastrado com sucesso!</div>';

			return;
			
		} else {
			foreach ( $_POST as $key => $value ) {
			
						// Configura os dados do post para a propriedade $form_data
						$this->form_data[$key] = $value;
				
							if ( empty( $value ) ) {
						
								// Configura a mensagem
								$this->form_msg = '<div class="z-depth-3 scale-transition" style="border-color: #d32f2f;
  background-color: #ef5350; color: white;">Atenção! Para efetuar a ação é necessário informar todos os campos do formulário.</div>';
								
								// Termina
								return;
						
							}	
			}			
		}
		
		

	
	} // incluir_componente

	public function excluir_componente () {
		
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
  			color: white;">Tem certeza que deseja apagar o componente(ID: '. $this->parametros[1].')?</div>';
			$mensagem .= '<p><a class="waves-effect waves-light btn green darken-4" href="' . $_SERVER['REQUEST_URI'] . '/confirma/">Sim</a> | ';
			$mensagem .= '<a class="waves-effect waves-light btn red darken-4" href="' . HOME_URI . '/componente/">Não</a></p>';
			// Retorna a mensagem e não excluir
			return $mensagem;
		}
		
		// Configura o ID da componente
		$componente_id = (int)chk_array( $this->parametros, 1 );
		
		// Executa a consulta
		$query = $this->db->delete( 'componente', 'componente_id', $componente_id );
		
		// Redireciona para a página de administração de notícias
		echo '<meta http-equiv="Refresh" content="0; url=' . HOME_URI . '/componente/">';
		echo '<script type="text/javascript">window.location.href = "' . HOME_URI . '/componente/";</script>';
		
	} // apaga_componente

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
			'SELECT COUNT(*) as total FROM componente '
		);
		$total = $query->fetch();
		$total = $total['total'];
		
		// Configura o caminho para a paginação
		$caminho_componente = HOME_URI . '/componente/index/page/';
		
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
			echo "<a href='$caminho_componente$first'>$first</a> ... ";
		}
		
		// O primeiro loop toma conta da parte esquerda dos números
		for ( $i = ( $current - $offset1 ); $i < $current; $i++ ) {
			if ( $i > 0 ) {
				echo "<a href='$caminho_componente$i'>$i</a>";
				
				// Diminiu o offset do segundo loop
				$offset2--;
			}
		}
		
		// O segundo loop toma conta da parte direita dos números
		// Obs.: A primeira expressão realmente não é necessária
		for ( ; $i < $current + $offset2; $i++ ) {
			if ( $i <= $last ) {
				echo "<a href='$caminho_componente$i'>$i</a>";
			}
		}
		
		// Exibe reticências e a última página no final
		if ( $current <= ( $last - $offset1 ) ) {
			echo " ... <a href='$caminho_componente$last'>$last</a>";
		}


		
	} // paginacao

	/**
	 * Obtém a lista de custo
	 */
	public function carrega_custo() {
	
		// Simplesmente seleciona os dados na base de dados 
		$query = $this->db->query('SELECT * FROM `custo`');
		
		// Verifica se a consulta está OK
		if ( ! $query ) {
			return array();
		}
		// Preenche a tabela com os dados da subcategoria
		return $query->fetchAll();
	} // carrega_custo

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
	 * Obtém a lista de unidade
	 */
	public function carrega_unidade() {
	
		// Simplesmente seleciona os dados na base de dados 
		$query = $this->db->query('SELECT * FROM `unidade`');
		
		// Verifica se a consulta está OK
		if ( ! $query ) {
			return array();
		}
		// Preenche a tabela com os dados da subcategoria
		return $query->fetchAll();
	} // carrega_tipo


	public function carrega_classificacao() {
		
			// Simplesmente seleciona os dados na base de dados 
			$query = $this->db->query('SELECT * FROM `classificacao`');
			
			// Verifica se a consulta está OK
			if ( ! $query ) {
				return array();
			}
			// Preenche a tabela com os dados da subcategoria
			return $query->fetchAll();
	} 
	

	
	
}