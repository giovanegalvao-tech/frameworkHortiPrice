<?php

abstract class MetodoCusteio{
	public $form_data;
	public $form_msg;
	public $form_confirma;
	public $db;
	public $controller;
	public $parametros;

	abstract function calcularPrecoVenda($tipo, $produtividade, $valor);
}


?>