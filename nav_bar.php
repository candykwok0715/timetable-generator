<?php require_once("auth.php") ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="david Cheng ">

     <!-- JavaScript -->
    
    <!-- Le styles -->
    <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="lib/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    
    <!-- e javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
     <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
	     <script src="lib/bootstrap/js/jquery.js"></script>
    <script src="lib/bootstrap/js/google-code-prettify/prettify.js"></script>
    <script src="lib/bootstrap/js/bootstrap-transition.js"></script>
    <script src="lib/bootstrap/js/bootstrap-alert.js"></script>
    <script src="lib/bootstrap/js/bootstrap-modal.js"></script>
    <script src="lib/bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="lib/bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="lib/bootstrap/js/bootstrap-tab.js"></script>
    <script src="lib/bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="lib/bootstrap/js/bootstrap-popover.js"></script>
    <script src="lib/bootstrap/js/bootstrap-button.js"></script>
    <script src="lib/bootstrap/js/bootstrap-collapse.js"></script>
    <script src="lib/bootstrap/js/bootstrap-carousel.js"></script>
    <script src="lib/bootstrap/js/bootstrap-typeahead.js"></script>
    <script src="lib/bootstrap/js/application.js"></script>

  </head>

  <body>
  
  
	 <!-- Student navbar
    ================================================== -->
     <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="Website /home.php">IVE Timetable</a>
          <div class="btn-group pull-right">
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="icon-user"></i> 
			  <?php 
			 
			  if(isset($_SESSION['SESS_studentID']) ){
				  echo $_SESSION['SESS_name'];
			  }
			  	else
					echo $_SESSION['SESS_admin'];
			  ?>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
            	<?php 
				
					if(isset($_SESSION['SESS_studentID']) )
					echo <<<_EOT
					<li><a data-toggle="modal" href="#Profile" >Profile</a></li>
					<li><a data-toggle="modal" href="#ChangeProfile" >Change Profile</a></li>
_EOT;
				?>
                
                <?php if(isset($_SESSION['SESS_admin']) )
					echo <<<_EOT
					<li><a data-toggle="modal" href="#ChangePassword" >Change Profile</a></li>
_EOT;
				?>
              
              
              <li class="divider"></li>
              <li><a href="logout.php" id="SingOut" >Sign Out</a></li>
           </ul>
          </div>
          <div class="nav-collapse">
            <ul class="nav">
              <li><a href="#">Dashboard</a></li>
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Timetable <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="weekView.php">Classes</a></li>
                <li><a href="lectureView.php">Lecturers</a></li>
                <li><a href="RoomView.php">Room</a></li>
                <li class="divider"></li>
              </ul>
            </li>
            	
            	<?php if(isset($_SESSION['SESS_admin']) )
					echo <<<_EOT2
					<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Application Management <b class="caret"></b></a>
              <ul class="dropdown-menu">

                <li class="divider"></li>
                <li class="nav-header">Schedule</li>
                <li><a href="CRUD.php?table=timeslots">timeslots</a></li>
                <li><a href="CRUD.php?table=calendar">calendar</a></li>

                <li class="divider"></li>
                <li class="nav-header">Courses</li>
                <li><a href="CRUD.php?table=courses">courses</a></li>
                <li><a href="CRUD.php?table=modules">modules</a></li>
                <li><a href="CRUD.php?table=classes">classes</a></li>



                <li class="divider"></li>
                <li class="nav-header">People</li>
                <li><a href="CRUD.php?table=administrators">administrators</a></li>
                <li><a href="CRUD.php?table=lecturers">lecturers</a></li>
                <li><a href="CRUD.php?table=students">students</a></li>

                <li class="divider"></li>
                <li class="nav-header">Resource</li>
                <li><a href="CRUD.php?table=rooms">rooms</a></li>
              </ul>
            </li>
            </ul>
					
_EOT2;
				?>
                
                
                <?php 
				
				
				if( isset($_SESSION['SESS_studentID'])){
						if( ($_SESSION['SESS_type'])=='class representative'){
						echo <<<_EOT3
					<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Application Management <b class="caret"></b></a>
              <ul class="dropdown-menu">

                <li class="divider"></li>
                <li class="nav-header">Courses</li>
         
                <li><a href="CRUD.php?table=modules">modules</a></li>
                <li><a href="CRUD.php?table=classes">classes</a></li>



                <li class="divider"></li>
                <li class="nav-header">People</li>
               
                <li><a href="CRUD.php?table=students">students</a></li>

                <li class="divider"></li>
                <li class="nav-header">Resource</li>
              
              </ul>
            </li>
            </ul>
					
_EOT3;
					}
				}	
				
				?>
                
                
            	
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
  
    <?php 	
	
			if(isset($_SESSION['SESS_studentID'])){
			require_once("profile.php");
			require_once("changProfile.php");
			}
   			else 
			require_once("changepassword.php");
	?>

    <!-- javascript for TimeTable
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <link rel="stylesheet" type="text/css" href="lib/jquery-ui-1.8.21.custom/development-bundle/themes/base/jquery.ui.all.css">
    <script src="lib/jquery-ui-1.8.21.custom/development-bundle/ui/jquery.ui.core.js"></script>
	<script src="lib/jquery-ui-1.8.21.custom/development-bundle/ui/jquery.ui.widget.js"></script>
	<script src="lib/jquery-ui-1.8.21.custom/development-bundle/ui/jquery.ui.datepicker.js"></script>

  </body>
</html>
