<?php require_once("nav_bar.php") ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link rel="stylesheet" type="text/css" href="lib/chatroomstyles.css"/>

</head>

<body>
<?php
require_once('Connections/conn.php');
extract($_POST);

if(strlen($classid)>0){
	require_once("Connections/conn.php");
	$sql = "DELETE FROM `classes` WHERE `classID` = '%s'";
	$sql = sprintf($sql,$classid);
	@mysql_query($sql) or die(mysql_error());
	header("location: weekView.php");
}
else {
	$pieces = explode("+", $chat);
	//print_r($pieces);
	
	if( count($pieces)==8){
		$_SESSION['moduleName'] = $pieces[0];
		$_SESSION['moduleCode'] = $pieces[1];
		$_SESSION['date'] = $pieces[2];
		$_SESSION['Starttime'] = $pieces[3];
		$_SESSION['Endtime'] = $pieces[4];
		$_SESSION['course'] = $pieces[5];
		$_SESSION['year'] = $pieces[6];
		$_SESSION['name']  = $pieces[7];
	}
	
	echo '<br />';
	//print_r($_SESSION);
	
	$query_rs_m = "SELECT * FROM chatroom natural join students WHERE date = '{$_SESSION['date']}' and moduleCode like '{$_SESSION['moduleCode']}' and course like '{$_SESSION['course']}' and year= '{$_SESSION['year']}' and TIME = '{$_SESSION['Starttime']}' order by dt DESC";
	//print $query_rs_m;
	$rs_m = mysql_query($query_rs_m, $conn) or die(mysql_error());
	//print $rs_m;
	$row_rs_m = mysql_fetch_assoc($rs_m);
	//print_r ($row_rs_m);
	$totalRows_rs_m = mysql_num_rows($rs_m);
	//print $totalRows_rs_m ;
	
	echo <<<EOT
	<div class="container">
	<div class="page-header">
	<h1> {$_SESSION['moduleName']}<small> {$_SESSION['moduleCode']}</small> <br/>
					<small>
						Date: {$_SESSION['date']} Time: {$_SESSION['Starttime']} - {$_SESSION['Endtime']} Course: {$_SESSION['course']} Year: {$_SESSION['year']}
					</small>
				</h1>
			<h2><a href="weekView.php">Return to weekView</a></h2>
	</div>
	
EOT;

	//===========Modules recored set====================
	
	
	if( $totalRows_rs_m !=0 ){
		do{ 
	echo <<<Content
		
		<div class="comment">
				<div class="avatar">
					<img src="images/{$row_rs_m['photo'] }" width="50" height="50"  />
				</div>
				<left>
				<div class="name">{$row_rs_m['name']}</div>
				<div class="date" >{$row_rs_m['dt']}</div>
				<p>{$row_rs_m['body']}</p>
				
		</div>
		
		
Content;
      } while ($row_rs_m = mysql_fetch_assoc($rs_m));
	  mysql_free_result($rs_m);
	 
	}
	
	
	                                                                               
	
	$filePath = $_SERVER['PHP_SELF']; 
	
	$nameStr = $_SESSION['name'];
	
	echo <<<_EOT2
	
	
	<div id="addCommentContainer">

	<p>Add a Comment</p>

	<form id="$filePath" method="post" action="">
    	<div>
			<input type="hidden" name="date" value={$_SESSION['date']}>
			<input type="hidden" name="time" value={$_SESSION['Starttime']}>
			<input type="hidden" name="moduleCode" value={$_SESSION['moduleCode']}>
			<input type="hidden" name="course" value={$_SESSION['course']}>
			<input type="hidden" name="year" value={$_SESSION['year']}>
			<input type="hidden" name="name" value='$nameStr'>
			
            <label for="body">Comment Body</label>
            <textarea name="body" id="body" cols="20" rows="5"></textarea>
			<input type="reset"  class="btn " value="clean" />	
			<input type="submit"  name = "submit" id="submit" value="Add" />
        </div>
    </form>
</div>

<!--
		<div class="comment" id="addCommentContainer">
		<form action="$filePath" method="post">
			
			<input type="hidden" name="date" value={$_SESSION['date']}>
			<input type="hidden" name="time" value={$_SESSION['Starttime']}>
			<input type="hidden" name="moduleCode" value={$_SESSION['moduleCode']}>
			<input type="hidden" name="course" value={$_SESSION['course']}>
			<input type="hidden" name="year" value={$_SESSION['year']}>
			<input type="hidden" name="name" value='$nameStr'>
		
			
			Comment Body: <br />
			<textarea name="body" id="body" cols="20" rows="5"></textarea>
		</div>
		<div class="modal-footer">		
			<input type="reset"  class="btn " value="clean" />	
			<input type="submit"  name = "submit" id="submit" value="Add" />
		</div>
		</form>
		</div>
		</div> 
-->
_EOT2;


if(isset($submit)){
	//print $name;
	require_once('Connections/conn.php');
	 $sql = "INSERT INTO `chatroom`(`date`, `time`, `moduleCode`, `course`, `year`, `name`, `body`) VALUES('%s','%s','%s','%s','%s','%s','%s')";
 	$sql = sprintf($sql,$date,$time,$moduleCode,$course,$year,$name,$body);
 	@mysql_query($sql) or die(mysql_error());
	header("location: deleteclass.php");
}
 
}

?>

</body>
</html>
