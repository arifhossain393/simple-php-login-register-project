$(function() {
    "use strict";
	
	
	
	//Responsive menu
	
	$(".navbar-toggle").click(function(){
		$("body").addClass("small-menu");
		
	});
	$("ul.navbar-nav li a").click(function(){
		$("div.navbar-collapse").removeClass("in");
		
	});
	
	
});