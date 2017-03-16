<?php 
include("db.php");
if(isset($_POST['atual']) && isset($_POST['nova']) && isset($_POST['id']))
{	
	$query="select user_password from tbl_usuarios where user_id = ".$_POST['id'];
	$sql = mysql_query($query);
	$id = mysql_fetch_object($sql);
	$aux = 0;
	if ($id->user_password != md5($_POST['atual'])) {
	  echo "denied";
	} else {
	$query = "update tbl_usuarios set user_password = '".md5($_POST['nova'])."' where user_id = '".$_POST['id']."'";
	mysql_query($query);
	echo "ok";
	}
}
?>