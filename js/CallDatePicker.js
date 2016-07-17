
// Call datepicker
$(function()
	 { 
	  	$("[rel=popover]").popover();
	 	$( "#datepicker" ).datepicker
		(  
			{ 
				showWeek: true,
				dateFormat: 'yy-mm-dd',
				gotoCurrent: true,
				showOn: "button",
				buttonImage: "../lib/image/calendar.gif",
				buttonImageOnly: true
			}
		);
	});// JavaScript Document