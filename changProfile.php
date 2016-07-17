<div id="ChangeProfile" class="modal hide fade " style=" left:57%; width:400px; " >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3>Change Your Profile</h3>
  </div>
  <?php 
		require_once("auth.php");
		extract($_POST);
		
		
		require_once ("Connections/conn.php") ;
		
		
			$query_rs_s = "SELECT * FROM students where studentID = {$_SESSION['SESS_studentID']} ";
  			$rs_s = mysql_query($query_rs_s, $conn) or die(mysql_error());
 			$row_rs_s = mysql_fetch_assoc($rs_s);
				
		echo <<<_EOT
		
		  <center>
            <div class="modal-body">
            <form method="post" action="changeProfile_exec.php" enctype="multipart/form-data" class="well">
			
			 <table border="0">
                 
                 <tr>
                    <td ><img src="images/{$row_rs_s['photo']}" alt="prodPhoto"></td>
                    <td ><input type="file" name="photo" /></td>
                  </tr>	
				  
				  
				   <tr>
                    <td>Nick Name :</td>
                    <td> <span id="sprytextfield2">
                  <input name="nickName" type="text" id="NickName"  value="{$row_rs_s['nickName']}" />
                  <br />
                  <span class="textfieldRequiredMsg">A value is required.</span>
                  </span> </td>
                  </tr>
                  <tr>	
				  
				  
				  <td>Password :</td>
                    <td> <span id="sprypassword1">
                  <input name="password" type="password" id="Password" />
                  <br />
                  <small>must contain: 3 numbers 2 SpeciaChars  3 AlphaChars</small>
                  <br />
                  <span class="passwordRequiredMsg">A value is required.</span>
                  <span class="passwordMinCharsMsg">Minimum number of characters not met.</span>
                  <span class="passwordInvalidStrengthMsg">"require at least 3 numbers, 2 SpeciaChars and 3 AlphaChars"</span>
                 
                  </span></td>
                  </tr>
                  <tr>
                    <td>Password <br />
                    Comfirmation :</td>
                    <td><span id="spryconfirm1">
                  <input name="Password Comfirm" type="password" id="Password Comfirm"  />
                  <br />
                  <span class="confirmRequiredMsg">A value is required.</span>
                  <span class="confirmInvalidMsg">"The values do not match"</span>
                    <br/>
                  </span></td>
                  </tr>
				  
				  </div>
			
				  
_EOT;
		
		?>
  </table>
  
  </center>
			<div class="modal-footer"> <a href="#" class="btn" data-dismiss="modal" >Close</a>
			  <input type="reset" class="btn" value="Reset" />
			  <input type="submit" class="btn btn-primary" value="Change" />
			  </form>
			</div>
			</div>
			</div>
			</div>

<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script> 
<script src="SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script> 
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {minChars:8, minNumbers:3, maxSpecialChars:2, minAlphaChars:3, validateOn:["blur"]});
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "Password", {validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur"]});

</script>