<?php 
include "db.php";
$pasta = "C:/xampp/htdocs/qodra/images/photos/";
session_start();
if ($_SESSION['user_photo'] != 'default.png') unlink($pasta.$_SESSION['user_photo']);
$sql = mysql_query("update tbl_usuarios set user_photo = 'default.png' where user_id = '".$_POST['id']."'"); 
$_SESSION['user_photo'] = 'default.png';
header('Location: ' . $siteurl . 'editar-conta.php');
die(); 
?>