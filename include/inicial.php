<?php 
//============================== VIDEOS EM DESTAQUE
	$format = "application/sparql-results+json";
	$endereco = " ?s ?o {?s <dcterms:title> ?o} LIMIT 9";
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
	
	for ($x = 0; $x <= 8; $x++) {
		$jsonfile = json_decode($resposta);
       	$jsonfile = $jsonfile->results;
   		$jsonfile = $jsonfile->bindings[$x];
        $jsonfile = $jsonfile->o;
        $jsonfile = $jsonfile->value;
		$titulos[$x] = $jsonfile;
		$jsonfile = json_decode($resposta);
       	$jsonfile = $jsonfile->results;
   		$jsonfile = $jsonfile->bindings[$x];
        $jsonfile = $jsonfile->s;
        $jsonfile = $jsonfile->value;
		$links[$x] = $jsonfile;
	}


	//============================== PRINCIPAIS CATEGORIAS
	$format = "application/sparql-results+json";
	//$endereco = " distinct ?o {?s dcterms:course ?o}";
	$endereco = " ?o (COUNT(?o) AS ?count) {?s <dcterms:course> ?o} group by ?o order by desc(?count)";
	$sparqlURL = "http://200.131.219.214:10035/repositories/qodra?query=SELECT".urlencode($endereco);
	$curl = curl_init();
    //definimos a URL a ser usada
	curl_setopt($curl, CURLOPT_URL, $sparqlURL);        
    // define que o conteúdo obtido deve ser retornado em vez de exibido
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //Recebe o output da url como uma string
	curl_setopt($curl,CURLOPT_HTTPHEADER,array("Accept: ".$format ));
	$resposta = curl_exec( $curl );
	curl_close($curl);
	//error_log($resposta,0);
	
	//============================== PRINCIPAIS CATEGORIAS
	$format = "application/sparql-results+json";
	//$endereco = " distinct ?o {?s dcterms:course ?o}";
	$endereco = " ?o (COUNT(?o) AS ?count) {?s <dcterms:title> ?o} group by ?o order by desc(?count)";
	$sparqlURL = "http://200.131.219.214:10035/repositories/qodra?query=SELECT".urlencode($endereco);
	$curl = curl_init();
    //definimos a URL a ser usada
	curl_setopt($curl, CURLOPT_URL, $sparqlURL);        
    // define que o conteúdo obtido deve ser retornado em vez de exibido
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //Recebe o output da url como uma string
	curl_setopt($curl,CURLOPT_HTTPHEADER,array("Accept: ".$format ));
	$resposta = curl_exec( $curl );
	curl_close($curl);
	for ($x = 0; $x < 8; $x++) {
		$jsonfile = json_decode($resposta);
       	$jsonfile = $jsonfile->results;
   		$jsonfile = $jsonfile->bindings[$x];
        $jsonfile = $jsonfile->o;
        $jsonfile = $jsonfile->value;
		$tagsmaisusadas[$x] = $jsonfile;
		$jsonfile = json_decode($resposta);
       	$jsonfile = $jsonfile->results;
   		$jsonfile = $jsonfile->bindings[$x];
        $jsonfile = $jsonfile->count;
        $jsonfile = $jsonfile->value;
		$tagsmaisusadasquant[$x] = $jsonfile;
	}
?>