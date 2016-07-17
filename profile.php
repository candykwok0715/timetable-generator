<div id="Profile" class="modal hide fade " style=" left:57%; width:400px; " >
			<?php require_once ("Connections/conn.php") ;
				
			$query_rs_s = "SELECT * FROM students where studentID = {$_SESSION['SESS_studentID']} ";
  			$rs_s = mysql_query($query_rs_s, $conn) or die(mysql_error());
 			$row_rs_s = mysql_fetch_assoc($rs_s);
			      
            echo <<<_EOT
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3>Your Profiles</h3>
            </div>
            <center>
            <div class="modal-body">
            <form method="post" action="register-exec.php" enctype="multipart/form-data" class="well">
            
                <table border="0" class="table table-striped">
                 
                 <tr>
                    <td ><img src="images/{$row_rs_s['photo']}" alt="prodPhoto" width="50" height="50"></td>
                  </tr>
                  
                  
                  <tr>
                    <td >Student ID :</td>
                    <td >{$row_rs_s['studentID']}</td>
                  </tr>
                  
                  <tr>
                    <td>Name :</td>
                    <td>{$row_rs_s['name']}</td>
                  </tr>
                  <tr>
                    <td>Nick Name :</td>
                    <td>{$row_rs_s['nickName']}</td>
                  </tr>
                 
                 
                  <tr>
                    <td>Year :</td>
                    <td>{$row_rs_s['year']}</td>
                  </tr>
                  <tr>
                 
                   <td>Course :</td>
                    <td>{$row_rs_s['course']}</td>
                  </tr>
                  <tr>
                    <td>Type :</td>
                    <td>{$row_rs_s['type']}</td>
                  </tr>
                </table>
            </div>
            <center>
            <div class="modal-footer">
             	<a href="#" class="btn" data-dismiss="modal" >Close</a>
                </form>
            </div>
            
          </div>
            </div>
            
	</div>
_EOT;

?>