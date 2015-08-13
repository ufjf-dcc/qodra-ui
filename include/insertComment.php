<?php 
include("db.php");
if(isset($_POST['comment']) && isset($_POST['id_video']))
{
	session_start();
	$query = "insert into tbl_comment (id_user, id_video, comment, comment_date) values ('".$_SESSION['user_id']."','".$_POST['id_video']."','".nl2br(htmlentities( $_POST['comment'], ENT_QUOTES, 'utf-8' ))."',now())";
	mysql_query($query);
	echo 'ok';
} if (isset($_POST['comment_id'])) {
	$query = "delete from tbl_comment where comment_id = " . $_POST['comment_id'];
	mysql_query($query);
	echo $query;
}
?>