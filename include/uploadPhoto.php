<?php 
include "db.php";
$pasta = "C:/xampp/htdocs/qodra/images/photos/";
$permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp"); 
if(isset($_POST) || $_FILES['imagem']['name'] == NULL){ 
	$nome_imagem = $_FILES['imagem']['name']; 
	$tamanho_imagem = $_FILES['imagem']['size'];
	$tamanho = round($tamanho_imagem / 1024);
	$ext = strtolower(strrchr($nome_imagem,"."));
	if(in_array($ext,$permitidos)){
		if($tamanho < 1024){
			$nome_atual = md5(uniqid(time())).$ext;
			$tmp = $_FILES['imagem']['tmp_name'];
			if(move_uploaded_file($tmp,$pasta.$nome_atual)){ 
				$sql = mysql_query("update tbl_usuarios set user_photo = '".$nome_atual."' where user_id = '".$_POST['id']."'"); 
				session_start(); 
				if ($_SESSION['user_photo'] != 'default.png') unlink($pasta.$_SESSION['user_photo']);
				$_SESSION['user_photo'] = $nome_atual;
				echo "<script>window.location.replace(\"".$siteurl."editar-conta.php\");</script>";
				die();
			} else { 
				echo "<script>window.location.replace(\"".$siteurl."editar-conta.php?error=error\");</script>";
				die();
			} 
		} else {
			unlink($_FILES['imagem']['tmp_name']);
			echo "<script>window.location.replace(\"".$siteurl."editar-conta.php?error=size\");</script>";
			die();
		} 
	} else {
		echo "<script>window.location.replace(\"".$siteurl."editar-conta.php?error=type\");</script>";
		die();
	} 
} else {
	exit; 
} 
?>