<?php
	$ex = explode('/',$v);
	$tam = count($ex);
	$vid = $ex[$tam-1];
	$format = "application/sparql-results+json";
	$endereco = " ?s ?o ?h WHERE { ?s <dcterms:title> ?o filter(regex(str(?s), '".$vid."', 'i' )). ?s <dcterms:course> ?h filter(regex(str(?s), '".$vid."', 'i' ))}";
	error_log($endereco);
	$sparqlURL = "http://200.131.219.214:10035/repositories/qodra?query=SELECT".urlencode($endereco);
	$curl = curl_init();
    //definimos a URL a ser usada
	curl_setopt($curl, CURLOPT_URL, $sparqlURL);        
    // define que o conteúdo obtido deve ser retornado em vez de exibido
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //Recebe o output da url como uma string
	curl_setopt($curl,CURLOPT_HTTPHEADER,array("Accept: ".$format ));
  	$resposta = curl_exec( $curl );
 	curl_close($curl);
	$jsonfile = json_decode($resposta);     
	$jsonfile = $jsonfile->results;
	$jsonfile = $jsonfile->bindings[0];
	$titulo = $jsonfile->o;
	$titulo = $titulo->value;
	$curso = $jsonfile->h;
	$curso = $curso->value;
	/* http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencia_da_computacao/DCC116/Aula04/Aula04.xml#home */
	$final = $ex[$tam-1];
	$aux = explode('.',$final);
	$final = $aux[0];
	$vidurl = "http://va05-idc.rnp.br/riotransfer/" . $ex[$tam-5] . "/" . $ex[$tam-4] . "/" . $ex[$tam-3] . "/" . $ex[$tam-2] . "/" . 
	$final . ".mp4";
?>