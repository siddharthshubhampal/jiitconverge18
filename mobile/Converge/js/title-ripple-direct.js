// JavaScript Document
var page=1;
var maxPageCount=3;
var effect=0;
var subWindowOpened=false;
var internId;
var selectedEvent;
var eventList=[["TECHNICAL","4"],["CULTURAL","7"],["SPORTS","7"],["INFORMAL","4"]];
var maxEventCount;
var scrollPositionSubWindow="none";
var startJQuery=true;
var mainScaledFocusedPage="1";
var mainZoomed=true;
var zoomed=false;
var formOpened=false;
var windowWidth = window.innerWidth;
var windowHeight = window.innerHeight;
/*
function runScript() {
    // Script that does something and depends on jQuery being there.
    if( window.$ ) {
        startJQuery=true;
		// do your action that depends on jQuery.
    } else {
        // wait 50 milliseconds and try again.
        window.setTimeout( runScript, 50 );
    }
}
runscript();*/
if(startJQuery==true){
$(function(){
	
	/*$( document ).ajaxStart(function() {
		$( ".se-pre-con" ).show();
	});

	$( document ).ajaxStop(function() {
		setTimeout(function(){
			$( ".se-pre-con" ).hide();
		},500);
	});
	
	$( document ).ajaxComplete(function() {
		setTimeout(function(){
			$( ".se-pre-con" ).hide();
		},500);
	});*/
	
	$(window).on("resize",function(){
		//code on resize
		windowHeight=window.innerHeight;
		windowWidth=window.innerWidth;	
	});

	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");
		$(".page-set").removeClass("hidden");
		var h = windowHeight-60;
		setTimeout( function(){ 
			$( ".se-pre-con" ).css("top","60px");
			$( ".se-pre-con" ).css("height","calc(100% - 60px)");
			$(".block-page").css("height",h);
			$(".block-page").css("width",windowWidth);
			setTimeout( function(){ 
				$(".sub-event-pages").children(".display").removeClass("hidden");
			},500);
			setTimeout(function(){
				$(".sub-event-pages").children(".display").addClass("opacity-full");
			},650);
			setTimeout(function(){
				$(".sub-event-pages").children(".display").addClass("move-to-right");
			},1950);
		},500);
		
	});
});
}