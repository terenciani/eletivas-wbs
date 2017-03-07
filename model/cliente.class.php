<?php
	/**
	* 
	*/
	class Cliente
	{
		public $idcliente;
    	public $clientenome;
    	public $clienteendereco;
    	public $clienteidade;


		public function setIdCliente($idcliente) {
	        $this->idcliente = $idcliente;
	    }

	    public function getIdCliente() {
	        return $this->idcliente;
	    }
	    public function setClientenome($clientenome) {
	        $this->clientenome = $clientenome;
	    }

	    public function getClientenome() {
	        return $this->clientenome;
	    }
	    public function setClienteendereco($clienteendereco) {
	        $this->clienteendereco = $clienteendereco;
	    }

	    public function getClienteendereco() {
	        return $this->clienteendereco;
	    }
		public function setClienteidade($clienteidade) {
	        $this->clienteidade = $clienteidade;
	    }

	    public function getClienteidade() {
	        return $this->clienteidade;
	    }

	}


?>