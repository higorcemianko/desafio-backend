<?php
	function classifica(){
	
		$ind = 0;
		$score = 0;
		$media_tempo_atendimento = 0;
		$dados = array();
		
		$conteudo = json_decode(file_get_contents('tickets.json'), true);
		foreach($conteudo as $chave => $elementos){
		        $interactions = isset($elementos['Interactions']) ? $elementos['Interactions'] : [];
		        $elementos['Priority'] = 1;
		        $elementos['Score'] = 0;
		      
	          	        
		        $qtd_iteracoes = 0;
				$subject_reclamacao = false;
				$cliente_aguarda_resposta = false;
				foreach ($interactions as $interaction => $elemento) {
					foreach ($elemento as $chave => $valor) {
						if ($chave == "Subject"){
							if (strpos($valor, "Reclama") > 0)
								$subject_reclamacao = true;
								
						}
						if ($chave == "Sender"){
							if ($valor == "Customer"){
								$qtd_iteracoes++;
								$cliente_aguarda_resposta = true;
							}						
							else{
								$cliente_aguarda_resposta = false;
							}
								
						}
						
					
					}
				}
	            if (($qtd_iteracoes > 1) || ($subject_reclamacao))
	            	$elementos['Priority'] = 2; 
	            $elementos['Score'] = $elementos['Score'] + $qtd_iteracoes;
	            if ($cliente_aguarda_resposta)
	            	$elementos['Score'] = $elementos['Score'] + 2;
	            if ($subject_reclamacao)
	            	$elementos['Score'] = $elementos['Score'] + 4;
	            
	            $dados[$ind] = $elementos;
	            
	            $ind++;	                     
		}

			
		

		$tickets_json = json_encode($dados);
		

		$json = fopen("tickets.json", "w");
		

		$escreve_json = fwrite($json, $tickets_json);
		

		fclose($json);
		

		echo "Tickets classificados com sucesso!";

	}

	classifica();
	
?>