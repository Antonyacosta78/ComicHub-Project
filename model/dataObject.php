<?php

class dataObject{
	private $dados;
	
	function __construct($dados){
		foreach($dados as $key=>$value){
			$this->dados[$key] = $value;
		}
	}
	
	public function __get($item){
		return $this->dados[$item];
	}
	
	public function __set($item,$valor){
		$this->dados[$item] = $valor;
	}
        
        public function get($item){
		return $this->dados[$item];
	}
	
	public function set($item,$valor){
		$this->dados[$item] = $valor;
	}
        
        public function getArray(){
            return $this->dados;
        }
	
}