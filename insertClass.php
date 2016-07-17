<?php require_once("auth.php"); ?>

<!--Record Set start up -->
<?php
require_once("tytt_functions.php");
$conn = mysql_connect("localhost","root","");
mysql_select_db("timetable",$conn);

//===========Modules recored set====================
 $query_rs_m = "SELECT * FROM modules ";
  $rs_m = mysql_query($query_rs_m, $conn) or die(mysql_error());
  $row_rs_m = mysql_fetch_assoc($rs_m);
  $totalRows_rs_m = mysql_num_rows($rs_m);
  
//===========lecturers recored set====================
 $query_rs_l = "SELECT * FROM lecturers ";
  $rs_l = mysql_query($query_rs_l, $conn) or die(mysql_error());
  $row_rs_l = mysql_fetch_assoc($rs_l);
  $totalRows_rs_l = mysql_num_rows($rs_l);
  
//===========Timeslots start recored set====================
 $query_rs_ts = "SELECT * FROM timeslots ";
  $rs_ts = mysql_query($query_rs_ts, $conn) or die(mysql_error());
  $row_rs_ts = mysql_fetch_assoc($rs_ts);
  $totalRows_rs_ts = mysql_num_rows($rs_ts);
  
//===========Timeslots end recored set====================
 $query_rs_te = "SELECT * FROM timeslots ";
  $rs_te = mysql_query($query_rs_te, $conn) or die(mysql_error());
  $row_rs_te = mysql_fetch_assoc($rs_te);
  $totalRows_rs_te = mysql_num_rows($rs_te);
  
 //===========Rooms recored set====================
 $query_rs_r = "SELECT * FROM rooms ";
  $rs_r = mysql_query($query_rs_r, $conn) or die(mysql_error());
  $row_rs_r = mysql_fetch_assoc($rs_r);
  $totalRows_rs_r = mysql_num_rows($rs_r);
  
  
 //===========Courses recored set====================
 $query_rs_c = "SELECT * FROM courses ";
  $rs_c = mysql_query($query_rs_c, $conn) or die(mysql_error());
  $row_rs_c = mysql_fetch_assoc($rs_c);
  $totalRows_rs_c = mysql_num_rows($rs_c);
  
  //===========Students recored set====================
 $query_rs_s = "SELECT * FROM students ";
  $rs_s = mysql_query($query_rs_s, $conn) or die(mysql_error());
  $row_rs_s = mysql_fetch_assoc($rs_s);
  $totalRows_rs_s = mysql_num_rows($rs_s);
  
  
?>

 
<!--CSS and Javascript that spry require-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insert Class</title>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>

<script src="lib/bootstrap/js/jquery.js"></script>

<script src="lib/jquery-ui-1.8.21.custom/development-bundle/ui/jquery.ui.core.js"></script>
<script src="lib/jquery-ui-1.8.21.custom/development-bundle/ui/jquery.ui.widget.js"></script>
<script src="lib/jquery-ui-1.8.21.custom/development-bundle/ui/jquery.ui.datepicker.js"></script>
<script src="SpryAssets/SpryValidationRadio.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="lib/jquery-ui-1.8.21.custom/development-bundle/themes/base/jquery.ui.all.css">
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="lib/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

