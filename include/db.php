<?php
$siteurl = ""; // URL BASE DO SITE
define('DB_SERVER', ''); // CAMINHO DO SERVIDOR MYSQL GERALMENTE LOCALHOST
define('DB_USERNAME', ''); // NOME DO USUARIO DO BD
define('DB_PASSWORD', ''); // SENHA DO USUARIO DO BD
define('DB_DATABASE', ''); // NOME DO BANCO NO MYSQL
define('ALLEGRO_URL', ''); // URL DO ALLEGROGRAPH
//define('ALLEGRO_URL', 'http://200.131.219.214:10035/repositories/qodra');
$conn = mysql_connect("127.0.0.1", DB_USERNAME, DB_PASSWORD);
$selectdb = mysql_select_db(DB_DATABASE, $conn);
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>
