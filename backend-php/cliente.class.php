<?php

class Cliente {
	private $tipo;
	private $nome;
	private $conta;
	private $transferir;
	private $sacar;
	private $depositar;
	private $saldo;

	public function __construct($tip, $nom, $con, $tra, $sac, $dep, $sal){
		$this->tipo        = $tip;
		$this->nome        = $nom;
		$this->conta       = $con;
		$this->transferir  = $tra;
		$this->sacar       = $sac;
		$this->depositar   = $dep;
		$this->saldo       = $sal;
	}

	function getTipo(){
		return $this->tipo;
	}

	function setTipo($tipo){
		$this->tipo = $tipo;
	}

	function getDepositar(){
		return $this->depositar;
	}

	function setDepositar($depositar){
		$this->depositar = $depositar;
	}
	
	function getSacar(){
		return $this->sacar;
	}

	function setSacar($sacar){
		$this->sacar = $sacar;
	}

	function getConta(){
		return $this->conta;
	}

	function setConta($conta){
		$this->conta = $conta;
	}

	function getSaldo(){
		return $this->saldo;
	}

	function setSaldo($saldo){
		$this->saldo = $saldo;
	}

	function getTransferir(){
		return $this->transferir;
	}

	function setTransferir($transferir){
		$this->transferir = $transferir;
	}


	function getNome(){
		return $this->nome;
	}	

	function setNome($no){
		$this->nome = $no;
	}	


   
}


?>