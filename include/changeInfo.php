<?php 
include("db.php");
if(isset($_POST['nome']) && isset($_POST['sobre']) && isset($_POST['email']) && isset($_POST['user']))
{
	$query="select user_name from tbl_usuarios where user_id = ".$_POST['id'];
	$sql = mysql_query($query);
	$id = mysql_fetch_object($sql);
	$aux1 = 0;
	if ($id->user_name != $_POST['user']) {
	  $query="select user_name from tbl_usuarios";
	  $sql = mysql_query($query);
	  while($id = mysql_fetch_object($sql)) {
		  if ($id->user_name == $_POST['user']) {
			  $aux1 = 1;
		  }
	  }
	}
	$query="select user_email from tbl_usuarios where user_id = ".$_POST['id'];
	$sql = mysql_query($query);
	$id = mysql_fetch_object($sql);
	$aux = 0;
	if ($id->user_email != $_POST['email']) {
	  $query="select user_email from tbl_usuarios";
	  $sql = mysql_query($query);
	  while($id = mysql_fetch_object($sql)) {
		  if ($id->user_email == $_POST['email']) {
			  $aux = 1;
		  }
	  }
	}
	if ($aux==0 && $aux1==0) {
	$query = "update tbl_usuarios set user_info = '".$_POST['nome']."', user_sur = '".$_POST['sobre']."', user_email = '".$_POST['email']."', user_name = '".$_POST['user']."' where user_id = '".$_POST['id']."'";
	mysql_query($query);
	session_start();
	$_SESSION['user_login'] = $_POST['user'];
	$_SESSION['user_name'] = $_POST['nome'];
	$_SESSION['user_surname'] = $_POST['sobre'];
	$_SESSION['user_email'] = $_POST['email'];
	echo "ok";
}
if ($aux==1) echo "email";
if ($aux1==1) echo "user";
}
?>