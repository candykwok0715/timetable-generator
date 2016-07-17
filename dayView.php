<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>dayView</title>
<meta charset="utf-8">
<title>jQuery UI Datepicker - Format date</title>
<?php require_once("nav_bar.php"); ?>
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
				buttonImage: "../lib/image/calendar.gif",
				buttonImageOnly: true
			}
		);
	});
	
	</script>
<style type="text/css">
.table tr:hover td, .table tr:hover th {
	background-color: #f5f5f5;
}
center {
	font-family: Verdana, Geneva, sans-serif;
	font-size: medium;
}
table {
	font-family: Verdana, Geneva, sans-serif;
	font-size: medium;
}
#datepicker {
	font-family: Verdana, Geneva, sans-serif;
	font-size: medium;
}
</style>
</head><body>
<div class="container">
  <?php
$emptyTimes = array();
$emptyTime = array();
require_once('tytt_functions.php');
require_once('Connections/conn.php');


extract($_POST);
$filePath = $_SERVER['PHP_SELF']; 

if(!isset($inputDate))
	$date = date("Y-m-d");
else
	$date = $inputDate;

$form =<<<_EOT

<form action="$filePath" method="post">
<center><input type="hidden" id="datepicker" class="changeWeek" name="inputDate" value="09-07-2012" size="30" onChange="submit()"  id="sumbited" /><br/>$date</center>
</form>
_EOT;

print($form);

$Week_cell =genWeekView_cell($date);
	
echo "<table  class='table table-bordered'><tr>";

echo '<tr>';
	echo '<td>'.'&nbsp;'.'</td>';
			echo '<td>'.$WeekArray[0].'</td>';	
echo '</tr>';

echo '<tr>';
	echo '<td>'.'Time'.'</td>';
	echo '<td>'.$DateHeaderArray[0].'</td>';

echo '</tr>';

$i = 0;
while ($i < 19){
	echo '<tr><td>'.$TabletimeSlots[$i].'</td>';

		$rs = "SELECT * FROM classes,modules WHERE date = '{$Week_cell[0]}' AND tsfrom = '{$timeSlots[$i]}' and module = moduleCode";
				
		$results = mysql_query($rs,$conn) or die(mysql_error());
		$row = mysql_fetch_row($results);
		$num_row = mysql_num_rows($results);
		
					
			if($num_row != 0) {
			global  $emptyTimes;
			echo <<<Content
			<td rowspan="{$row[7]}" bgcolor="$row[2]" >
			<span class="badge badge-important pull-right">x</span>
				$row[15]<br />
				$row[8]<br />
				$row[3]<br />
				
				<a href="#" class="badge badge-info" 
					rel="popover" 
					title="A Title" 
					data-content="And here's some amazing content. It's very engaging. right?">info</a>
					<a data-toggle="modal" href="#myModal" class="badge badge-warning"">edit</a>
					<a data-toggle="modal" href="#myModal" class="badge badge-success">chat</a>
			</td>		
Content;
				foreach(emptyPeriod($timeSlots[$i+1],$row[6]) as $key => $value){
					
					/*
					if(empty($emptyTime)){
						unset($emptyTimes[$Week_cell[0]]);
					}
					*/
					$emptyTimes[$Week_cell[0]][] = $value;
					$emptyTime = $emptyTimes[$Week_cell[0]];
				}
				unset($emptyTimes[$Week_cell[0]]);
			}
			
			
			else if( strcmp ( $timeSlots[$i] ,array_shift($emptyTime))!=0){
					echo <<<temp
				<td>+</td>
temp;
				}
				
				/*
			print "emptyTimes :";
			print_r($emptyTimes);
			print "<br />";
			print "emptyTime :";
			print_r($emptyTime);
			print "<br />";
			*/
				
	$i += 1;
	echo '</tr>';
}

?>
</div>
</body>
</html>