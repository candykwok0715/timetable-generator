<?php 
		require_once("Connections/conn.php");
		extract($_POST);
		print_r($_POST);
		
		$photo = trim( $_FILES['photo']['name'] );
		echo $photo;
			 
		echo ($_FILES ['photo']['tmp_name']);
			
		$image_folder = "images/";
			if (strlen($photo) > 0) {
				// copy temp file (tmp_name) to the image folder
				// to be completed
				copy($_FILES ['photo']['tmp_name'], $image_folder.$photo);
			}
					
					
			$update = "UPDATE `students` SET `photo`= '%s',`password`= '%s',`nickName`= '%s' where studentID = {$_SESSION['SESS_studentID']} ";
			$update = sprintf($update,$photo,md5($_POST['password']),$nickName);
			print $update;
  			$update = mysql_query($update, $conn) or die(mysql_error());
			
			if($update){
				echo <<<alert
 <div class="alert alert-success">
            <strong>Successful!</strong>The insertion was a success! Please, Close this box and refresh weekView.php page
          </div>
alert;
		
		
		}
