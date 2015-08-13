<?php
$siteurl = "http://localhost/qodra/";
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'dataqodra');
$conn = mysql_connect("127.0.0.1", DB_USERNAME, DB_PASSWORD);
$selectdb = mysql_select_db(DB_DATABASE, $conn);
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>