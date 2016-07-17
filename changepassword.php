<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php //require_once("auth.php"); ?>

<div class="container">
		<div id="ChangePassword" class="modal hide fade " style=" left:57%; width:400px; " >
		 <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3>Change Password</h3>
      	</div>
  
        <div class="modal-body">
        <form action="do_change_password.php" method="post">
		<p><span id="sprypassword1">
		<label for="password">password </label>
		<input type="password" name="password" id="password" /><br />
        <small>require at least 3 numbers, 2 SpeciaChars and 3 AlphaChars</small>
		<span class="passwordRequiredMsg">A value is required.</span></span>
        <span class="passwordInvalidStrengthMsg">"require at least 3 numbers, 2 SpeciaChars and 3 AlphaChars"</span>
        </p>
        
        
        <span id="spryconfirm1">
        <label for="comfirm">comfirm</label>
        <input type="password" name="comfirm" id="comfirm" />
        <span class="confirmRequiredMsg">A value is required.</span>
        <span class="confirmInvalidMsg">The values don't match.</span></span>
        </div>
        
        <div class="modal-footer"> <a href="#" class="btn" data-dismiss="modal" >Close</a>
        <input type="reset" class="btn" value="Reset" />
        <input type="submit" class="btn btn-primary" value="Change" />
        </form>
		</div>
        </div>
</div>        
        
<script type="text/javascript">
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {minChars:8, minNumbers:3, maxSpecialChars:2, minAlphaChars:3, validateOn:["blur"]});
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "password",{validateOn:["blur"]});
</script>
</body>
</html>