<?php 
include("db.php");
if(isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['email']) && isset($_POST['user']) && isset($_POST['senha']))
{
	$query="select user_name from tbl_usuarios";
	$sql = mysql_query($query);
	$aux1 = 0;
	while($id = mysql_fetch_object($sql)) {
		if ($id->user_name == $_POST['user']) {
			$aux1 = 1;
		}
	}
	
	$query="select user_email from tbl_usuarios";
	$sql = mysql_query($query);
	$aux = 0;
	while($id = mysql_fetch_object($sql)) {
		if ($id->user_email == $_POST['email']) {
			$aux = 1;
		}
	}
	if ($aux==0 && $aux1==0) {
	$query = "insert into tbl_usuarios (user_name, user_email, user_password, user_photo, user_info, user_sur) values ('".$_POST['user']."','".$_POST['email']."','".md5($_POST['senha'])."','default.png','".$_POST['nome']."','".$_POST['sobrenome']."')";
	mysql_query($query);
	echo "ok";
}
if ($aux==1) echo "email"; else if ($aux1==1) echo "user";
}
?>