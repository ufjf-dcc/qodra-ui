<?php 
	$v = $_GET["v"];
	include "include/detalhe.php";
	include "include/db.php";
	function formataData($data) {
		$ex = explode(' ',$data);
		$time = explode(':',$ex[1]);
		$data = explode('-',$ex[0]);
		if ($data[1]=='01') $mes = 'Janeiro'; else if ($data[1]=='02') $mes = 'Fevereiro'; else if ($data[1]=='03') $mes = 'Março'; else if ($data[1]=='04') $mes = 'Abril'; else if ($data[1]=='05') $mes = 'Maio'; else if ($data[1]=='06') $mes = 'Junho'; else if ($data[1]=='07') $mes = 'Julho'; else if ($data[1]=='08') $mes = 'Agosto'; 
		else if ($data[1]=='09') $mes = 'Setembro'; else if ($data[1]=='10') $mes = 'Outuburo'; else if ($data[1]=='11') $mes = 'Novembro'; else if ($data[1]=='12') $mes = 'Dezembro';
		$result = $data[2] . " de " . $mes . " de " . $data[0] . " - " . $time[0] . ":" . $time[1];
		return $result;
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Qodra</title>
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
	<script src="js/comment.js"></script>
    <div class="body-main">
      <span id="comentar"></span>
      <div class="wrap">
        <div class="box-search">
          <form class="box-search__form form-search" action="lista-video.php">
            <label for="busca">O que você  procura?</label>
            <input type="search" name="busca" id="busca" placeholder="álgebra, sódio, adamantium..." /> <input type="submit" value="Buscar" />
          </form>
        </div>
        
        <div class="group">
          <div class="column-1-12">
            <div class="scroll-nav">
              <ul>
                <li><a href="#star" class="icon-star-white"></a></li>
                <li><a href="#tag" class="icon-tag-white"></a></li>
                <li><a href="#comentar" class="icon-comment-white"></a></li>
              </ul>
            </div>
          </div>
          <div class="column-11-12">
            <div class="video-frame">
              <video controls autoplay name="media" id="video"><source src="<?php echo $vidurl ?>" type="video/mp4"></video>
            </div>
            <div class="video-likes"><h1 class="video-title"> <?php echo $titulo ?><span class="video-subtitle"> Em <?php echo $curso ?></span></h1>
			<?php   
			 		$query = "select * from tbl_videos where video = '".$v."'";
					$sql = mysql_query($query);
					$id = mysql_fetch_object($sql);
					$video_id = $id->id;
					echo "<span class=\"likes__arrow\"></span><a class=\"videos__like fnc_".$id->id."\""; 
					if(isset($_SESSION['user_id'])) {
						if (verifyLike($id->id) == '') {
							echo " onClick=\"likeVideo(".$id->id.",".countLikes($v).")\"";
						} else {
							echo " onClick=\"undoLike(".$id->id.",".countLikes($v).")\"";
						}
					}
					echo "><span class='icon-like-white".verifyLike($id->id)." like_".$id->id."'></span> <span class='link-icon__text count_like_".$id->id."'>".countLikes($v)."</span></a><a class=\"videos__like\" href='detalhe-video.php?v=" . $v . "#comentar' class='link-icon'><span class='icon-comment-white'></span> <span class='link-icon__text'>".countCommentaries($v)."</span></a></div><div id=\"comment\" class=\"comments\">";
			 		$query = "select * from tbl_videos where video = '".$v."'";
					$sql = mysql_query($query);
					$id = mysql_fetch_object($sql);
					$video_id = $id->id;
					$query = "select * from tbl_comment where id_video = ".$id->id;
					$sql = mysql_query($query);
					$ver = mysql_fetch_object($sql);
					if (isset($ver->id_video)) {
              			echo "<h1 class=\"title-main\">Comentários</h1>";
						$query = "select * from tbl_comment where id_video = ".$id->id." order by comment_date";
						$sql = mysql_query($query);
						while ($com = mysql_fetch_object($sql)) {
							$query = "select * from tbl_usuarios where user_id = ".$com->id_user;
							$sql_user = mysql_query($query);
							$sql_user = mysql_fetch_object($sql_user);
							echo "<article class=\"comment\">
                			<div class=\"comment__user group\">
                 			<img src=\"".$siteurl."images/photos/".$sql_user->user_photo."\" /><h1>".$sql_user->user_info." ".$sql_user->user_sur."</h1><span>".formataData($com->comment_date)."</span>
                			</div>
                			<div class=\"comment__comment\">
							<span class=\"comment__arrow\"></span>";
							if (isset($_SESSION['login_user']) && $com->id_user == $_SESSION['user_id']) {
								echo "<span onClick=\"deleteComment(".$com->comment_id.")\" id=\"comment__delete\" class=\"comment__delete\">-</span>";
							}
                  			echo "<p>".$com->comment."</p>
                			</div>
              				</article>";
						}
					}					
					if (isset($_SESSION['login_user'])){
						echo "<div class=\"comment__form\" >
              			<h2 class=\"title-ter\">Comente</h2>
              			<form class=\"form\">
                		<div class=\"form__input\">
                  		<textarea name=\"comment\" id=\"comment\"></textarea>
                		</div>
                		<div class=\"form__input\">
                  		<input id=\"video_id\" type=\"hidden\" value=\"".$video_id."\" />
                  		<input id=\"comment_submit\" type=\"submit\" value=\"Comentar\" />
						<div id=\"comment_error\"></div>
                		</div>
              			</form>
            			</div>";
					} else echo "<div class=\"comment__form\">
              			<h2 class=\"title-ter\">Para comentar, faça o seu <span style=\"cursor:pointer;color:#818181;\" onclick=\"exibeLoginUp()\">login</span> ou <a style=\"color:#818181; text-decoration:none;\" href=\"".$siteurl."cadastro.php\">cadastre-se</a>.</h2>
						</div>";
			 ?>
            </div>
          </div>
        </div>
        
        <div class="group">
          <div class="column-8-12">
            <section class="main-categories group">
              <div class="title-sec">
                <h1>Principais categorias</h1> <a href="#ver-todas">Ver todas</a>
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
                <h1>Tags mais usadas</h1> <a href="#ver-todas">Ver todas</a>
              </div>
              <ul class="main-tags__list">
                <li class="main-tags__tag1"><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                <li class="main-tags__tag2"><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                <li class="main-tags__tag3"><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                <li class="main-tags__tag4"><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                <li class="main-tags__tag5"><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                <li class="main-tags__tag6"><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                <li class="main-tags__tag7"><a href="#">Astronomia</a> <span>7 vídeos</span></li>
                <li class="main-tags__tag8"><a href="#">Astronomia</a> <span>7 vídeos</span></li>
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
