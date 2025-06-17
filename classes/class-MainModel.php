<?php

class MainModel implements \SplObserver
{
	
	public $form_data;
	public $form_msg;
	public $form_confirma;
	public $db;
	public $controller;
	public $parametros;
	
	public function update(\SplSubject $subject): void
    {
        echo "Um modelo foi carregado!";
    }
    
    

} 