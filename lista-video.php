<?php 
	$busca = $_GET["busca"];
	if (!isset($_GET["pag"])) {
		$pag = 1;
	} else $pag = $_GET["pag"];
	include "include/busca.php";
	include "include/db.php";
    include "include/inicialNEW.php";

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $busca . " - ";?>Qodra</title>
    <meta name="description" content="Encontre vídeos no Qodra">
    <meta name="viewport" content="width=device-width">

    <link href="favicon.png" rel="shortcut icon">

    <link rel="stylesheet" href="css/reset.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/qodra-icons.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
  <?php include "include/header.php"; ?>
    
    <div class="body-main">
      <div class="wrap">
        <div class="box-search">
          <form class="box-search__form form-search" action="lista-video.php">
            <label for="busca">O que você  procura?</label>
            <input type="search" name="busca" id="busca" placeholder="álgebra, sódio, adamantium..." /> <input type="submit" value="Buscar" />
        <input type="hidden" name="pag" value="1"/>
          </form>
        </div>
        
        <section class="videos">
       <?php
        if ($countvid == 0) {
         	echo "<h1 class=\"title-main\">Não foram encontrados resultados para \"". $busca . "\"</h1>";	
		} else { 
			echo "
            <h1 class=\"title-main\">Resultado da busca por \"". $busca . "\"</h1>
		    <div class=\"videos__list group\">";
			if ($pag != $numpaginas) { 
				for ($x = 0; $x <= 8; $x++) {
					$sql = mysql_query("select id from tbl_videos where video = '".$links[$pag*9-9+1+$x]."' limit 1");
					$id = mysql_fetch_object($sql);
                    $auxiliar = $links[$pag*9-9+1+$x];
                    echo "<article>
            		<span class='videos__fav icon-star-black'></span>
              		<video height='180px' width='340px' poster='geraImagem.php?action=". $auxiliar ."' autoplay loop controls tabindex='0'></video>
              		<a class=\"videos__title\" href=\"detalhe-video.php?v=" . $links[$pag*9-9+1+$x] . "\">" . $titulos[$pag*9-9+1+$x] . "</a>
              		<a class=\"videos__like fnc_".$id->id."\""; 
					if(isset($_SESSION['user_id'])) {
						if (verifyLike($id->id) == '') {
							echo " onClick=\"likeVideo(".$id->id.",".countLikes($links[$pag*9-9+1+$x]).")\"";
						} else {
							echo " onClick=\"undoLike(".$id->id.",".countLikes($links[$pag*9-9+1+$x]).")\"";
						}
					}
					echo "><span class='icon-like-white".verifyLike($id->id)." like_".$id->id."'></span> <span class='link-icon__text count_like_".$id->id."'>".countLikes($links[$pag*9-9+1+$x])."</span></a>
     				<a class=\"videos__like\" href=\"detalhe-video.php?v=" . $links[$pag*9-9+1+$x] . "#comentar\" class='link-icon'><span class='icon-comment-white'></span> <span class='link-icon__text'>".countCommentaries($links[$pag*9-9+1+$x])."</span></a>
            		</article>";
		  		}
			} else {
				for ($x = 0; $x <= $countvid-($numpaginas-1)*9-1; $x++) {
                    $auxiliar = $links[($numpaginas-1)*9+$x];
			  		echo "<article>
            		<span class='videos__fav icon-star-black'></span>
              		<video height='180px' width='350px' poster='geraImagem.php?action=". $auxiliar ."' autoplay loop controls tabindex='0'></video>
              		<a class=\"videos__title\" href=\"detalhe-video.php?v=" . $links[($numpaginas-1)*9+$x] . "\">" . $titulos[($numpaginas-1)*9+$x] . "</a>
              		<a class=\"videos__like\" href='#gostei' class='link-icon'><span class='icon-like-white'></span> <span class='link-icon__text'>".countLikes($links[($numpaginas-1)*9+$x])."</span></a>
     				<a class=\"videos__like\" href=\"detalhe-video.php?v=" . $links[($numpaginas-1)*9+$x] . "#comentar\" class='link-icon'><span class='icon-comment-white'></span> <span class='link-icon__text'>".countCommentaries($links[($numpaginas-1)*9+$x])."</span></a>
            		</article>";
		  	}
		}
		if ($numpaginas != 1) {
			echo " <form action=\"lista-video.php\" method=\"get\" class=\"pagform\">	
         	<input type=\"hidden\" name=\"busca\" value=\"" . $busca . "\" />";	
			if ($pag != ($numpaginas)) {
				echo "<button type=\"submit\" name=\"pag\" value=\"" . ($pag+1) . "\">></button>";
			}
			for ($aux=$numpaginas; $aux >0; $aux--) {
				echo "<input type=\"submit\" name=\"pag\" value=\"" . $aux . "\""; 
				if ($aux == $pag) { 
					echo "id=\"ativo\""; 
				}
				echo "/>";
			}
			if ($pag != 1) {
				echo "<button type=\"submit\" name=\"pag\" value=\"" . ($pag-1) . "\"><</button>";
			}
			echo "</form>";
		} echo "</div>"; 
	}
		  ?>
        </section>
        
        <div class="group">
          <div class="column-8-12">
            <section class="main-categories group">
              <div class="title-sec">
                <h1>Principais categorias</h1>
                <a href="#ver-todas">Ver todas</a> </div>
              <div class="categorie-list">
                <ul class="categorie-list__list">
                  <?php
                  for( $i=0; $i<10; $i++){
                    echo'
                        <li><a href="'.$siteurl.'lista-video.php?busca='.$principaisCategorias[$i].'" method="get" >'.$principaisCategorias[$i].'</a> <span>'.$principaisCategoriasQtd[$i].'</span></li>
                      ';

                  }

                  ?>
                </ul>
              </div>

            </section>
          </div>
          <div class="column-4-12">
            <section class="main-tags">
              <div class="title-sec">
                <h1>Tags mais usadas</h1> <a href="#ver-todas">Ver todas</a>
              </div>
              <ul class="main-tags__list">
                <?php
                for ($x = 0; $x <= 7; $x++) {
                  echo "<li class=\"main-tags__tag" . ($x + 1) . "\"><a href=\"lista-video.php?busca=" . $Dtagsmaisusadas[$x] . "\">" . $Dtagsmaisusadas[$x] . "</a> <span>" . $Dtagsmaisusadasquant[$x] . " vídeos</span></li>";
                }
                ?>
              </ul>
            </section>
          </div>
        </div>
        
        
      </div>
    </div>
<?php include "include/footer.php"; ?>
    

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
    <script src="js/vendor/jquery.krakatoa.min.js"></script>
    <script src="js/main.js"></script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
      var _gaq = [['_setAccount', 'UA-XXXXX-X'], ['_trackPageview']];
      (function(d, t) {
        var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
        g.src = '//www.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g, s)
      }(document, 'script'));
    </script>
  </body>
</html>
