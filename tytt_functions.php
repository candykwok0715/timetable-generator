<?php

//Set TimeSolts Array;
require_once("Connections/conn.php");

$sql = "select * from timeslots";
$results = mysql_query($sql,$conn) or die(mysql_error());
$startPoint = mysql_fetch_assoc($results);
$numResults = mysql_num_rows($results);



	$start = DateTime::createFromFormat("H:i:s",$startPoint['startTime']);
	$interval = new DateInterval("PT30M"); 
	$occurrences = $numResults;
	$period = new DatePeriod($start,$interval,$occurrences);
	foreach($period as $dt){
	$timeSlots[] = $dt->format("H:i:s");
	$TabletimeSlots[] = $dt->format("h:i a");
	}
	 
	
	

$DateHeaderArray;
$WeekArray;
//Create Week Array for get Cell;
function genWeekView_cell($startDate)
{
	global $DateHeaderArray,$WeekArray;
	$start = DateTime::createFromFormat("Y-m-d",$startDate);
	$interval = new DateInterval("P1D"); 
	$occurrences = 4;
	$period2 = new DatePeriod($start,$interval,$occurrences);
	
	foreach($period2 as $dt)
	{
		$dateArray[] = $dt->format('Y-m-d');
		$WeekArray[] = $dt->format('D');
		$DateHeaderArray[] = $dt->format('d/m');
	}
	
	return $dateArray;
}

//Create Week Array for table Header

//Create empty cell
function emptyPeriod($start_time,$end_time)
{
	$emptyCell = array();
	$start = DateTime::createFromFormat("H:i:s",$start_time);
	$end = DateTime::createFromFormat("H:i:s",$end_time);
	$interval = new DateInterval("PT30M"); 
	$period = new DatePeriod($start,$interval,$end);
	foreach($period as $dt){
		$emptyCell[] = $dt->format("H:i:s");
	}
	
	return $emptyCell;
}



// for insert Class function 
// for user to user repeat type: daily,weekly,monthly,year
function repeat($date,$format,$occurrences){

$start = DateTime::createFromFormat("Y-m-d","$date");
$interval = new DateInterval($format); 
$period = new DatePeriod($start,$interval,"$occurrences");
foreach($period as $dt){
	$repeatDate[] = $dt->format("Y-m-d");
}

return $repeatDate;
}


function convert($input){
	$pieces = explode(":", $input);
	$H2M = $pieces[0]*60;
	$SM = $H2M + $pieces[1];
	return $SM;	
}


?>