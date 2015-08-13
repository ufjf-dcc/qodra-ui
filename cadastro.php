<?php 
	include "include/db.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Cadastro - Qodra</title>
<meta name="description" content="Encontre vídeos no Qodra">
<meta name="viewport" content="width=device-width">
<link href="favicon.png" rel="shortcut icon">
<link rel="stylesheet" href="css/reset.css">
<link href='http://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/qodra-icons.css">
<link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php 
	include "include/header.php";
	if (isset($_SESSION['login_user'])) {
		header('Location: ' . $siteurl);
		die();
	} 
	if (!isset($_GET['success'])) {
		echo "
<script src=\"js/cadastro.js\"></script>
<div class=\"body-main\">
  <div class=\"edit__bg\">
    <div class=\"wrap\">
      <div class=\"edit__box\">
      	<div class=\"sign__bigcall\">Bem-vindo ao Qodra.<br><span>Faça seu cadastro para marcar seus vídeos favoritos e debater sobre eles!</span></div>
       <span class=\"edit__call_3\">Cadastro</span>
        <form action=\"\" id=\"sign__form\" class=\"sign__form\">
          <span class=\"sign__form__label\">Nome:</span>
          <input id=\"nome\" class=\"sign__form__input\" />
          <span class=\"sign__form__label\">Sobrenome:</span>
          <input id=\"sobrenome\" class=\"sign__form__input\" />
          <span class=\"sign__form__label\">Email:</span>
          <input id=\"email\" class=\"sign__form__input\" />
          <span class=\"sign__form__label\">Usuário:</span>
          <input id=\"user\" class=\"sign__form__input\" />
          <span class=\"sign__form__label\">Senha:</span>
          <input id=\"pass\" type=\"password\" class=\"sign__form__input\" />
          <span class=\"sign__form__label\">Confirmar senha:</span>
          <input id=\"conf\" type=\"password\" class=\"sign__form__input\" />
          <div class=\"sign__error\" id=\"sign_error\"></div>
          <input type=\"submit\" id=\"sign__submitform\" value=\"Salvar\"/>
        </form>
      </div>
    </div>
  </div>

</div>";
} else if ($_GET['success'] == 1) {
echo "<div class=\"body-main\">
  <div class=\"edit__bg\">
  	<div class=\"wrap\">
  		<span class=\"sign__success\">Cadastro realizado com Sucesso!</span>
  		<span id=\"sign__login\" onclick=\"exibeLoginUp()\">Faça seu login aqui.</span>
	</div>
  </div>
</div>";
}
?>
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
</body>
</html>
