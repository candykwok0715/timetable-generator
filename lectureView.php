<?php
require_once('Connections/conn.php');
require_once("nav_bar.php");
//===========lecturers recored set====================
 $query_rs_l = "SELECT * FROM lecturers ";
  $rs_l = mysql_query($query_rs_l, $conn) or die(mysql_error());
  $row_rs_l = mysql_fetch_assoc($rs_l);
  $totalRows_rs_l = mysql_num_rows($rs_l);
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WeekView</title>
<meta charset="utf-8">
	<title>jQuery UI Datepicker - Format date</title>
   
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
		titlePosition: 'outside'
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
	 
	 .table tr:hover td,
.table tr:hover th {
  background-color: #f5f5f5;
}

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

extract($_POST);
$filePath = $_SERVER['PHP_SELF']; 

//===========turn off auto current day

if(!isset($inputDate))
	$date = date("Y-m-d");
else
	$date = $inputDate;

echo <<<_EOT
<form action="$filePath" method="post">
<center>
_EOT;

echo <<<_EOT1
<select name="lecturerName">
_EOT1;

      do { 
	 	echo <<<_EOT2
      <option value='{$row_rs_l['lecturerName']}'>{$row_rs_l['lecturerName']}</option>
_EOT2;
      }while ($row_rs_l = mysql_fetch_assoc($rs_l));
echo "</select>";
    
echo <<<_EOT2
<input type="hidden" id="datepicker" class="changeWeek" name="inputDate" value="$date" /><br/>
<input type="submit" value="search">
</center>
</form>
</ceneter>
_EOT2;

if(isset($lecturerName)){
	$Lname = $lecturerName;
}
else {
	$Lname = 'Wynn lee';
}


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


//print_r($_POST);

foreach($TabletimeSlots as $value){

	
	echo '<tr><td>'.$value.'</td>';

	$k=0;
	
	while($k < 5)
	{	
		$rs = "SELECT * FROM classes,modules WHERE date = '{$Week_cell[$k]}' AND tsfrom = '{$timeSlots[$i]}' and module = moduleCode and taughtBy = '$Lname' ";
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
		
			
			
			global  $emptyTimes;
			echo <<<Content
			<td rowspan="$row[periodSpan]" bgcolor="$row[Color]" >
			
			<form>	
				Not Available		
			</td>
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
				echo <<<temp

			<td>&nbsp;</td>
temp;

			
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