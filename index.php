<?php
session_start();
include "include/db.php";
if (isset($_GET["action"])) {
	if ($_GET["action"] == 'logout') {
		session_destroy();
		header('Location: ' . $siteurl."index.php");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Qodra</title>
<meta name="description" content="Encontre vídeos no Qodra">
<meta name="viewport" content="width=device-width">
<link href="favicon.png" rel="shortcut icon">
<link rel="stylesheet" href="css/reset.css">
<link href='http://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/qodra-icons.css">
<link rel="stylesheet" href="css/main.css">
	<script src="js/login.js"></script>

</head>
<body>
<?php
if (!isset($_SESSION['login_user']) || empty($_SESSION['login_user'])) {
	include "include/home.php";
} else {
	include "include/home.php";
}
?>
</body>
</html>
