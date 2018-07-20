<?php
	function montaConsulta($inicio, $fim, $prioridade){
		$consulta = array();
		$conteudo = json_decode(file_get_contents('tickets.json'), true);
		$ind = 0;
		$ticket_valido = false;
		foreach($conteudo as $chave => $elementos){
				$ticket_valido = true;
				if (($inicio != NULL) && ($fim != NULL))
					$ticket_valido = (($elementos['DateCreate'] >= $inicio) && ($elementos['DateCreate'] <= $fim));
				
				if (($prioridade > 0) && ($ticket_valido))
					$ticket_valido = ($elementos['Priority'] == $prioridade);
				
				if ($ticket_valido){
					$item_consulta['ID'] = $elementos['TicketID'];
					$item_consulta['ID Categoria'] = $elementos['CategoryID'];
					$item_consulta['ID Cliente'] = $elementos['CustomerID'];
		    		$item_consulta['Nome'] = $elementos['CustomerName'];
		    		$item_consulta['E-mail'] = $elementos['CustomerEmail'];
		    		$item_consulta['Data Criacao'] = $elementos['DateCreate'];
		    		
		    		$item_consulta['Data Atualizacao'] = $elementos['DateUpdate'];
		    		
		    		$item_consulta['Pontos'] = $elementos['Score'];
		    		if ($elementos['Priority'] == 1)
		    			$item_consulta['Prioridade'] = "Normal";
		    		else
		    			$item_consulta['Prioridade'] = "Alta";

		    		$consulta[$ind] = $item_consulta;
	        		$ind++;	
				}
					
			
				                     
		}	
		$dados_consulta = array('data' => $consulta);
		$tickets_texto = json_encode($dados_consulta);
		$texto = fopen("data\\tickets.txt", "w");
		$escreve_texto = fwrite($texto, $tickets_texto);

		fclose($texto);
	}
	$inicio = $_POST['inicio'];
	$fim = $_POST['fim'];
	$prioridade = $_POST['prioridade'];
	montaConsulta($inicio, $fim, $prioridade);
?>