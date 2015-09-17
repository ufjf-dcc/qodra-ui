<?php 
	include "include/inicial.php";
function countLikes($video_link) {
	$sql = mysql_query("select id from tbl_videos where video = '".$video_link."' limit 1");
	$id = mysql_fetch_object($sql);
	$sql = mysql_query("select count(id_user) as contador from tbl_likes where id_video = ".$id->id);
	$sql = mysql_fetch_object($sql);
	return $sql->contador;
}
function countCommentaries($video_link) {
	$sql = mysql_query("select id from tbl_videos where video = '".$video_link."' limit 1");
	$id = mysql_fetch_object($sql);
	$sql = mysql_query("select count(id_user) as contador from tbl_comment where id_video = ".$id->id);
	$sql = mysql_fetch_object($sql);
	return $sql->contador;
}
function verifyLike($id) {
	if (isset($_SESSION['user_id'])) {
	$sql = mysql_query("select count(id_user) as contador from tbl_likes where id_video = ".$id." and id_user = ".$_SESSION['user_id']);
	$sql = mysql_fetch_object($sql);
	if ($sql->contador == 1) return ' liked';
	else return '';
	} else return '';
}
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
<script src="js/login.js"></script>
<header class="header static">
          <div class="wrap">
    <nav class="header__menu">
              <ul>
        <li><a href="<?php echo $siteurl ?>">Início</a></li>
        <li><a href="#universidades">Universidades</a></li>
        <li><a href="#videos">Vídeos</a></li>
        <li><a href="#professores">Professores</a></li>
        <li><a href="#sobre">Sobre</a></li>
      </ul>
            </nav>
        <a href="<?php echo $siteurl ?>"><h1 class="logo header__logo">Qodra.</h1></a>
    <div class="account">
