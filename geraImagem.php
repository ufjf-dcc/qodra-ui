<?php
header('Content-Type: image/jpg');
$login="root:abc123";
/**
 * Created by PhpStorm.
 * User: root
 * Date: 09/12/15
 * Time: 15:30
 */

if (isset($_GET["action"])) {

    $sujeito = $_GET["action"];

    $format = 'application/sparql-results+json';

    $endereco = "select ?img { <".$sujeito.">  <dcterms:thumbnail> ?img
            }";

            $url = urlencode($endereco);

            $sparqlURL = 'http://localhost:10035/repositories/qodra?query='.$url.'';

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_USERPWD, $GLOBALS['login']);
            curl_setopt($curl, CURLOPT_URL, $sparqlURL);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //Recebe o output da url como uma string
            curl_setopt($curl,CURLOPT_HTTPHEADER,array('Accept: '.$format ));
            $resposta = curl_exec( $curl );

            curl_close($curl);

            $nav = json_decode($resposta);
            $nav = $nav->results;;
            $nav = $nav->bindings[0];
            $nav = $nav->img;
            $nav = $nav->value;
            // echo strlen($nav)."<br />";	
            if( strlen($nav) < 10){
                echo "fake-content/video-poster.jpg";
            } else{
                $img = base64_decode($nav);
                echo $img;
            }


} else{
    echo "fake-content/video-poster.jpg";
}


?>
