<?php

class Db {
    
    public $con;
    
    public function __construct(){
		
		//local
		
		$banco = 'bd_eletiva';
		$usuario = 'root';
		$senha = '';
		
		
	
        $this->con = new PDO('mysql:host=localhost;dbname='.$banco.';charset=utf8',$usuario,$senha);
		
    }
    
}