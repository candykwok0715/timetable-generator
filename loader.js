$(document).ready(function(){
	// load index page when the page loads
	$("#response").load("home.php");
	
	$("#home").click(function(){
	// load home page on click
		$("#response").load("home.php");
	});
		
	$("#SingOut").click(function(){
	// load contact form onclick
		$("#response").load("login/logout.php");
	});
	
});// JavaScript Document