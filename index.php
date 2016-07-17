
<!DOCTYPE html>
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
          	<a data-toggle="modal" href="#Login" class="btn">Login</a>
            <a data-toggle="modal" href="#SignUp" class="btn">Sign up</a>
          </div>
          <div class="nav-collapse">
            <ul class="nav">
              <li><a href="#">Dashboard</a></li>
              
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	<br />
    
   <div class="span-19 last " id="response">
	</div>
    
    
   
    	<?php require_once("loginForm.html") ?>
         <?php require_once("registerFrom.html") ?>
   
    <!-- Le javascript for nav bar 
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
    
    <!-- Javascript for Sign up validation
    ================================================== -->
    
    

    
  </body>
</html>
