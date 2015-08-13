$(document).ready(function() {
$('#comment_submit').click (function() {
  var comment=$("textarea#comment").val();
  var video_id=$("#video_id").val();
  if (comment == '' || comment == null) {
 	 return false;
  } else {
 	 var dataString = 'comment='+comment+'&id_video='+video_id;
	   $.ajax({
		 type: "POST",
		 url: "include/insertComment.php",
		 data: dataString,
		 cache: false,
		 beforeSend: function(){ 
			$("#comment_submit").val('Enviando...');
		 },
		 success: function(data){
		   if(data) {
 			  location.reload();
 			  return false;
		   } else {
 	 		  $("#comment_error").html("<span style='color:#cc0000'>Erro.</span>");
			  return false;
		   }
		 }
	   });
  	return false;
  }
});});

function deleteComment(comment_id) {
	if(confirm('Deseja realmente excluir o comentário?') == true) {
 	 var dataString = 'comment_id='+comment_id;
	   $.ajax({
		 type: "POST",
		 url: "include/insertComment.php",
		 data: dataString,
		 cache: false,
		 beforeSend: function(){
		 },
		 success: function(data){
		   if(data) {
			  location.reload();
			  return true;
		   } else {
			  return false;
		   }
		 }
	   });
  	return false;
	} else return false;
};