<?php
include("db.php");
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
$username=mysqli_real_escape_string($db,$_POST['username']); 
$password=md5(mysqli_real_escape_string($db,$_POST['password']));
$result=mysqli_query($db,"SELECT * FROM tbl_usuarios WHERE user_name='$username' and user_password='$password'");
$count=mysqli_num_rows($result);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
if($count==1)
{
$_SESSION['login_user']=$row['user_id'];
$_SESSION['user_id']=$row['user_id'];
$_SESSION['user_login']=$row['user_name'];
$_SESSION['user_name']=$row['user_info'];
$_SESSION['user_surname']=$row['user_sur'];
$_SESSION['user_photo']=$row['user_photo'];
$_SESSION['user_email']=$row['user_email'];
$_SESSION['login_status']=1;
echo $row['user_id'];
}
}
?>