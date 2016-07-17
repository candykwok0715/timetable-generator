<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
# FileName="connect.php"
$hostname = "localhost";
$database = "timetable";
$username = "root";
$password = "";

$conn = mysql_connect($hostname, $username, $password)
or die('Could not connect: ' . mysql_error());
//select database
mysql_select_db($database, $conn);

?>