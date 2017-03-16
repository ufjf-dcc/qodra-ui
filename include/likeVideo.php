<?php 
include "db.php";
session_start();
if ($_POST['action'] == 'like') {
mysql_query("insert into tbl_likes (id_user,id_video) values('".$_SESSION['user_id']."','".$_POST['video']."')",$conn);
} else if ($_POST['action'] == 'unlike') {
mysql_query("delete from tbl_likes where id_user = ".$_SESSION['user_id']." and id_video = ".$_POST['video'],$conn);
}
?>