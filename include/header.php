<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
<?php
session_start();
echo "<script src=\"".$siteurl."js/login.js\"></script>";
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
<header id="fixed-header" class="header fixed">
      <div class="wrap">
        <a href="<?php echo $siteurl ?>index.php"><h1 class="logo header__logo">Qodra.</h1></a>
        
        <form class="search-header form-search" action="lista-video.php">
          <input type="search" name="busca" id="busca" placeholder="álgebra, sódio, adamantium..." /> <input type="submit" value="Buscar" />
        </form>
        
        <nav id="menu-inst" class="menu-iconized">
          <a href="#menu" id="show-menu-inst" class="menu-iconized__icon"><span class="icon-menu"></span> <span class="text">Menu</span></a>
          <ul id="menu-inst-menu" class="menu-iconized__submenu">
            <li><a href="<?php echo $siteurl ?>index.php">Início</a></li>
            <li><a href="#universidades">Universidades</a></li>
            <li><a href="#videos">Vídeos</a></li>
            <li><a href="#professores">Professores</a></li>
            <li><a href="#sobre">Sobre</a></li>
          </ul>
        </nav>
        
        <div class="account"><?php
			  if (!isset($_SESSION['login_user']) || empty($_SESSION['login_user'])) {
			  echo "<ul>
  <li>
  	<a onClick=\"exibeLoginUp()\" class=\"button rounded\">Login</a>
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
			  <a href=\"".$siteurl."index.php?action=logout\">Sair</a>
			  </div>";
?>
        </div>
      </div>
    </header>
    
    <header id="static-header" class="header static">
      <div class="wrap">
        <nav class="header__menu">
          <ul>
            <li><a href="<?php echo $siteurl ?>index.php">Início</a></li>
            <li><a href="#universidades">Universidades</a></li>
            <li><a href="#videos">Vídeos</a></li>
            <li><a href="#professores">Professores</a></li>
            <li><a href="#sobre">Sobre</a></li>
          </ul>
        </nav>

        <a href="<?php echo $siteurl ?>index.php"><h1 class="logo header__logo">Qodra.</h1></a>
        
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
</ul>";
			  } else  {
				echo "<div class=\"account__user\">
			  <img src=\"".$siteurl."images/photos/".$_SESSION['user_photo']."\" />
			  <h2>".$_SESSION['user_name']."</h2>
			  	<div class=\"account__actions\">
              <a href=\"".$siteurl."editar-conta.php\">Minha conta</a>
			  	<a href=\"".$siteurl."index.php?action=logout\">Sair</a>
			  	</div>";
			  }
?>
        </div>
        
        <span class="header__arrow"></span>
      </div>
    </header>
