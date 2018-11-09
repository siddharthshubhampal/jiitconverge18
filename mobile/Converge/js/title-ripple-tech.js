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
	
	$(".sub-page-blocks").mouseenter(function(){
		$(this).children(".show-onhover-tech").css("opacity","1");
		$(this).children(".show-onhover-tech").fadeIn();
		
	});
	
	$(".sub-page-blocks").mouseleave(function(){
		
		$(this).children(".show-onhover-tech").css("opacity","0");
		
	});
	
	$(".show-onhover-tech").on("click",function(){
		techSubOpened=true;
		var obj=this;
		setTimeout( function(){ 
			var text = $(obj).children("div.block-text").text();
			selectedEvent=text;
			for(var i=0;i<eventList.length;i++){
				if(eventList[i][0]==selectedEvent){
					maxEventCount=eventList[i][1];
				}
			}
			
			$( ".se-pre-con" ).show();
			
			$.ajax({
				url: "/mobile/Converge/html/" + selectedEvent + ".html",
				success: function(responseText,status){ 
					$(".block-page").html(responseText);
					setTimeout(function(){
						$( ".se-pre-con" ).hide();
					},500);
				}
			});
			
  		}  , 500 );
	});
	
	/*$("body").mouseleave(function(){
		for(var i=0;i<2;i++){
			var divX = (windowWidth - 536)/2; //position div from half width of the page
			var divY = (windowHeight - 592)/2;
			objectArray[i][0].style.left = divX + 'px';
			objectArray[i][0].style.top = divY + 'px';
		}
		for(i=2;i<objectArray.length;i++){
			var divX = (windowWidth - 458)/2; //position div from half width of the page
			var divY = (windowHeight - 640)/2;
			objectArray[i][0].style.left = divX + 'px';
			objectArray[i][0].style.top = divY + 'px';
		}
	});*/

	/*$("#page01").on("click",function(){
		$("#page01").css("transform","translateX(-100%)");
		$("#page02").css("transform","translateX(-100%)");
	});
	
	$("#page02").on("click",function(){
		$("#page01").css("transform","translateX(100%)");
		$("#page02").css("transform","translateX(100%)");
	});*/
});