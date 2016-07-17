<?php
	require_once("Connections/conn.php");
	extract($_POST);
	
	$update = "UPDATE `administrators` SET `adminPw`= '%s'";
	$update = sprintf($update,md5($_POST['password']));
	
	$update = mysql_query($update, $conn) or die(mysql_error());
	
?>