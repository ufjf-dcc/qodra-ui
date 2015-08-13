<?php
	$format = "application/sparql-results+json";
	$endereco = " ?s ?o WHERE {
  					?s <dcterms:title> ?o 
  					filter(regex(str(?o), '" . $busca . "', 'i' ))
     			}";
	$sparqlURL = "http://200.131.219.214:10035/repositories/qodra?query=SELECT".urlencode($endereco);
	//$sparqlURL="http://200.131.219.214/qodra/repositories/qodra?query=SELECT%20%3Fs%20%3Fo%20%7B%3Fs%20dcterms%3Atitle%20%3Fo%7D%20LIMIT%209";
	$curl = curl_init();
    //definimos a URL a ser usada
	curl_setopt($curl, CURLOPT_URL, $sparqlURL);        
    // define que o conteúdo obtido deve ser retornado em vez de exibido
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //Recebe o output da url como uma string
	curl_setopt($curl,CURLOPT_HTTPHEADER,array("Accept: ".$format ));
	$resposta = curl_exec( $curl );
	curl_close($curl);

		// conta o numero de paginas
		$jsonfile = json_decode($resposta);
       	$jsonfile = $jsonfile->results;
   		$jsonfile = $jsonfile->bindings;
		$countvid = count($jsonfile);
		$numpaginas = floor($countvid / 9) + 1;
	
	//coloca todos os titulos encontrados em $titulos
	for ($x = 0; $x <= $countvid-1; $x++) {
		$jsonfile = json_decode($resposta);     
		$jsonfile = $jsonfile->results;
   		$jsonfile = $jsonfile->bindings[$x];
        $jsonfile = $jsonfile->o;
        $jsonfile = $jsonfile->value;
		$titulos[$x] = $jsonfile;
	}
	
	for ($x = 0; $x <= $countvid-1; $x++) {
		$jsonfile = json_decode($resposta);     
		$jsonfile = $jsonfile->results;
   		$jsonfile = $jsonfile->bindings[$x];
        $jsonfile = $jsonfile->s;
        $jsonfile = $jsonfile->value;
		$links[$x] = $jsonfile;
	}
?>