<?php 
	include "include/db.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Editar Conta - Qodra</title>
<meta name="description" content="Encontre vídeos no Qodra">
<meta name="viewport" content="width=device-width">
<link href="favicon.png" rel="shortcut icon">
<link rel="stylesheet" href="css/reset.css">
<link href='http://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/qodra-icons.css">
<link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php include "include/header.php";
	if (!isset($_SESSION['login_user']) || empty($_SESSION['login_user'])) {
		header('Location: ' . $siteurl);
		die();
	} 
?>
<script src="js/edit.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script type="text/javascript"> 
$(document).ready(function(){
$('#imagem').on('change',function(){ 
	if ($('#imagem') != '' || $('#imagem') != null) {
		$('#form_error').html('<img src="<?php echo $siteurl ?>images/ajax-loader.gif" alt="Enviando..."/> Enviando...');
		$('#updatePhoto').ajaxForm({target:'#form_error'}).submit(); 
	}
});});
</script>
<div class="body-main">
  <div class="edit__bg">
    <div class="wrap">
      <div class="edit__box"> <span class="edit__call_1">Editar perfil</span> <span class="edit__call_2">Alterar senha</span>
        <div class="edit__imgbox"> <img src="images/photos/<?php echo $_SESSION['user_photo'];?>" class="edit__imgbox__img" /> <span id="imgchange" class="edit__imgbox__imgchange">
          <form class="update" id="updatePhoto" method="post" enctype="multipart/form-data" action="<?php echo $siteurl ?>include/uploadPhoto.php">
            <input class="custom-file-input" type="file" id="imagem" name="imagem" />
            <input type="hidden" value="<?php echo $_SESSION['user_id'];?>" id="id" name="id" />
          </form>
          <form class="update" onsubmit="return confirm('Deseja realmente remover sua foto?');" id="removePhoto" method="post" enctype="multipart/form-data" action="<?php echo $siteurl ?>include/removePhoto.php">
            <input type="hidden" value="<?php echo $_SESSION['user_id'];?>" id="id" name="id" />
            <input id="custom-file-input2" type="submit" value="Remover"/>
          </form>
          </span>
          <div id="visualizar"></div>
        </div>
        <form action="" id="edit__form" class="edit__form">
          <span class="edit__form__label">Nome:</span>
          <input id="nome" class="edit__form__input" value="<?php echo $_SESSION['user_name'];?>" />
          <span class="edit__form__label">Sobrenome:</span>
          <input id="sobre" class="edit__form__input" value="<?php echo $_SESSION['user_surname'];?>" />
          <span class="edit__form__label">Usuário:</span>
          <input id="user" class="edit__form__input" value="<?php echo $_SESSION['user_login'];?>" />
          <span class="edit__form__label">Email:</span>
          <input id="email" class="edit__form__input" value="<?php echo $_SESSION['user_email'];?>" />
          <div class="edit__error" id="form_error"></div>
          <input type="hidden" id="id" value="<?php echo $_SESSION['user_id'];?>" />
          <input type="submit" id="edit__submitform" value="Salvar"/>
        </form>
        <form id="editpass" class="edit__pass">
          <span class="edit__form__label">Senha atual:</span>
          <input id="atual" type="password" class="edit__form__input" />
          <span class="edit__form__label">Nova senha:</span>
          <input id="nova" type="password" class="edit__form__input" />
          <span class="edit__form__label">Confirmação:</span>
          <input id="conf" type="password" class="edit__form__input" />
          <div class="edit__error" id="pass_error"></div>
          <input type="hidden" id="id" value="<?php echo $_SESSION['user_id'];?>" />
          <input type="submit" id="edit__submitpass" value="Salvar"/>
        </form>
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
</body>
</html>
