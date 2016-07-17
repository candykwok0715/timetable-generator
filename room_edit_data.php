<?php
	#Include the connect.php file
	include('Connections/conn.php');
	
	#Connect to the database
	//connection String
	$connect = mysql_connect($hostname, $username, $password)
	or die('Could not connect: ' . mysql_error());
	//Select The database
	$bool = mysql_select_db($database, $connect);
	if ($bool === False){
	   print "can't find $database";
	}
	if (isset($_GET['update']))
	{
		// UPDATE COMMAND 
	// UPDATE COMMAND 
		$update_query = "UPDATE rooms SET 
		`type`='".$_GET['type']."',
		`capacity`='".$_GET['capacity']."',
		`remark`='".$_GET['remark']."'
		WHERE `roomNO`='".$_GET['roomNO']."'";
		echo $update_query;
		 $result = mysql_query($update_query) or die("SQL Error 1: " . mysql_error());
		 echo $result;
	}
	
	else if (isset($_GET['insert']))
{
	// INSERT COMMAND 
	$insert_query = "INSERT INTO `rooms`(`roomNO`, `type`, `Capacity`, `remark`) VALUES ('".$_GET['roomNO']."','".$_GET['type']."','".$_GET['Capacity']."','".$_GET['remark']."')";
	
   $result = mysql_query($insert_query) or die("SQL Error 1: " . mysql_error());
   echo $result;
}

else if (isset($_GET['delete']))
{
	// DELETE COMMAND 
	$delete_query = "DELETE FROM `rooms` WHERE `roomNO`='".$_GET['roomNO']."'";	
	$result = mysql_query($delete_query) or die("SQL Error 1: " . mysql_error());
    echo $result;
}
	else
	{
		$pagenum = $_GET['pagenum'];
		$pagesize = $_GET['pagesize'];
		$start = $pagenum * $pagesize;
		$query = "SELECT SQL_CALC_FOUND_ROWS * FROM rooms LIMIT $start, $pagesize";
		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
		$rows = mysql_query($sql);
		$rows = mysql_fetch_assoc($rows);
		$total_rows = $rows['found_rows'];
		
		
		
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		foreach($row as $key => $value){
			$temp[$key] = $value;
		}
			$datarow [] = $temp;
		}
	
      $data[] = array(
       'TotalRows' => $total_rows,
	   'Rows' => $datarow 
	);
	echo json_encode($data);
	}
?>