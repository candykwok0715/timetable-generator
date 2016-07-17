<?php require_once("nav_bar.php"); ?>
<?php require_once('Connections/conn.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Untitled Document</title>
    <script type="text/javascript" src="js/checkbox.js">
    </script>
    <!--

<link href="CSS/mystyle.css" rel="stylesheet" type="text/css" />

-->
</head>

<body>
<!--

	<p>
<a href="index.php">Select another table</a>

    </p>

-->
	<?php
		$table = $_GET['table'];
		//get column list
		$query_rs_field = "show fields from $table";
		$rs_field = mysql_query($query_rs_field, $conn) or die(mysql_error());

		//get primary key list
		$query_rs_pk = "SHOW KEYS FROM $table WHERE Key_name = 'PRIMARY'";
		$rs_pk = mysql_query($query_rs_pk, $conn) or die(mysql_error());
		$row_rs_pk = mysql_fetch_assoc($rs_pk);
		$rs_pk_num = mysql_num_rows($rs_pk);
		if($rs_pk_num == 1) {
			$pk = $row_rs_pk['Column_name'];
		}else if($rs_pk_num == 2) {
			$pk[] = $row_rs_pk['Column_name'];
			$row_rs_pk = mysql_fetch_assoc($rs_pk);
			$pk[] = $row_rs_pk['Column_name'];
		}else {
			die("Not support >3 composite keys");	
		}
		/*while($row_rs = mysql_fetch_assoc($rs_pk)){
			$colunm_name = $row_rs['Column_name'];
			$pk[$colunm_name] = $colunm_name;
		}
		foreach( $pk as $key => $value) 
			echo "$key  $value<br />";
		*/
    ?>
    <form method="post" action="doCRUD.php">
    	
        <input type="hidden" name="action" value="delete" />
        <input type="hidden" name="table" value="<?php echo $table; ?>" />
        <?php if($rs_pk_num == 1) { ?>
            <input type="hidden" name="pk" value="<?php echo $pk; ?>" />
        <?php }else { ?>
            <input type="hidden" name="pka[]" value="<?php echo $pk[0]; ?>" />
            <input type="hidden" name="pka[]" value="<?php echo $pk[1]; ?>" />
        <?php } 
		
		//retrive data query
		$query_rs_all = "SELECT * FROM $table";
		$rs_all = mysql_query($query_rs_all, $conn) or die(mysql_error());
		$select_row_num = mysql_num_rows($rs_all);
		
		//for page and num of row setting		
		if(isset($_GET['num_row'])) {
			$num_row = $_GET['num_row'];
		}else {
			$num_row = 5;
		}
		if(isset($_GET['start_row'])) {
			$start_row = $_GET['start_row'];
		}else {
			$start_row = 0;	
		}
		$query_rs_page = "SELECT * FROM $table ";
		if(isset($_GET['order_by_asc'])) {
			 $query_rs_page .= ' ORDER BY '.$_GET['order_by_asc'].' ASC ';
		}else if(isset($_GET['order_by_desc'])) {
			 $query_rs_page .= ' ORDER BY '.$_GET['order_by_desc'].' DESC ';
		}
		echo $query_rs_page .= "LIMIT  $start_row, $num_row";
		
		
		$rs_page = mysql_query($query_rs_page, $conn) or die(mysql_error());
		?>
        
        <div class="container-fluid">
        <table class="table table-bordered table-condensed table-striped">
            <thead >
                <tr>
                    <th><input type="checkbox" onclick="setCheckboxes(this, 'cb[]');" /></th>
                    <th>Action</th>
                    <?php while ($row_rs_field = mysql_fetch_assoc($rs_field)) { ?>
                    <th>
						<?php 
							if(!isset($_GET['order_by_asc'])) {
								printf('<a href="CRUD.php?%s=%s&%s=%s&%s=%s&%s=%s">%s</a>%s', 'table',  $table, 'start_row', $start_row,  'num_row', $num_row , 'order_by_asc', $row_rs_field['Field'], $row_rs_field['Field'], ' V');
							} else {
								printf('<a href="CRUD.php?%s=%s&%s=%s&%s=%s&%s=%s">%s</a>%s', 'table',  $table, 'start_row', $start_row,  'num_row', $num_row , 'order_by_desc', $row_rs_field['Field'], $row_rs_field['Field'], ' ^');	
							};
						?>
                    </th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php while ($row_rs_page = mysql_fetch_assoc($rs_page)) {  ?>
                <tr>
                    <th>
                        <?php if($rs_pk_num == 1) { ?>
                            <input type="checkbox" name="cb[]" value="<?php echo $row_rs_page[$pk]?>">
                        <?php }else if($rs_pk_num == 2) { ?>
                            <input type="checkbox" name="cb[]" value="<?php echo $row_rs_page[$pk[0]].','.$row_rs_page[$pk[1]]?>">
                        <?php }?>
                    </th>
                    <td>
                        <?php 
							if($rs_pk_num == 1) { 
								printf('<a href="CRUD.php?%s=%s&%s=%s&%s=%s&%s=%s" class="btn btn-info" >Update Record</a>', 'table', $table, 'update', 'update', 'pk0', $pk, $pk, $row_rs_page[$pk]);
							}else if($rs_pk_num == 2) {
								printf('<a href="CRUD.php?%s=%s&%s=%s&%s=%s&%s=%s&%s=%s&%s=%s" class="btn btn-info" >Update Record</a>', 'table', $table, 'update', 'update', 'pk1', $pk[0], 'pk2', $pk[1], $pk[0], $row_rs_page[$pk[0]], $pk[1], $row_rs_page[$pk[1]]);
							}
						?>
                        <a data-toggle="modal" href="#Update" class="btn">Update</a>
                    </td>
                    <?php foreach($row_rs_page as $key => $value) { ?>
                    <td><?php echo $value; ?></td>
                    <?php } ?>
                </tr>
              <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>
                    	<br />
                    	<p><input type="submit" name="submit" class="btn btn-danger" value="Delete Selected" /></p>
                        <p><input type="reset" value="Reset" class="btn"/></p>
                    </th>
                    <th>
                        <?php 
                            printf('<a href="CRUD.php?%s=%s&%s=%s" class="btn btn-primary" >Create Record</a>', 'table', $table, 'create', 'create');
                        ?>
                    </th>
                </tr>
            </tfoot>
        </table>
    </form>
    </div>
    <p>
        Page:
        <?php
            for($i = 0; $i < ($select_row_num / $num_row); $i++){ 
				$this_start_row = $i * $num_row;
				if($this_start_row == $start_row) {
					echo '<strong>'.($i+1).'&nbsp;</strong>';
				}else {
                	printf('<a href="CRUD.php?%s=%s&%s=%s&%s=%s">%s</a>', 'table', $table, 'start_row', $this_start_row, 'num_row', $num_row, ($i+1).'&nbsp;');
				}
            }
        ?>
        Number of rows:
        <?php
            for($i = 1; $i < 7; $i++){ 
				$this_num_row = $i*5;
				if($this_num_row == $num_row) {
					echo '<strong>'.($i*5).'&nbsp;</strong>';
				}else {
                printf('<a href="CRUD.php?%s=%s&%s=%s&%s=%s">%s</a>', 'table',  $table, 'start_row', $start_row,  'num_row', $this_num_row , ($i*5).'&nbsp;');
				}
            }
        ?>
    </p>
    </center>
    </div>
    <br />
    <br />
    <?php
  		mysql_free_result($rs_field);
		mysql_free_result($rs_pk);
		mysql_free_result($rs_page);
	?>
    <?php
	extract( $_GET );
	if(isset($update)) {
		if(isset( $pk0 )) {
			$value = $$pk0;
			$sql = "select * from $table where $pk='$value'";
		}else if(isset($pk1) && isset($pk2)) { 
			$value1 = $$pk1;
			$value2 = $$pk2;
			$sql = "select * from $table where $pk1='$value1' AND $pk2='$value2'";
		}
		$result = mysql_query($sql,$conn) or die(mysql_error());
		$row = mysql_fetch_assoc($result);
		$num = mysql_num_rows($result);
	?>
    	
        <center>
        <div class="modal-header">
        	<h1>Update Record</h1>
        </div>
        
        <form method="post" action="doCRUD.php" >
        
        	<input type="hidden" name="action" value="update" />
            <input type="hidden" name="table" value="<?php echo $table;?>" />
            <?php if(isset( $pk0 )) { ?>
                <input type="hidden" name="fk" value="<?php echo $pk0;?>" />
            <?php }else if(isset($pk1) && isset($pk2)) { ?>
                <input type="hidden" name="fka[]" value="<?php echo $pk1;?>" />
                <input type="hidden" name="fka[]" value="<?php echo $pk2;?>" />
            <?php } ?>
            <div>
                <?php foreach($row as $key => $value) { ?>
                <div class="modal-form">
                  <p><label>
                  
                      <?php echo $key; ?>
                      <?php if(isset( $pk0 )) { ?>
                        <input type="text" name="<?php echo $key;?>" <?php if($key == $pk) echo 'readonly="readonly"';?> value="<?php echo $value;?>"/>
                      <?php }else if(isset($pk1) && isset($pk2)) { ?>
                         <input type="text" name="<?php echo $key;?>" <?php if($key == $pk1 || $key == $pk2) echo 'readonly="readonly"'; ?> value="<?php echo $value;?>"/>
                      <?php } ?>   
                  </label></p>
                  </div>
                <?php } ?>
                </div>
                
               <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="Update Record"/>
              <input type="button" class="btn " value="Cancel" onclick="window.location.href='CRUD.php?table=<?php echo $table;?>';"/>
              </div>
            
        </form>
        </div>
        </center>
        </div>
        
   	<?php } else if(isset($create)) {
    	$sql = "select * from $table";
		$result = mysql_query($sql,$conn) or die(mysql_error());
		$row = mysql_fetch_assoc($result);
		$num = mysql_num_rows($result);
    ?>
    	<center>
    	<div class="modal-header">
        	<h1>Create Record</h1>
        </div>
   		<form method="post" action="doCRUD.php">
        	
        	<input type="hidden" name="action" value="create" />
            <input type="hidden" name="table" value="<?php echo $table;?>" />
            <div>
            	<div class="modal-body">
                <?php foreach($row as $key => $value) { ?>
                  <p><label>
                      <?php echo $key; ?>
                        <input type="text" name="<?php echo $key;?>"/>
                  </label></p>
                <?php } ?>
                </div>
             <div class="modal-footer">
              <input type="submit" value="Create Record" class="btn btn-danger"/>
              <input type="button" class="btn" value="Cancel" onclick="window.location.href='CRUD.php?table=<?php echo $table;?>';"/>
              </div>
            </div>
        </form>
        </div>
        </center>
    <?php } ?>
	<?php if(isset($msg)) { ?>
    	<p><strong><?php echo $msg; ?></strong></p>
	<?php } ?>
</body>
</html>



