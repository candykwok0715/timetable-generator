<?php  

//Start session
	session_start();
	
	//print $_SESSION['SESS_studentID'];
	//print $_SESSION['SESS_admin'];
	$count=0;
	
	if(!isset($_SESSION['SESS_studentID']) || (trim($_SESSION['SESS_studentID']) == '')) {
		global $count;
		$count++;		
	}
	
		
	if(!isset($_SESSION['SESS_admin']) || (trim($_SESSION['SESS_admin']) == '') ) {
		global $count;
		$count++;
	}
	
	
	if($count==2){
		header("location: access-denied.php");
		exit();
	}
	
	
?>