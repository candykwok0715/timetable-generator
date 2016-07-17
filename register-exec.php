<?php
	//Start session
	session_start();
	
	//Include database connection details
	require_once('Connections/conn.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	print_r($_POST);
	print_r($_FILES);
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$studentID = clean($_POST['studentID']);
	$password = clean($_POST['password']);
	$name = clean($_POST['name']);
	$nickName = clean($_POST['nickName']);	
	$type = clean($_POST['type']);
	$course = clean($_POST['course']);
	$year = clean($_POST['year']);
			
	//Check for duplicate login ID
	if($studentID != '') {
		$qry = "SELECT * FROM students WHERE studentID='$studentID'";
		$result = mysql_query($qry);
		if($result) {
			if(mysql_num_rows($result) > 0) {
				$errmsg_arr[] = 'Login ID already in use';
				$errflag = true;
				
			}
			@mysql_free_result($result);
		}
		else {
			die("Query failed");
		}
	}
	
		# trim delete all space from string
     $photo = trim( $_FILES['photo']['name'] );
	 echo $photo;
	 
	echo ($_FILES ['photo']['tmp_name']);
	
    $image_folder = "images/";
    if (strlen($photo) > 0) {
		// copy temp file (tmp_name) to the image folder
		// to be completed
		copy($_FILES ['photo']['tmp_name'], $image_folder.$photo);
	}
	
	//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: register-form.php");
		exit();
	}
	
	//Create INSERT query
	$qry = "INSERT INTO `students`(`studentID`, `photo`, `password`, `name`, `nickName`, `type`, `course`, `year`, `status`) VALUES('$studentID','$photo','".md5($_POST['password'])."','$name','$nickName','$type','$course','$year','pending')";
	$result = @mysql_query($qry);
	print $qry;
	//Check whether the query was successful or not
	if($result) {
		header("location: register-success.php");
		exit();
	}else {
		die("Query failed");
	}
?>