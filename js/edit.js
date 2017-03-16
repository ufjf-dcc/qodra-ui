$(document).ready(function() {
$('#edit__submitform').click (function() {
  var name=$("#nome").val();
  var sur=$("#sobre").val();
  var email=$("#email").val();
  var user=$("#user").val();
  var id=$("#id").val();
  var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
  var result = re.test(email);
  if (name == '' || name == null) {
 	 $("#form_error").html("<span style='color:#cc0000'>Insira o seu nome.</span>");
 	 return false;
  } else if (sur == '' || sur == null) {
 	 $("#form_error").html("<span style='color:#cc0000'>Insira o seu sobrenome.</span>");
     return false;
  } else if (user == '' || user == null) {
 	 $("#form_error").html("<span style='color:#cc0000'>Insira o seu usuário.</span>");
     return false;
  } else if (email == '' || email == null || result == false) {
 	 $("#form_error").html("<span style='color:#cc0000'>Insira um email válido.</span>");
     return false;
  } else {
 	 var dataString = 'nome='+name+'&sobre='+sur+'&email='+email+'&id='+id+'&user='+user;
	   $.ajax({
		 type: "POST",
		 url: "include/changeInfo.php",
		 data: dataString,
		 cache: false,
		 beforeSend: function(){
		 },
		 success: function(data){
		   if (data=='email') { 
 	 		  $("#form_error").html("<span style='color:#cc0000'>Email já utilizado.</span>");
			  return false;
		   } else if (data=='user') {
 	 		  $("#form_error").html("<span style='color:#0C0'>Usuário já utilizado.</span>");
			  return false;
		   } else if (data) {
 	 		  $("#form_error").html("<span style='color:#0C0'>Informações alteradas.</span>");
			  return true;
		   } else {
 	 		  $("#form_error").html("<span style='color:#cc0000'>Erro.</span>");
			  return false;
		   }
		 }
	   });
  	return false;
  }
});
$('#edit__submitpass').click (function() {
  var atual=$("#atual").val();
  var nova=$("#nova").val();
  var conf=$("#conf").val();
  var id=$("#id").val();
  if (atual == '' || atual == null) {
 	 $("#pass_error").html("<span style='color:#cc0000'>Insira a sua senha atual.</span>");
 	 return false;
  } else if (nova == '' || nova == null) {
 	 $("#pass_error").html("<span style='color:#cc0000'>Insira a sua nova senha.</span>");
     return false;
  } else if (conf == '' || conf == null) {
 	 $("#pass_error").html("<span style='color:#cc0000'>Insira a confirmação da nova senha.</span>");
     return false;
  } else if (nova != conf) {
 	 $("#pass_error").html("<span style='color:#cc0000'>Confirmação não confere.</span>");
     return false;
  } else {
 	 var dataString = 'atual='+atual+'&nova='+nova+'&id='+id;
	   $.ajax({
		 type: "POST",
		 url: "include/updatePassword.php",
		 data: dataString,
		 cache: false,
		 beforeSend: function(){
		 },
		 success: function(data){
		   if (data=='denied') { 
 	 		  $("#pass_error").html("<span style='color:#cc0000'>Senha atual não confere.</span>");
			  return false;
		   } else if (data) {
			  $("#editpass")[0].reset();
 	 		  $("#pass_error").html("<span style='color:#0C0'>Senha alterada.</span>");
			  return true;
		   } else {
 	 		  $("#pass_error").html("<span style='color:#cc0000'>Erro.</span>");
			  return false;
		   }
		 }
	   });
  	return false;
  }
});
});