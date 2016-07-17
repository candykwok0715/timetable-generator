<?php
	//Start session
	session_start();
	//print_r($_POST);
	
	//Include database connection details
	require_once('Connections/conn.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	
	//Select database
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$login = clean($_POST['login']);
	$password = clean($_POST['password']);
	
	//Input Validations
	
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: login-form.php");
		exit();
	}
	
	//Create query
	$nqry="SELECT * FROM students WHERE studentID=$login AND password= '".md5($_POST['password'])."' AND
	status='verified'";
	
	//print $nqry;
	$nresult=mysql_query($nqry) or (mysql_error());
	//$num = mysql_num_rows($result)
	//Check whether the query was successful or not
	if($nresult) {
		if(mysql_num_rows($nresult) == 1) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($nresult);
			$_SESSION['SESS_studentID'] = $member['studentID'];
			$_SESSION['SESS_type'] = $member['type'];
			$_SESSION['SESS_name'] = $member['name'];
			$_SESSION['SESS_name'] = $member['name'];
			$_SESSION['SESS_course'] = $member['course'];
			$_SESSION['SESS_year'] = $member['year'];

						
			session_write_close();
			header("location:  nav_bar.php");
			
			exit();
		}
	}
	
	else if(!$nresult){
		header("location: login-failed.php");
			exit();
	}
	
	$aqry="SELECT * FROM administrators WHERE adminID='$login' AND adminPw= '".md5($_POST['password'])."'";
	print $aqry;
	$aresult=mysql_query($aqry)or (mysql_error());
	//$num = mysql_num_rows($result)
	//Check whether the query was successful or not
	if($aresult) {
		if(mysql_num_rows($aresult) == 1) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($aresult);
			$_SESSION['SESS_admin'] = $member['adminID'];

			session_write_close();
			header("location: nav_bar.php");
			
			exit();
		}else {
			//Login failed
			header("location: login-failed.php");
			exit();
		}
		
	}
	
	
	
	/**
	else {
		die("Query failed");
	}
	**/
?>