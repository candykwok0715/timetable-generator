
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WeekView</title>
<meta charset="utf-8">
	<title>jQuery UI Datepicker - Format date</title>
   <?php require_once("nav_bar.php"); ?>
   
<script type="text/javascript" src="lib/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="lib/fancybox/jquery.fancybox-1.3.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="lib/fancybox/jquery.fancybox-1.3.4.css"/>
<script>

	$(function()
	 { 
	 	$( "#datepicker" ).datepicker
		(  
			{ 
				showWeek: true,
				dateFormat: 'yy-mm-dd',
				gotoCurrent: true,
				numberOfMonths: 2,
				showButtonPanel: true,
				showOn: "button",
				buttonImage: "lib/image/calendar.gif",
				buttonImageOnly: true
			}
		);
	});
	
	$(document).ready(function() {
	$('.iframe').fancybox({
	
		width : '40%',
		height : '90%',
		titlePosition: 'outside',
		'onClosed': function() {
    parent.location.reload(true);
  }
	});

}); // end ready

$(document).ready(function(){


    $(".slidingDiv").hide();
	$(".show_hide").show();
	
	$('.show_hide').click(function(){
	$(".slidingDiv").slideToggle();
	});

});
	</script>
       
     <style type="text/css">
	 
	 center
	{
		font-family:Verdana, Geneva, sans-serif;
		font-size:medium;
	}
	table
	{
		font-family:Verdana, Geneva, sans-serif;
		font-size:medium;
	}
	#datepicker
	{
		font-family:Verdana, Geneva, sans-serif;
		font-size:medium;
	}
	
	#prettybutton {
		text-indent:-9999px;
}


</style>
</head>

<body>
<div class="container">
<?php
$emptyTimes = array();
require_once('tytt_functions.php');
require_once('Connections/conn.php');

extract($_POST);
$filePath = $_SERVER['PHP_SELF']; 

//===========turn off auto current day

if(!isset($inputDate))
	$date = date("Y-m-d");
else
	$date = $inputDate;

$form =<<<_EOT

<form action="$filePath" method="post">

<center>
<input type="hidden" id="datepicker" class="changeWeek" name="inputDate" value="$date" onChange="submit()"  id="sumbited" /><br/>$date</center>
</form>
_EOT;

print($form);

$Week_cell =genWeekView_cell($date);

echo "<table  class='table table-bordered'><tr>";

echo '<tr>';
	echo '<td>'.'&nbsp;'.'</td>';
	
	foreach($WeekArray as $value){
		echo '<td>'.$value.'</td>';
	}
	
echo '</tr>';

echo '<tr>';
	echo '<td>'.'Time'.'</td>';
	
	foreach($DateHeaderArray as $value){
		echo '<td>'.$value.'</td>';
	}
	
echo '</tr>';

$i = 0;



foreach($TabletimeSlots as $value){
	
	echo '<tr><td>'.$value.'</td>';

	$k=0;
	
	
	while($k < 5)
	{	
	
		if(isset($_SESSION['SESS_studentID']) && ($_SESSION['SESS_type']=="normal")){
			$rs = "SELECT * FROM classes,modules 
		WHERE date = '{$Week_cell[$k]}' AND tsfrom = '{$timeSlots[$i]}' and module = moduleCode 
		and `course` = '{$_SESSION['SESS_course']}' and  `year` = '{$_SESSION['SESS_year']}'";
		}
		else 
			$rs = "SELECT * FROM classes,modules 
		WHERE date = '{$Week_cell[$k]}' AND tsfrom = '{$timeSlots[$i]}' and module = moduleCode";
			
		
		//echo $rs;
		//echo '<br />';
		$results = mysql_query($rs,$conn) or die(mysql_error());
		$row = mysql_fetch_assoc($results);
		$num_row = mysql_num_rows($results);
		//echo $num_row;
		//echo '<br />';
	
		
		if($num_row !=0)
		{
			//print_r ($row);
			// value will pass to chatRoom
			if(isset($_SESSION['SESS_name'])){
				$name = $_SESSION['SESS_name'];
			}
			
			
			echo <<<Content2
			<td rowspan="$row[periodSpan]" bgcolor="$row[Color]" >
			
Content2;
			
			if( (isset($_SESSION['SESS_admin'])) || ($_SESSION['SESS_type']=="class representative")){
				echo <<<Content3
				<form action="deleteclass.php"method="post">
				<input type="submit" class="badge badge-important pull-right" name="classid" value="$row[classID]" id="prettybutton"/>
			<form>
Content3;
				
			}
			
			if(isset($_SESSION['SESS_name'])){
				echo<<<ChatRoom
			<!--pass value button-->
			<form action="deleteclass.php" method="post">
				<input type="submit" class="badge badge-success pull-right" name="chat" value="$row[moduleName]+$row[module]+$row[date]+$row[tsFrom]+$row[tsEnd]+$row[course]+$row[year]+$name" id="prettybutton"/>
			<form>
ChatRoom;
			}
			
			global  $emptyTimes;
			echo <<<Content
		
		
		
		<a href="#" class="show_hide" style="color:black">$row[moduleName] <br/ >$row[roomNo] <br />
				$row[taughtBy]</a><br/>
		<div class="slidingDiv">
		course: $row[course] <br/>
		year: $row[year] <br/>
		type: $row[type] <br/>
		remark: $row[remark] <br/>
		created By $row[createdBy] <br/>
</div>
</div>
Content;
			
			// combine date and time to be compose primary key
			// to decide which timeslot should be ignore(not print cell for row span)
			
			foreach(emptyPeriod($timeSlots[$i+1],$row['tsEnd']) as $value)
			{
				$str = $Week_cell[$k]."+".$value;
				$emptyTimes[] = $str;
			}	
		}
		
		
		else if($num_row == 0){
			$str = $Week_cell[$k]."+".$timeSlots[$i];	
			if(in_array($str,$emptyTimes)){
				$founded = array_search("$str",$emptyTimes);
				unset($emptyTimes[$founded]);
			}
			else {
				
			if( (isset($_SESSION['SESS_admin'])) || ($_SESSION['SESS_type']=="class representative") ){
				echo <<<temp
			<td><a  href="insertClass.php"  class="iframe" style="color:gray" class="pull-right">+</a></td>
temp;
			}
			else
				echo <<<temp2
				<td>&nbsp;</td>
				
temp2;
			}
				
		}
		
			$k +=1;	
			
		}
		
	$i += 1;
	echo '</tr>';

	
}

	
?>
</div>



			
</body>
</html>