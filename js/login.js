$(document).ready(function() {
$('#submit').click (function() {
  var username=$("#login").val();
  var password=$("#senha").val();
  if (username == '' || username == null) {
 	 $("#login_error").html("<span style='color:#cc0000'>Insira o seu usuário.</span>");
 	 $("#loginbox").css("height","26rem");
 	 return false;
  } else if (
     password == '' || password == null) {
 	 $("#login_error").html("<span style='color:#cc0000'>Insira a sua senha.</span>");
     $("#loginbox").css("height","26rem");
     return false;
  } else {
 	 var dataString = 'username='+username+'&password='+password;
	   $.ajax({
		 type: "POST",
		 url: "include/login.php",
		 data: dataString,
		 cache: false,
		 beforeSend: function(){ 
			$("#submit").val('Entrando...');
		 },
		 success: function(data){
		   if(data) {
			  location.reload();
		   } else {
			  $("#submit").val('Entrar');
			  $("#loginbox").css("height","26rem");
			  $("#login_error").html("<span style='color:#cc0000'>Usuário ou senha inválida.</span>");
			  return false;
		   }
		 }
	   });
  	return false;
  }
});
});

function likeVideo(id,likes) {
	likes = likes + 1;
	$('.like_'+id).addClass('liked');
	$('.fnc_'+id).removeAttr("onClick").attr("onClick","undoLike("+id+","+likes+")");
	$('.count_like_'+id).html(likes);
	var dataString = 'video='+id+'&action=like';
	   $.ajax({
		 type: "POST",
		 url: "include/likeVideo.php",
		 data: dataString,
		 cache: false
	   });
};

function undoLike(id,likes) {
	likes = likes - 1;
	$('.like_'+id).removeClass('liked');
	$('.fnc_'+id).removeAttr("onClick").attr("onClick","likeVideo("+id+","+likes+")");
	$('.count_like_'+id).html(likes);
	var dataString = 'video='+id+'&action=unlike';
	   $.ajax({
		 type: "POST",
		 url: "include/likeVideo.php",
		 data: dataString,
		 cache: false
	   });
};