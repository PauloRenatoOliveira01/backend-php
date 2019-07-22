<pre>
<?php

	require_once 'cliente.class.php';
	require_once 'transacoes.class.php';

	$cliente = array();

	$cliente[0] = new Cliente(
		/* Tipo de conta      */  "CC",             
		/* nome do cliente    */  "Pedro da Silva", 
		/* número da conta    */  "00041075-1",     
		/* valor transferência*/  "50",              
		/* valor do saque     */  "200",            
		/* valor do depósito  */  "80",             
		/* valor do saldo     */  "500" 
	);

	$cliente[1] = new Cliente(
		/* Tipo de conta      */  "CP",             
		/* nome do cliente    */  "Maria Pereira", 
		/* número da conta    */  "00041075-2",     
		/* valor transferência*/  "",              
		/* valor do saque     */  "",            
		/* valor do depósito  */  "",             
		/* valor do saldo     */  "200" 
	);

	//print_r($cliente[0]);
	//print_r($cliente[1]);

	$opbancaria = new Transacao();

	# RETIRAR COMENTÁRIO PARA CHAMAR O MÉTODO DESEJADO
	
	# Transferência bancária
	 $opbancaria->transferencia($cliente[0], $cliente[1]);

	# Saque bancário
	# $opbancaria->sacar($cliente[0]);

	# Depósito bancário
	# $opbancaria->depositar($cliente[0]);


?>
</pre>