<script>
	$(function()
	 { 
	 	$( "#datepicker" ).datepicker
		(  
			{ 
				showWeek: true,
				dateFormat: 'yy-mm-dd',
				gotoCurrent: true,
				numberOfMonths: 1,
				showButtonPanel: true,
				showOn: "button",
				buttonImage: "lib/image/calendar.gif",
				buttonImageOnly: true
			}
		);
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
</style>
    <link href="SpryAssets/SpryValidationRadio.css" rel="stylesheet" type="text/css" />
</head>

<div class="modal-header ">
<h1>Create new classes</h1>
</div>


<!--=============Excutre Insert===============-->
<?php

extract($_POST);

//print $date." ".$repeat." ".$Repeattime;

	
if(isset($submit)){
	$insertDateArray[] = array();
	$periodSpan = (convert($tsEnd)-convert($tsFrom))/30;

	if(strlen($repeat)>2){
	$dateArray = repeat($date,$repeat,$Repeattime);
	
	foreach($dateArray as $value){
		
		$check = "SELECT * FROM `calendar` WHERE `calendarDate`= ('%s')";
		$check = sprintf($check,$value);
		$dateResult = @mysql_query($check) or die(mysql_error());
		$num_rows = mysql_num_rows($dateResult);
	
		$sqlDate ="INSERT INTO `calendar`(`calendarDate`) VALUES ('%s')";
		$sqlDate = sprintf($sqlDate,$value);
		$insertDateArray[] = $sqlDate;
	}
	
	foreach($insertDateArray as $value){
	@mysql_query($value);
}

if(count($dateArray)!=0){
	foreach($dateArray as $value){
		$sql = "insert into classes (`module`, `Color`, `taughtBy`, `date`, `tsFrom`, `tsEnd`, `periodSpan`, `roomNo`, `course`, `year`, `type`, `remark`, `createdBy`) VALUES ('%s','%s','%s','%s','%s','%s',%d,'%s','%s',%d,'%s','%s','%s')";
    $sql = sprintf($sql,$module,$color,$taughtBy,$value,$tsFrom,$tsEnd,$periodSpan,$roomNo,$course,$year,$type,$remark,$createdBy);
	
		$insertClassesArray[] = $sql;
	}
		
}

foreach($insertClassesArray as $value){
	$ok =(@mysql_query($value) or die(mysql_error()));
}


if ($ok){
	
 echo <<<alert
 <div class="alert alert-success">
            <strong>Successful!</strong>The insertion was a success! Please, Close this box and refresh weekView.php page
          </div>
alert;
} 

}

else{
	$check = "SELECT * FROM `calendar` WHERE `calendarDate`= ('%s')";
	$check = sprintf($check,$date);
	$dateResult = @mysql_query($check) or die(mysql_error());
	$num_rows = mysql_num_rows($dateResult);
	
	if($num_rows == 0){
		$sqlDate ="INSERT INTO `calendar`(`calendarDate`) VALUES ('%s')";
	$sqlDate = sprintf($sqlDate,$date);
	@mysql_query($sqlDate) or die(mysql_error());
	}

	$sql = "insert into classes (`module`, `Color`, `taughtBy`, `date`, `tsFrom`, `tsEnd`, `periodSpan`, `roomNo`, `course`, `year`, `type`, `remark`, `createdBy`) VALUES ('%s','%s','%s','%s','%s','%s',%d,'%s','%s',%d,'%s','%s','%s')";
    $sql = sprintf($sql,$module,$color,$taughtBy,$date,$tsFrom,$tsEnd,$periodSpan,$roomNo,$course,$year,$type,$remark,$createdBy);
		$result = (@mysql_query($sql) or die(mysql_error()));
	
	if ($result){
	
 echo <<<alert
 <div class="alert alert-success">
            <strong>Successful!</strong>The insertion was a success! Please, Close this box and refresh weekView.php page
          </div>
alert;
} 
}
}
?>
<!--insert form-->
<div class="modal-form" class="well">
<form action="insertClass.php" method="post" class="form-horizontal" class="well">
  
  	<table border="0" class="table table-striped">
  <tr>
    <td class="input-block-level">Module:</td>
    <td ><span id="spryselect1">
    <select name="module" id="module">
      <?php do { ?>
      <option value="<?php echo $row_rs_m['moduleCode']; ?>"><?php  echo $row_rs_m['moduleName']; ?>
      </option>
      <?php }while ($row_rs_m = mysql_fetch_assoc($rs_m)); ?>
    </select>
    <span class="selectRequiredMsg">Please select an item.</span></span></td>
  </tr>
  <tr>
    <td>Taught By:</td>
    <td><span id="spryselect2">
      <select name="taughtBy" id="lecturer">
   			 <?php do { ?>
      <option value="<?php echo $row_rs_l['lecturerName']; ?>"><?php  echo $row_rs_l['lecturerName']; ?>
      </option>
      <?php }while ($row_rs_l = mysql_fetch_assoc($rs_l)); ?>
      </select>
      <span class="selectRequiredMsg">Please select an item.</span></span></td>
  </tr>
  <tr>
    <td>Date :</td>
    <td><span id="sprytextfield3">
      <input type="text" id="datepicker" name="date" />
      <span class="textfieldRequiredMsg">A value is required.</span></span>
  </tr>
  <tr>
    <td>Start Time:</td>
    <td><span id="spryselect3">
      <select name="tsFrom" id="tsFrom">
       <?php  do { ?>
      <option value="<?php echo $row_rs_ts['startTime']; ?>"><?php  echo $row_rs_ts['startTime']; ?>
      </option>
      <?php } while ($row_rs_ts = mysql_fetch_assoc($rs_ts)) ;?>
      </select>
      <span class="selectRequiredMsg">Please select an item.</span></span></td>
  </tr>
  
  <tr>
    <td>End Time :</td>
    <td><span id="spryselect4">
  	<label for="End Time"></label>
  	<select name="tsEnd" id="End Time">
    <?php  do { ?>
      <option value="<?php echo $row_rs_te['endTime']; ?>"><?php  echo $row_rs_te['endTime']; ?>
      </option>
      <?php } while ($row_rs_te = mysql_fetch_assoc($rs_te));?>
    </select>
  	<span class="selectRequiredMsg">Please select an item.</span></span>
</td>
  </tr>
  
  <tr>
  	<td>Repeat:</td>
    <td><select name="repeat" size="1">
    	<option value="no">do not repeat</option>
    	<option value="P1D">daily</option>
        <option value="P1W">weekly</option>
        <option value="P1M">monthly</option>
        <option value="P1Y">yearly</option>
    </select></td>
    
  </tr>
  <tr>
  	<td>Repeattime:</td>
    <td><span id="sprytextfield2">
      <label for="Repeattime"></label>
<input type="text" name="Repeattime" id="rep"  value="1"/>
<span class="textfieldRequiredMsg">A value is required.</span>
<span class="textfieldInvalidFormatMsg">Invalid format.</span></span>
  </tr>
  
  <tr>
    <td>Room :</td>
    <td><span id="spryselect5">
      
      <select name="roomNo" id="Room">
      
    <?php  do { ?>
      <option value="<?php echo $row_rs_r['roomNO']; ?>"><?php  echo $row_rs_r['roomNO']; ?>
      </option>
      <?php }while ($row_rs_r = mysql_fetch_assoc($rs_r)); ?>
      </select>
      <span class="selectRequiredMsg">Please select an item.</span></span></td>
  </tr>
  <tr>
    <td>course:</td>
    
    <td><span id="spryselect6">
      <select name="course" id="course">
      
      <?php 
	  
	 	if(isset($_SESSION['SESS_studentID'])){
			echo <<<EOT1
			<option value={$_SESSION['SESS_course']}>{$_SESSION['SESS_course']}</option>
EOT1;
		}
	  
		else 
			do {
				echo <<<EOT1
				<option value={$row_rs_c['courseCode']}>{$row_rs_c['courseCode']}</option>
EOT1;
			}while ($row_rs_c = mysql_fetch_assoc($rs_c));
			
	?>
      </select>
      <span class="selectRequiredMsg">Please select an item.</span></span></td>
  </tr>
  <tr>
    <td>Year :</td>
    <td><span id="sprytextfield1">
      <input type="text" name="year" id="year" value="2012" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
  </tr>
  <tr>
    <td>Type :</td>
    <td><span id="spryselect7">
      <label for="type"></label>
      <select name="type" id="type">
      	<option value="lab">lab</option>
        <option value="lab">lecture</option>
      </select>
      <span class="selectRequiredMsg">Please select an item.</span></span></td>
  </tr>
  <tr>
    <td>Remark :</td>
    <td><textarea name="remark" cols="20" rows="3" value="hi" >hi</textarea></td>
  </tr>
  <tr>

    <td>Created by</td>
    <td> <select name="createdBy" id="createdBy">
     <?php  do { ?>
      <option value="<?php echo $row_rs_s['name']; ?>"><?php  echo $row_rs_s['name']; ?>
      </option>
      <?php } while ($row_rs_s = mysql_fetch_assoc($rs_s)); ?>
      </select></td>
  </tr>
  <tr>
    <td>Color </td>
    <td>
      <div id="spryradio1">
        <!--<table width="200">
          <tr>
            <td><label>
              <input type="radio" name="RadioGroup1" value="radio" id="RadioGroup1_0" />
              Radio</label></td>
          </tr>
        </table>-->
       		  <table>
    <tr>
    		<td><label>
          <input type="radio" name="color" value="#049cdb" id="color" />
          <img src="lib/image/color/049cdb.png"/></label></td>
          <td><label>
          <input type="radio" name="color" value="#46a546" id="color" />
          <img src="lib/image/color/46a546.png" /></label></td>
         
          <td><label>
          <input type="radio" name="color" value="#9d261d" id="color" />
          <img src="lib/image/color/9d261d.png" /></label></td>
    </tr>
    <tr>
   		 <td><label>
          <input type="radio" name="color" value="#ffc40d" id="color" />
          <img src="lib/image/color/ffc40d.png" /></label></td>
          <td><label>
          <input type="radio" name="color" value="#f89406" id="color" />
          <img src="lib/image/color/f89406.png" /></label></td>
          <td><label>
          <input type="radio" name="color" value="#c3325f" id="color" />
          <img src="lib/image/color/c3325f.png" /></label></td>
    </tr>
    <tr>
     		<td><label>
          <input type="radio" name="color" value="#7a43b6" id="color" />
          <img src="lib/image/color/7a43b6.png" /></label></td>
          <td><label>
          <input type="radio" name="color" value="#c09853" id="color" />
          <img src="lib/image/color/c09853.png" /></label></td>
          <td><label>
          <input type="radio" name="color" value="#f3edd2" id="color" />
          <img src="lib/image/color/f3edd2.png" /></label></td>
    </tr>
    <tr>
    		<td><label>
          <input type="radio" name="color" value="#b94a48" id="color" />
          <img src="lib/image/color/b94a48.png" /></label></td>
          <td><label>
          <input type="radio" name="color" value="#f2dede" id="color" />
          <img src="lib/image/color/f2dede.png" /></label></td>
           <td><label>
           <input type="radio" name="color" value="#468847" id="color" />
          <img src="lib/image/color/468847.png" /></label></td>
    </tr>
    <tr>
     		<td><label>
          <input type="radio" name="color" value="#dff0d8" id="color" />
          <img src="lib/image/color/dff0d8.png" /></label></td>
          <td><label>
          <input type="radio" name="color" value="#3a87ad" id="color" />
          <img src="lib/image/color/3a87ad.png" /></label></td>
          <td><label>
          <input type="radio" name="color" value="#d9edf7" id="color" />
          <img src="lib/image/color/d9edf7.png" /></label></td>
    </tr>
    </table>   
        <span class="radioRequiredMsg">Please make a selection.</span></div>
    
   
    </td>
  </tr>
</table>
</div>

<div class="modal-footer">
  		<input class="btn btn-primary" type=submit  name="submit" value="insert" />
</form>
</div>

        
<!-- spry setting and mysql record set free result-->      
<script type="text/javascript">
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3");
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4");
var spryselect5 = new Spry.Widget.ValidationSelect("spryselect5");
var spryselect6 = new Spry.Widget.ValidationSelect("spryselect6");
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var spryselect7 = new Spry.Widget.ValidationSelect("spryselect7");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "integer");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var spryradio1 = new Spry.Widget.ValidationRadio("spryradio1");
</script>
<?php
    mysql_free_result($rs_m);
	mysql_free_result($rs_l);
	mysql_free_result($rs_ts);
	mysql_free_result($rs_te);
	mysql_free_result($rs_r);
	mysql_free_result($rs_c);
	mysql_free_result($rs_s);
  ?>



</html>
    
