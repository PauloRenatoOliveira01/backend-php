<?php

require_once 'cliente.class.php';

class Transacao {

	/*
	 |---------------------------------------
	 | Realizando transferência bancária
	 |--------------------------------------- 
	 | antes de realizar a transação, valida
	 | os dados de entrada das contas
	 | 
	 | 
	 */
	public function transferencia($cliente1, $cliente2){
		print "<b>Transferência bancária</b> \n\n";

		//valida o tipo de conta do cliente
		if ($cliente1->getTipo() != "CC" AND $cliente1->getTipo() != "CP" OR $cliente2->getTipo() != "CC" AND $cliente2->getTipo() != "CP"){
			print "OPS! Verifique o tipo de conta e tente novamente.\n";
			print "Dica: CC=Conta Corrente e CP=Conta Poupança.\n";
		}

		//valida se o cliente possui saldo disponível para realizar a transferência
		elseif($cliente1->getTransferir() > $cliente1->getSaldo()){
			print "OPS! Você não possui essa quantia \n";
		}

		//valida se o cliente está transferindo um valor maior que zero
		elseif($cliente1->getTransferir() <= 0){
			print "OPS! O valor não é válido para a transação \n";
		}

		//valida o número da conta do cliente
		elseif($cliente1->getConta() != '00041075-1' || $cliente2->getConta() != '00041075-2'){
			print "OPS! Verifique o número da conta e tente novamente \n";
		}

		//se tudo estiver correto, realiza a transferência
		else{
			print "<b>Realizando transferência de:</b> {$cliente1->getNome()} <b>para</b> {$cliente2->getNome()} \n";
			print "<b>Saldo de:</b> {$cliente1->getNome()} B$ {$cliente1->getSaldo()} \n";
			print "<b>Saldo de:</b> {$cliente2->getNome()} B$ {$cliente2->getSaldo()} \n";
			print "<b>Valor da transferência:</b> B$ {$cliente1->getTransferir()} \n\n";

			$saldo_anterior       = $cliente2->getSaldo(); 
			$valor_transferido    = $cliente1->getTransferir();
			$soma_tranferencia    = $saldo_anterior + $valor_transferido;
			$subtrai_tranferencia = $saldo_anterior - $valor_transferido;
			
			print "<b>Saldo atualizado de</b> {$cliente1->getNome()}: B$ {$subtrai_tranferencia}\n<b>Tipo de conta:</b> {$cliente1->getTipo()} \n\n";
			print "<b>Saldo atualizado de</b> {$cliente2->getNome()}: B$ {$soma_tranferencia} \n<b>Tipo de conta:</b> {$cliente2->getTipo()} \n\n";

		}
	}




	/*
	 |---------------------------------------
	 | Realizando saque bancário
	 |--------------------------------------- 
	 | antes de realizar a transação, valida
	 | os dados de entrada da conta
	 | 
	 | 
	 */
	public function sacar($cliente1){
		print "<b>Saque bancária</b> \n\n";

		//valida o número da conta do cliente
		if($cliente1->getConta() != '00041075-1'){
			print "OPS! Verifique o número da conta e tente novamente \n";
		}

		//valida o tipo de conta do cliente
		elseif ($cliente1->getTipo() != "CC" AND $cliente1->getTipo() != "CP"){
			print "OPS! Verifique o tipo de conta e tente novamente.\n";
			print "Dica: CC=Conta Corrente e CP=Conta Poupança.\n";
		}
		
		//valida se o cliente possui algum valor na conta
		elseif ($cliente1->getSaldo() <= 0 ) {
			print "OPS! Cliente com conta vazia \n";
		}
		
		//valida se o saldo do cliente não é maior do que o valor solicitado
		elseif ($cliente1->getSaldo() <= $cliente1->getSacar()) {
			print "OPS! Saldo insuficiente\n";
		}

		//valida o limite de saque do cliente
		elseif ($cliente1->getSacar() > 600 AND $cliente1->getTipo() == "CC") {
			print "OPS! Cliente CC não pode sacar mais de B$600,00\n";
		}
		elseif ($cliente1->getSacar() > 1000 AND $cliente1->getTipo() == "CP") {
			print "OPS! Cliente CP não pode sacar mais de B$1.000,00\n";
		}

		//após validação das informações realiza o saque bancário
		else{

			//verifica o tipo de desconto de acordo com o tipo de conta do cliente
			if($cliente1->getTipo() == "CC"){
				$saldo = $cliente1->getSaldo(); 
				$saque = $cliente1->getSacar();
				$desconto   = 2.50;
				$soma_saque = $saldo - $saque - $desconto;
				print "<b>Saldo anterior</b> B$ {$saldo}\n";
				print "<b>Valor sacado</b> B$ {$saque}\n";
				print "<b>Taxa de operação cliente CC</b> B$ {$desconto}\n";
				print "<b>Novo saldo atualizado</b> B$ {$soma_saque}\n";
			}
			
			//verifica o tipo de desconto de acordo com o tipo de conta do cliente
			if($cliente1->getTipo() == "CP"){
				$saldo = $cliente1->getSaldo(); 
				$saque = $cliente1->getSacar();
				$desconto   = 0.80;
				$soma_saque = $saldo - $saque - $desconto;
				print "<b>Saldo anterior</b> B$ {$saldo}\n";
				print "<b>Valor sacado</b> B$ {$saque}\n";
				print "<b>Taxa de operação cliente CP</b> B$ {$desconto}\n";
				print "<b>Novo saldo atualizado</b> B$ {$soma_saque}\n";
			}
		}

	}
	


	/*
	 |---------------------------------------
	 | Realizando depóstio bancário
	 |--------------------------------------- 
	 | antes de realizar a transação, valida
	 | os dados de entrada da conta
	 | 
	 | 
	 */
	public function depositar($cliente1){
		print "<b>Depósito bancária</b> \n\n";
		
		//valida o tipo de conta do cliente
		if ($cliente1->getTipo() != "CC" AND $cliente1->getTipo() != "CP"){
			print "OPS! Verifique o tipo de conta e tente novamente.\n";
			print "Dica: CC=Conta Corrente e CP=Conta Poupança.\n";
		}
		
		//valida o número da conta do cliente
		elseif($cliente1->getConta() != '00041075-1'){
			print "OPS! Verifique o número da conta e tente novamente \n";
		}
		
		//após validação, realiza a operação de depósito
		else{
			$saldo    = $cliente1->getSaldo();
			$deposito = $cliente1->getDepositar();
			$soma     = $saldo + $deposito; 

			print "<b>Realizando depósito na conta</b> {$cliente1->getConta()} <b>do cliente</b> {$cliente1->getNome()} \n";
			print "<b>Saldo anterior:</b>    B$ {$saldo}    \n";
			print "<b>Valor do depósito:</b> B$ {$deposito} \n"; 
			print "<b>Saldo atualizado:</b>  B$ {$soma}     \n";	
		}
	}

}

?>