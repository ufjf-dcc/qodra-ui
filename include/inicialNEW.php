<?php 
//============================== VIDEOS EM DESTAQUE
	include('db.php');	
	$Dformat = "application/sparql-results+json";
	$Dendereco = " ?s ?o {?s <dcterms:title> ?o} LIMIT 9";
	$DsparqlURL = ALLEGRO_URL."?query=SELECT".urlencode($Dendereco);
	//$DsparqlURL = "http://200.131.219.214:10035/repositories/qodra?query=SELECT".urlencode($Dendereco);
	//$DsparqlURL="http://200.131.219.214/qodra/repositories/qodra?query=SELECT%20%3Fs%20%3Fo%20%7B%3Fs%20dcterms%3Atitle%20%3Fo%7D%20LIMIT%209";
	$Dcurl = curl_init();
    //definimos a URL a ser usada
	curl_setopt($Dcurl, CURLOPT_URL, $DsparqlURL);        
    // define que o conteúdo obtido deve ser retornado em vez de exibido
	curl_setopt($Dcurl, CURLOPT_RETURNTRANSFER, true); //Recebe o output da url como uma string
	curl_setopt($Dcurl,CURLOPT_HTTPHEADER,array("Accept: ".$Dformat ));
	$Dresposta = curl_exec( $Dcurl );
	curl_close($Dcurl);
	
	for ($Dx = 0; $Dx <= 8; $Dx++) {
		$Djsonfile = json_decode($Dresposta);
       	$Djsonfile = $Djsonfile->results;
   		$Djsonfile = $Djsonfile->bindings[$Dx];
        $Djsonfile = $Djsonfile->o;
        $Djsonfile = $Djsonfile->value;
		$Dtitulos[$Dx] = $Djsonfile;
		$Djsonfile = json_decode($Dresposta);
       	$Djsonfile = $Djsonfile->results;
   		$Djsonfile = $Djsonfile->bindings[$Dx];
        $Djsonfile = $Djsonfile->s;
        $Djsonfile = $Djsonfile->value;
		$Dlinks[$Dx] = $Djsonfile;
	}


	//============================== PRINCIPAIS CATEGORIAS
	$Dformat = "application/sparql-results+json";
	//$Dendereco = " distinct ?o {?s dcterms:course ?o}";
	$Dendereco = " ?o (COUNT(?o) AS ?count) {?s <dcterms:course> ?o} group by ?o order by desc(?count)";
	
	//$DsparqlURL = "http://200.131.219.214:10035/repositories/qodra?query=SELECT".urlencode($Dendereco);
	$DsparqlURL = ALLEGRO_URL."?query=SELECT".urlencode($Dendereco);
	$Dcurl = curl_init();
    //definimos a URL a ser usada
	curl_setopt($Dcurl, CURLOPT_URL, $DsparqlURL);        
    // define que o conteúdo obtido deve ser retornado em vez de exibido
	curl_setopt($Dcurl, CURLOPT_RETURNTRANSFER, true); //Recebe o output da url como uma string
	curl_setopt($Dcurl,CURLOPT_HTTPHEADER,array("Accept: ".$Dformat ));
	$Dresposta = curl_exec( $Dcurl );
	curl_close($Dcurl);
	//error_log($Dresposta,0);
	
	//============================== TAGS MAIS USADAS
	$Dformat = "application/sparql-results+json";
	//$Dendereco = " distinct ?o {?s dcterms:course ?o}";
	$Dendereco = " ?o (COUNT(?o) AS ?count) {?s <dcterms:title> ?o} group by ?o order by desc(?count)";
	//$DsparqlURL = "http://200.131.219.214:10035/repositories/qodra?query=SELECT".urlencode($Dendereco);
	$DsparqlURL = ALLEGRO_URL."?query=SELECT".urlencode($Dendereco);
	$Dcurl = curl_init();
    //definimos a URL a ser usada
	curl_setopt($Dcurl, CURLOPT_URL, $DsparqlURL);        
    // define que o conteúdo obtido deve ser retornado em vez de exibido
	curl_setopt($Dcurl, CURLOPT_RETURNTRANSFER, true); //Recebe o output da url como uma string
	curl_setopt($Dcurl,CURLOPT_HTTPHEADER,array("Accept: ".$Dformat ));
	$Dresposta = curl_exec( $Dcurl );
	curl_close($Dcurl);
	for ($Dx = 0; $Dx < 8; $Dx++) {
		$Djsonfile = json_decode($Dresposta);
       	$Djsonfile = $Djsonfile->results;
   		$Djsonfile = $Djsonfile->bindings[$Dx];
        $Djsonfile = $Djsonfile->o;
        $Djsonfile = $Djsonfile->value;
		$Dtagsmaisusadas[$Dx] = $Djsonfile;
		$Djsonfile = json_decode($Dresposta);
       	$Djsonfile = $Djsonfile->results;
   		$Djsonfile = $Djsonfile->bindings[$Dx];
        $Djsonfile = $Djsonfile->count;
        $Djsonfile = $Djsonfile->value;
		$Dtagsmaisusadasquant[$Dx] = $Djsonfile;
	}


	// ---------- PRINCIPAIS CATEGORIAS

	$Dendereco = " ?o (COUNT(?o) AS ?count) {?s <dcterms:category> ?o} group by ?o order by desc(?count)";
	//$DsparqlURL = "http://200.131.219.214:10035/repositories/qodra?query=SELECT".urlencode($Dendereco);
	$DsparqlURL = ALLEGRO_URL."?query=SELECT".urlencode($Dendereco);
	$Dcurl = curl_init();
	//definimos a URL a ser usada
	curl_setopt($Dcurl, CURLOPT_URL, $DsparqlURL);
	// define que o conteúdo obtido deve ser retornado em vez de exibido
	curl_setopt($Dcurl, CURLOPT_RETURNTRANSFER, true); //Recebe o output da url como uma string
	curl_setopt($Dcurl,CURLOPT_HTTPHEADER,array("Accept: ".$Dformat ));
	$Dresposta = curl_exec( $Dcurl );
	curl_close($Dcurl);
	for ($Dx = 0; $Dx < 8; $Dx++) {
		$Djsonfile = json_decode($Dresposta);
		$Djsonfile = $Djsonfile->results;
		$Djsonfile = $Djsonfile->bindings[$Dx];
		$Djsonfile = $Djsonfile->o;
		$Djsonfile = $Djsonfile->value;
		$principaisCategorias[$Dx] = $Djsonfile;
		$Djsonfile = json_decode($Dresposta);
		$Djsonfile = $Djsonfile->results;
		$Djsonfile = $Djsonfile->bindings[$Dx];
		$Djsonfile = $Djsonfile->count;
		$Djsonfile = $Djsonfile->value;
		$principaisCategoriasQtd[$Dx] = $Djsonfile;
	}


	// TAGS MAIS USADAS DO VIDEO
	$Dendereco = " ?o (COUNT(?o) AS ?count) {<$v> <dcterms:category> ?o

													} group by ?o order by desc(?count)";
	//$DsparqlURL = "http://200.131.219.214:10035/repositories/qodra?query=SELECT".urlencode($Dendereco);
	$DsparqlURL = ALLEGRO_URL . "?query=SELECT" . urlencode($Dendereco);
	$Dcurl = curl_init();
	//definimos a URL a ser usada
	curl_setopt($Dcurl, CURLOPT_URL, $DsparqlURL);
	// define que o conteúdo obtido deve ser retornado em vez de exibido
	curl_setopt($Dcurl, CURLOPT_RETURNTRANSFER, true); //Recebe o output da url como uma string
	curl_setopt($Dcurl, CURLOPT_HTTPHEADER, array("Accept: " . $Dformat));
	$Dresposta = curl_exec($Dcurl);
	curl_close($Dcurl);


	for ($Dx = 0; $Dx < 8; $Dx++) {
		$Djsonfile = json_decode($Dresposta);
		$Djsonfile = $Djsonfile->results;
		$Djsonfile = $Djsonfile->bindings[$Dx];
		$Djsonfile = $Djsonfile->o;
		$Djsonfile = $Djsonfile->value;
		$principaisCategoriasVideo[$Dx] = $Djsonfile;
		$Djsonfile = json_decode($Dresposta);

		$Dendereco = " (COUNT(?o) AS ?count) { ?o <dcterms:category> <$principaisCategoriasVideo[$Dx]> }";
		//$DsparqlURL = "http://200.131.219.214:10035/repositories/qodra?query=SELECT".urlencode($Dendereco);
		$DsparqlURL = ALLEGRO_URL . "?query=SELECT" . urlencode($Dendereco);
		$Dcurl = curl_init();
		//definimos a URL a ser usada
		curl_setopt($Dcurl, CURLOPT_URL, $DsparqlURL);
		// define que o conteúdo obtido deve ser retornado em vez de exibido
		curl_setopt($Dcurl, CURLOPT_RETURNTRANSFER, true); //Recebe o output da url como uma string
		curl_setopt($Dcurl, CURLOPT_HTTPHEADER, array("Accept: " . $Dformat));
		$QTDresposta = curl_exec($Dcurl);
		curl_close($Dcurl);

		$quantidade = json_decode($QTDresposta);
		$quantidade = $quantidade->results;
		$quantidade = $quantidade->bindings[0];
		$quantidade = $quantidade->count;
		$quantidade = $quantidade->value;
		$principaisCategoriasQtdVideo[$Dx] = $quantidade;

		//echo $principaisCategoriasVideo[$Dx]." ".$principaisCategoriasQtdVideo[$Dx]."<br />";

	}



?>
