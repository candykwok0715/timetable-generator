<?php require_once('Connections/conn.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
	<?php
		function doDelete() {
			global $conn;
			//extract($_POST);
			echo $table = $_POST['table'];
			if(!isset($_POST['cb'])){
				echo 'Record is delected.';
			}else{
				$query_string = '';
				$countError = 0;
				if(isset($_POST['pk'])){
					$pk = $_POST['pk'];
					$cb = $_POST['cb'];
					foreach($cb as $key => $value){
						$query_rs = "DELETE FROM $table WHERE $pk = '$value'";
						echo 'Will execute : '.$query_rs.'<br/><br/>';
						mysql_query($query_rs, $conn);
						if(mysql_error()) {
							if($countError == 0) {
								$query_string .= sprintf("&msg=%s", urlencode("Cannot delect $pk $value. Please check before delete.<br/>".mysql_error()));
							}else {
								$query_string .= sprintf("<br/><br/>%s", urlencode("Cannot delect $pk $value. Please check before delete.<br/>".mysql_error()));
							}
							$countError++;
						}
					}
				}else if(isset($_POST['pka'])){
					$pk[] = $_POST['pka'][0];
					$pk[] = $_POST['pka'][1];
					$cb = $_POST['cb'];
					foreach($cb as $key => $value){
						$condition = explode(',', $value);
						$query_rs = "DELETE FROM $table WHERE ";
						$query_rs .= "$pk[0] = '$condition[0]' AND $pk[1] = '$condition[1]'";
						echo 'Will execute : '.$query_rs.'<br/><br/>';
						mysql_query($query_rs, $conn);
						if(mysql_error()) {
							if($countError == 0) {
								$query_string .= sprintf("&msg=%s", urlencode("Cannot delect $pk[0] $value[0] and $pk[1] $value[1]. Please check before delete.<br/>".mysql_error().'<br/>'.$query_rs));
							}else {
								$query_string .= sprintf("<br/><br/>%s", urlencode("Cannot delect $pk[0] $value[0] and $pk[1] $value[1]. Please check before delete.<br/>".mysql_error().'<br/>'.$query_rs));
							}
							$countError++;
						}
					}
				}
				$countDel = count($cb) - $countError;
				if($countError == 0) {
					$query_string .= sprintf("&msg=%s", urlencode("$countDel row(s) deleted"));
				}else {
					$query_string .= sprintf("<br/><br/>%s", urlencode("$countDel row(s) deleted"));
				}
			}
			mysql_close($conn);
			header("location:CRUD.php?table=$table$query_string");
			
	/*
		$query_rs = "select custID from customers where custID = '$custID'";
			if(!$rs = mysql_query($query_rs, $conn)){
				die('query error: '.mysql_error());	
			}
			$query_rs = "DELETE FROM customers WHERE custID = '$custID'";
			if($row = mysql_num_rows($rs) > 0){
				echo 'Will execute : '.$query_rs.'<br/><br/>';
				for($i = 0; $i < count($row); $i++){
					mysql_query($query_rs, $conn);
				}
				echo "$row record is deleted";
			}else{
				echo 'Record is not found';
			}
			mysql_close($conn);
			header("location:delByLink.php");
	*/
		}
	
		function doUpdate() {
			global $conn;
			// header("location: updateByLink.php");
			extract($_POST);
			
			// Method 1
			/*
			$sql = "UPDATE customers SET  custName='$custName', custPswd='$custPswd' , custGender='$custGender' where custID = '$custID' ";
			*/
			/* to be completed --- setup $sql */
			
			
			// Method 2 : useful for record with many fields, however form control name must be same as field name
			
				$sql = "UPDATE $table SET ";
				//print $sql;
				$setCols = "";
				foreach ($_POST as $index => $value) {
					if($index != 'fk' && $index != 'fka' && $index != 'table' && $index != 'action'){
						if ($setCols != ""){ 
							$setCols .= ", ";
						}
						if(strlen($value) != 0){
							$setCols .= "$index = '$value'";
						}else{
							$setCols .= "$index = null";
						}
						//print $setCols;
						//print '<br />';
					}else if($index == 'fk') {
						$condition = "WHERE $fk = '$_POST[$fk]'";	
					}else if($index == 'fka') {
						$fka0 = $_POST[$fka[0]];
						$fka1 = $_POST[$fka[1]];
						$condition = "WHERE $fka[0] = '$fka0' AND $fka[1] = '$fka1'";
					}
				}
				
				$sql = "UPDATE $table SET $setCols $condition";
				//print $sql.'<br/>';
			
				echo "Will execute: $sql<br/><br/>";
				@mysql_query($sql, $conn);
				if(mysql_error()){
					$query_string .= sprintf("&msg=%s", urlencode("Cannot update.<br/><br/>".mysql_error()."<br/><br/>".$sql));
				}else{
					$query_string .= sprintf("&msg=%s", urlencode("One row updated:<br/><br/>$sql"));		
				}
				header("location:CRUD.php?table=$table$query_string");
		}
		
		function doCreate() {
			global $conn;
			extract($_POST);
			$sql = "insert into $table values (";
			$sql_type = "show fields from $table";
			$result = mysql_query($sql_type, $conn);
			foreach($_POST as $key => $value){
				if($key != 'table' && $key != 'action'){
					$row = mysql_fetch_assoc($result);
					if(preg_match('/int/', $row['Type'])) {
						$sql .= "$value,";
					}else {
						$sql .= "'$value',";
					}
				} 
			}
			
			$sql = rtrim($sql, ",");
			echo $sql .= ")";
			echo '<br/>';
			@mysql_query($sql, $conn);
			if(mysql_error()){
				// urlendcode() can encode string data which is part of a query string
				$query_string = sprintf("&msg=%s", urlencode("Cannot add the record.<br/><br/>".mysql_error().'<br/><br/>'.$sql));
			}else{
				$query_string = sprintf("&msg=%s", urlencode("A record is added successfully : $sql"));
			}
			header("location:CRUD.php?table=$table$query_string");
		}
		
		$action = $_POST['action'];
		if($action == 'delete') {
			doDelete();	
		}else if($action == 'update'){
			doUpdate();
		}else if($action == 'create'){
			doCreate();
		}
	?>
<body>
</body>
</html>