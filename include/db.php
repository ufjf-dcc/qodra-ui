<?php
$siteurl = "http://localhost/qodra-ui/";
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'abc123');
define('DB_DATABASE', 'dataqodra');
define('ALLEGRO_URL', 'http://localhost:10035/repositories/qodra_teste');
//define('ALLEGRO_URL', 'http://200.131.219.214:10035/repositories/qodra');
$conn = mysql_connect("127.0.0.1", DB_USERNAME, DB_PASSWORD);
$selectdb = mysql_select_db(DB_DATABASE, $conn);
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>
