$(document).ready(function() {
$('#sign__submitform').click (function() {
  var nome=$("#nome").val();
  var sobrenome=$("#sobrenome").val();
  var email=$("#email").val();
  var user=$("#user").val();
  var senha=$("#pass").val();
  var conf=$("#conf").val();
  var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
  var result = re.test(email);
  if (nome == '' || nome == null) {
 	 $("#sign_error").html("<span style='color:#cc0000'>Insira o seu nome.</span>");
	 $("#sign__submitform").css('margin-top','12rem');
 	 return false;
  } else if (sobrenome == '' || sobrenome == null) {
 	 $("#sign_error").html("<span style='color:#cc0000'>Insira o seu sobrenome.</span>");
	 $("#sign__submitform").css('margin-top','12rem');
 	 return false;
  } else if (email == '' || email == null) {
 	 $("#sign_error").html("<span style='color:#cc0000'>Insira o seu email.</span>");
	 $("#sign__submitform").css('margin-top','12rem');
 	 return false;
  } else if (result == false) {
 	 $("#sign_error").html("<span style='color:#cc0000'>Email inválido.</span>");
	 $("#sign__submitform").css('margin-top','12rem');
 	 return false;
  } else if (user == '' || user == null) {
 	 $("#sign_error").html("<span style='color:#cc0000'>Insira o seu usuário.</span>");
	 $("#sign__submitform").css('margin-top','12rem');
 	 return false;
  } else if (senha == '' || senha == null) {
 	 $("#sign_error").html("<span style='color:#cc0000'>Insira a sua senha.</span>");
	 $("#sign__submitform").css('margin-top','12rem');
 	 return false;
  } else if (senha != conf) {
 	 $("#sign_error").html("<span style='color:#cc0000'>Senhas não conferem.</span>");
	 $("#sign__submitform").css('margin-top','12rem');
 	 return false;
  } else {
 	 var dataString = 'nome='+nome+'&sobrenome='+sobrenome+'&email='+email+'&user='+user+'&senha='+senha;
	   $.ajax({
		 type: "POST",
		 url: "include/cadastro.php",
		 data: dataString,
		 cache: false,
		 beforeSend: function(){ 
			$("#submit").val('Enviando...');
		 },
		 success: function(data){
		   if(data=='email') {
 			  $("#sign_error").html("<span style='color:#cc0000'>Email já utilizado.</span>");
	 		  $("#sign__submitform").css('margin-top','12rem');
 			  return false;
		   } else if(data=='user') {
 			  $("#sign_error").html("<span style='color:#cc0000'>Usuário já utilizado.</span>");
	 		  $("#sign__submitform").css('margin-top','12rem');
 			  return false;
		   } else if (data) {
			  var url = window.location.href;
			  window.location.replace(url+"?success=1");
 			  return true;		   
		   } else {
 	 		  $("#sign_error").html("<span style='color:#cc0000'>Erro.</span>");
	 		  $("#sign__submitform").css('margin-top','12rem');
			  return false;
		   }
		 }
	   });
  	return false;
  }
});});