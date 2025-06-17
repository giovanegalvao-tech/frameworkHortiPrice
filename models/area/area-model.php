<?php 
/**
 * Classe para gerenciar area
 */

error_reporting(0);


class AreaModel extends MainModel
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

	public function consultar_area () {
	
		// Configura as variáveis que vamos utilizar
		$id = $where = $query_limit = null;
		
		// Verifica se um parâmetro foi enviado para carregar uma area
		if ( is_numeric( chk_array( $this->parametros, 0 ) ) ) {
			
			// Configura o ID para enviar para a area
			$id = array ( chk_array( $this->parametros, 0 ) );
			
			// Configura a cláusula where da consulta
			$where = " WHERE area_id = ? ";
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
			'SELECT * FROM area ' . $where . ' ORDER BY area_id DESC' . $query_limit,
			$id
		);
		
		// Retorna
		return $query->fetchAll();
	} // consultar_area

	public function editar_area () {


		// Verifica se o primeiro parâmetro é "edit"
		if ( chk_array( $this->parametros, 0 ) != 'edit' ) {
			return;
		}
		
		// Verifica se o segundo parâmetro é um número
		if ( ! is_numeric( chk_array( $this->parametros, 1 ) ) ) {
			return;
		}
		
		// Configura o ID da area
		$area_id = chk_array( $this->parametros, 1 );

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
		if ( 'POST' == $_SERVER['REQUEST_METHOD'] && ! empty( $_POST['incluir_area'] ) ) {

			
		
			// Remove o campo incluir_area para não gerar problema com o PDO
			unset($_POST['incluir_area']);
			
			// Verifica se a descrição foi enviada
			$descricao = chk_array( $_POST, 'area_descricao' );
						
			// Adiciona a descricao no $_POST		
			$_POST['area_descricao'] = $descricao;
			
			
			// Atualiza os dados
			$query = $this->db->update('area', 'area_id', $area_id, $_POST);
			
			// Verifica a consulta
			if ( $query ) {
				echo '<meta http-equiv="Refresh" content="0; url=' . HOME_URI . '/area/">';
				echo '<script type="text/javascript">window.location.href = "' . HOME_URI . '/area/";</script>';
			}
			
		}
		
		// Faz a consulta para obter o valor
		$query = $this->db->query(
			'SELECT * FROM area WHERE area_id = ? LIMIT 1',
			array( $area_id )
		);
		
		// Obtém os dados
		$fetch_data = $query->fetch();
		
		// Se os dados estiverem nulos, não faz nada
		if ( empty( $fetch_data ) ) {
			return;
		}
		
		// Configura os dados do formulário
		$this->form_data = $fetch_data;
		
	} // editar_area

	public function incluir_area() {


		if ( 'POST' != $_SERVER['REQUEST_METHOD'] || empty( $_POST['incluir_area'] ) ) {
			
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
		unset($_POST['incluir_area']);
		
				
		// Configura a data
		$descricao = chk_array( $_POST, 'area_descricao' );
		
		// Adiciona a descricao no POST
		$_POST['area_descricao'] = $descricao;
		
		// Insere os dados na base de dados
		$query = $this->db->insert( 'area', $_POST );
		
		
		
		// Verifica a consulta
		if ( $query ) {
		
			// Retorna uma mensagem
			$this->form_msg = '<div class="z-depth-3" style="border-color: #0288d1; background-color: #1b5e20; color: white;">Área cadastrada com sucesso!</div>';

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


		
	} // incluir_area

	public function excluir_area () {
		
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
  			color: white;">Tem certeza que deseja apagar a área (ID: '. $this->parametros[1].')?</div>';
			$mensagem .= '<p><a class="waves-effect waves-light btn green darken-4" href="' . $_SERVER['REQUEST_URI'] . '/confirma/">Sim</a> | ';
			$mensagem .= '<a class="waves-effect waves-light btn red darken-4" href="' . HOME_URI . '/area/">Não</a></p>';
			
			// Retorna a mensagem e não excluir
			return $mensagem;
		}
		
		// Configura o ID da area
		$area_id = (int)chk_array( $this->parametros, 1 );
		
		// Executa a consulta
		$query = $this->db->delete( 'area', 'area_id', $area_id );
		
		// Redireciona para a página de administração de notícias
		echo '<meta http-equiv="Refresh" content="0; url=' . HOME_URI . '/area/">';
		echo '<script type="text/javascript">window.location.href = "' . HOME_URI . '/area/";</script>';
		
	} // apaga_area

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
			'SELECT COUNT(*) as total FROM area '
		);
		$total = $query->fetch();
		$total = $total['total'];
		
		// Configura o caminho para a paginação
		$caminho_area = HOME_URI . '/area/index/page/';
		
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
			echo "<a href='$caminho_area$first'>$first</a> ... ";
		}
		
		// O primeiro loop toma conta da parte esquerda dos números
		for ( $i = ( $current - $offset1 ); $i < $current; $i++ ) {
			if ( $i > 0 ) {
				echo "<a href='$caminho_area$i'>$i</a>";
				
				// Diminiu o offset do segundo loop
				$offset2--;
			}
		}
		
		// O segundo loop toma conta da parte direita dos números
		// Obs.: A primeira expressão realmente não é necessária
		for ( ; $i < $current + $offset2; $i++ ) {
			if ( $i <= $last ) {
				echo "<a href='$caminho_area$i'>$i</a>";
			}
		}
		
		// Exibe reticências e a última página no final
		if ( $current <= ( $last - $offset1 ) ) {
			echo " ... <a href='$caminho_area$last'>$last</a>";
		}


	} // paginacao
	
}