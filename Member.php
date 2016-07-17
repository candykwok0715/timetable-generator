<?php require_once("auth.php"); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="david Cheng ">

     <!-- JavaScript -->
     <script>

	</script>
    <!-- Le styles -->
    <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="lib/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

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
              <i class="icon-user"></i> <?php echo $_COOKIE['name'];?>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a data-toggle="modal" href="#Profile" >Profile</a></li>
              <li><a data-toggle="modal" href="#ChangeProfile" >Change Profile</a></li>
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
                <li class="nav-header">Your own</li>
                <li><a href="#">Schedule</a></li>
              </ul>
            </li>
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
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
    <?php require_once("profile.php");
			require_once("changProfile.php");
	?>

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
    <script src="lib/bootstrap/js/loader.js"></script>
    <script src="js/loader.js"></script>



     <!-- javascript for jQ Grid JQ Widget
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <link rel="stylesheet" href="http://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/styles/jqx.base.css" type="text/css">
    <link rel="stylesheet" href="http://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/styles/jqx.classic.css" type="text/css">
    <script type="text/javascript" src="http://www.jqwidgets.com/jquery-widgets-demo/scripts/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="http://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="http://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="http://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="http://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="http://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/jqxgrid.js"></script>
    <script type="text/javascript" src="http://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/jqxgrid.selection.js"></script>
    <script type="text/javascript" src="http://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/jqxgrid.filter.js"></script>
    <script type="text/javascript" src="http://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="http://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="http://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/jqxgrid.pager.js"></script>
    <script type="text/javascript" src="http://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="http://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/jqxgrid.sort.js"></script>
    <script type="text/javascript" src="http://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/jqxpanel.js"></script>
    <script type="text/javascript" src="http://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="http://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/jqxgrid.edit.js"></script>


    <!-- javascript for TimeTable
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <link rel="stylesheet" type="text/css" href="lib/jquery-ui-1.8.21.custom/development-bundle/themes/base/jquery.ui.all.css">
    <script src="lib/jquery-ui-1.8.21.custom/development-bundle/ui/jquery.ui.core.js"></script>
	<script src="lib/jquery-ui-1.8.21.custom/development-bundle/ui/jquery.ui.widget.js"></script>
	<script src="lib/jquery-ui-1.8.21.custom/development-bundle/ui/jquery.ui.datepicker.js"></script>

  </body>
</html>