<?php 
if (!isset($_SESSION['login_user']) || empty($_SESSION['login_user'])) {
	echo "<ul>
  <li>
  	<a onClick=\"exibeLogin()\" class=\"button rounded\">Login</a>
  	<section id=\"loginbox\" class=\"login-inst\">
 	 <form action=\"\" id=\"login_form\" class=\"login-sec__form form-login\" method=\"post\" >
 		 <span class=\"form-label\">Login</span>
 		 <input type=\"text\" name=\"user_name\" id=\"login\" />
 		 <span class=\"form-label\">Senha</span>
		 <input type=\"password\" name=\"user_password\" id=\"senha\" />
  		 <span id=\"login_error\"></span>
  		 <input id=\"submit\" style=\"margin-top:1rem; border-bottom: 0.5rem solid #2980b9;\" type=\"submit\" value=\"Entrar\" />
  	 </form>
  	</section>
  </li>
  <li>
  	<a href=\"".$siteurl."cadastro.php\" class=\"button rounded\">Cadastre-se</a>
  </li>
</ul>";} else echo "
          <div class=\"account__user\">
			  <img src=\"".$siteurl."images/photos/".$_SESSION['user_photo']."\" />
            <h2>".$_SESSION['user_name']."</h2>
            <div class=\"account__actions\">
              <a href=\"".$siteurl."editar-conta.php\">Minha conta</a>
              <a href=\"".$siteurl."index.php/?action=logout\">Sair</a>
            </div>";
?>
</div>
    <span class="header__arrow"></span> </div>
        </header>
<div class="body-main">
          <section class="big-call">
    <div class="wrap">
              <p class="big-call__call"> Bem vindo! Qodra é um site onde você pode<br />
        encontrar facilmente vídeos e áudios de conteúdo<br />
        educacional. </p>
              <form class="big-call__form form-search" action="lista-video.php" method="get" >
        <label for="busca">O que você  procura?</label>
        <input type="search" name="busca" id="busca" placeholder="álgebra, sódio, adamantium..." />
        <input type="submit" value="Buscar" />
      </form>
              <div class="big-call__links"><a href="#videos" class="button rounded">Vídeos</a> <a href="#sobre" class="button rounded">Sobre</a> </div>
            </div>
  </section>
          <div class="wrap">
    <section class="featured-videos videos">
              <h1 class="title-main">Vídeos em destaque</h1>
              <div class="videos__slider krakatoa">
        <?php for ($x = 0; $x <= 8; $x++) {
					$sql = mysql_query("select id from tbl_videos where video = '".$links[$x]."' limit 1");
					$id = mysql_fetch_object($sql);
			  		echo "<article>
            		<span class='videos__fav icon-star-black'></span>
              		<video poster='fake-content/video-poster.jpg' autoplay loop controls tabindex='0'></video>
              		<a class=\"videos__title\" href=\"detalhe-video.php?v=" . $links[$x] . "\">" . $titulos[$x]. "</a>
              		<a class=\"videos__like fnc_".$id->id."\""; 
					if(isset($_SESSION['user_id'])) {
						if (verifyLike($id->id) == '') {
							echo " onClick=\"likeVideo(".$id->id.",".countLikes($links[$x]).")\"";
						} else {
							echo " onClick=\"undoLike(".$id->id.",".countLikes($links[$x]).")\"";
						}
					}
					echo "><span class='icon-like-white".verifyLike($id->id)." like_".$id->id."'></span> <span class='link-icon__text count_like_".$id->id."'>".countLikes($links[$x])."</span></a>
     			    <a class=\"videos__like\" href='detalhe-video.php?v=" . $links[$x] . "#comentar' class='link-icon'><span class='icon-comment-white'></span> <span class='link-icon__text'>".countCommentaries($links[$x])."</span></a>
            		</article>";
		  		}
		?>
      </div>
            </section>
    <section class="main-videos videos">
              <h1 class="title-main">Principais vídeos</h1>
              <div class="videos__slider krakatoa">
        <?php for ($x = 0; $x <= 8; $x++) {
					$sql = mysql_query("select id from tbl_videos where video = '".$links[$x]."' limit 1");
					$id = mysql_fetch_object($sql);
			  		echo "<article>
            		<span class='videos__fav icon-star-black'></span>
              		<video poster='fake-content/video-poster.jpg' autoplay loop controls tabindex='0'></video>
              		<a class=\"videos__title\" href=\"detalhe-video.php?v=" . $links[$x] . "\">" . $titulos[$x]. "</a>
              		<a class=\"videos__like fnc_".$id->id."\""; 
					if(isset($_SESSION['user_id'])) {
						if (verifyLike($id->id) == '') {
							echo " onClick=\"likeVideo(".$id->id.",".countLikes($links[$x]).")\"";
						} else {
							echo " onClick=\"undoLike(".$id->id.",".countLikes($links[$x]).")\"";
						}
					}
					echo "class='link-icon'><span class='icon-like-white".verifyLike($id->id)." like_".$id->id."'></span> <span class='link-icon__text count_like_".$id->id."'>".countLikes($links[$x])."</span></a>
     			    <a class=\"videos__like\" href='detalhe-video.php?v=" . $links[$x] . "#comentar' class='link-icon'><span class='icon-comment-white'></span> <span class='link-icon__text'>".countCommentaries($links[$x])."</span></a>
            		</article>";
		  		}
		?>
      </div>
            </section>
    <div class="group">
              <div class="column-8-12">
        <section class="main-categories group">
                  <div class="title-sec">
            <h1>Principais categorias</h1>
            <a href="#ver-todas">Ver todas</a> </div>
                  <div class="categorie-list">
            <h2 class="categorie-list__title">Ciências Naturais</h2>
            <ul class="categorie-list__list">
                      <li><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                      <li><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                      <li><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                      <li><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                      <li><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                    </ul>
          </div>
                  <div class="categorie-list">
            <h2 class="categorie-list__title">Ciências Naturais</h2>
            <ul class="categorie-list__list">
                      <li><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                      <li><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                      <li><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                      <li><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                      <li><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                    </ul>
          </div>
                  <div class="categorie-list">
            <h2 class="categorie-list__title">Ciências Naturais</h2>
            <ul class="categorie-list__list">
                      <li><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                      <li><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                      <li><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                      <li><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                      <li><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                    </ul>
          </div>
                  <div class="categorie-list">
            <h2 class="categorie-list__title">Ciências Naturais</h2>
            <ul class="categorie-list__list">
                      <li><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                      <li><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                      <li><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                      <li><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                      <li><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                    </ul>
          </div>
                  <div class="categorie-list">
            <h2 class="categorie-list__title">Ciências Naturais</h2>
            <ul class="categorie-list__list">
                      <li><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                      <li><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                      <li><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                      <li><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                      <li><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                    </ul>
          </div>
                </section>
      </div>
              <div class="column-4-12">
        <section class="main-tags">
                  <div class="title-sec">
            <h1>Tags mais usadas</h1>
            <a href="#ver-todas">Ver todas</a> </div>
                  <ul class="main-tags__list">
            <?php 
				for ($x = 0; $x <= 7; $x++) {
			  		echo "<li class=\"main-tags__tag". ($x+1) ."\"><a href=\"lista-video.php?busca=" . $tagsmaisusadas[$x] . "\">" . $tagsmaisusadas[$x] . "</a> <span>" . $tagsmaisusadasquant[$x] . " vídeos</span></li>";
		  		}
		  ; 
			?>
          </ul>
                </section>
      </div>
            </div>
  </div>
        </div>
<?php include "include/footer.php"; ?>
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
