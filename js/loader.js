$(document).ready(function(){
	// load index page when the page loads
	$("#response").load("home.html");
	
	$("#home").click(function(){
	// load home page on click
		$("#response").load("home.html");
	});
	
	$("#dayView").click(function(){
	// load about page on click
		$("#response").load("../php/dayView.php");
	});
	
	$("#weekView").click(function(){
	// load about page on click
		$("#response").load("../php/weekView.php");
	});
	
	$("#contact").click(function(){
	// load contact form onclick
		$("#response").load("contact.html");
	});
});// JavaScript Document