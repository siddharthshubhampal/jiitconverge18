// JavaScript Document
var page=1;
var maxPageCount=5;
var effect=0;
var subWindowOpened=false;
var internId;
var selectedEvent;
var eventList=[["GDG","2"],["ROBOTICS","3"],["QRIOSITY","2"],["CULTURAL","13"],["SPORTS","7"],["INFORMAL","6"],["YOUTH-MARATHON","1"]];
var maxEventCount;
var scrollPositionSubWindow="none";
var startJQuery=true;
var mainScaledFocusedPage="1";
var mainZoomed=true;
var zoomed=false;
var formOpened=false;
var techSubOpened=false;
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
		setTimeout( function(){ 
			$( ".se-pre-con" ).css("top","60px");
			$( ".se-pre-con" ).css("height","calc(100% - 60px)");
		},500);
		$(".fixed-bar").removeClass("hidden");
		$(".page-set").removeClass("hidden");
		var h = windowHeight-60;
		$(".block-page").css("height",h);
		$(".block-page").css("width",windowWidth);
		
	});
	var timeOut;
	function goUpWheel(){
		if(subWindowOpened==false){
			console.log("push down");
			if(scrollPositionSubWindow=="top"){
				shake=1;
				timeOut = setTimeout(function(){
					$(".sub-pages").addClass("hidden");
				},1250);
				$(".toggle-header").css("transform","translateY(-20%)");
				$(".sub-pages").css("transform","translateY(100%)");
				scrollPositionSubWindow="none";
			}else if(scrollPositionSubWindow=="bottom"){
				//$(".sub-page-body").css("transform","translateY(0%)");
				//$(".sub-page-body").scrollTop(0);
				$(".sub-page-body").animate({ scrollTop: 0 }, 600);
				scrollPositionSubWindow="top";		
			}
		}
	}
	
	function goUpWheelReachUs(){
		if(subWindowOpened==false){
			if(scrollPositionSubWindow=="top"){
				shake=2;
				timeOut = setTimeout(function(){
					$(".sub-pages-reach-us").addClass("hidden");
				},1250);
				$(".toggle-header").css("transform","translateY(-20%)");
				$(".sub-pages-reach-us").css("transform","translateY(100%)");
				scrollPositionSubWindow="none";
				$(".sub-pages-reach-us").children(".sub-page-body").children(".reach-content").text("");
				$(".sub-pages-reach-us").children(".sub-page-body").children(".se-pre-con-reach-us").remove();
			}else if(scrollPositionSubWindow=="bottom"){
				//$(".sub-page-body").css("transform","translateY(0%)");
				//$(".sub-page-body").scrollTop(0);
				$(".sub-pages-reach-us").children(".sub-page-body").animate({ scrollTop: 0 }, 600);
				scrollPositionSubWindow="top";		
			}
		}
	}
	
	function goUpWheelSponsor(){
		if(subWindowOpened==false){
			if(scrollPositionSubWindow=="top"){
				shake=2;
				timeOut = setTimeout(function(){
					$(".sub-pages-sponsor").addClass("hidden");
				},1250);
				$(".toggle-header").css("transform","translateY(-20%)");
				$(".sub-pages-sponsor").css("transform","translateY(100%)");
				scrollPositionSubWindow="none";
				$(".sub-pages-sponsor").children(".sub-page-body").children(".sponsor-content").text("");
				$(".sub-pages-sponsor").children(".sub-page-body").children(".se-pre-con-sponsor").remove();
			}else if(scrollPositionSubWindow=="bottom"){
				//$(".sub-page-body").css("transform","translateY(0%)");
				//$(".sub-page-body").scrollTop(0);
				$(".sub-pages-sponsor").children(".sub-page-body").children(".sponsor-content").text("");
				$(".sub-pages-sponsor").children(".sub-page-body").children(".se-pre-con-sponsor").remove();
			}
		}
	}
	
	function goUpWheelCredits(){
		if(subWindowOpened==false){
			if(scrollPositionSubWindow=="top"){
				shake=2;
				timeOut = setTimeout(function(){
					$(".sub-pages-sponsor").addClass("hidden");
				},1250);
				$(".toggle-header").css("transform","translateY(-20%)");
				$(".sub-pages-credits").css("transform","translateY(100%)");
				scrollPositionSubWindow="none";
				$(".sub-pages-credits").children(".sub-page-body").children(".credits-content").text("");
				$(".sub-pages-credits").children(".sub-page-body").children(".se-pre-con-credits").remove();
			}else if(scrollPositionSubWindow=="bottom"){
				//$(".sub-page-body").css("transform","translateY(0%)");
				//$(".sub-page-body").scrollTop(0);
				$(".sub-pages-credits").children(".sub-page-body").children(".credits-content").text("");
				$(".sub-pages-credits").children(".sub-page-body").children(".se-pre-con-cfredits").remove();
			}
		}
	}
	
	function goUpWheelHighlights(){
			
		if(subWindowOpened==false){
			if(scrollPositionSubWindow=="top"){
				shake=2;
				timeOut = setTimeout(function(){
					$(".sub-pages-highlights").addClass("hidden");
				},1250);
				$(".toggle-header").css("transform","translateY(-20%)");
				$(".sub-pages-highlights").css("transform","translateY(100%)");
				scrollPositionSubWindow="none";
				$(".sub-pages-highlights").children(".sub-page-body").children(".highlights-content").text("");
				$(".sub-pages-highlights").children(".sub-page-body").children(".se-pre-con-highlights").remove();
			}else if(scrollPositionSubWindow=="bottom"){
				//$(".sub-page-body").css("transform","translateY(0%)");
				//$(".sub-page-body").scrollTop(0);
				$(".sub-pages-highlights").children(".sub-page-body").children(".highlights-content").text("");
				$(".sub-pages-highlights").children(".sub-page-body").children(".se-pre-con-highlights").remove();		
			}
		}
	}
	
	function goDownWheel(){
		if(subWindowOpened==false){
			clearTimeout(timeOut);
			console.log("push up");
			if(scrollPositionSubWindow=="none"){
				shake=0;
				scrollPositionSubWindow="top";
				$(".sub-pages").removeClass("hidden");
				$(".sub-page-body").scrollTop(0);
				$(".toggle-header").css("transform","translateY(100%)");			
				$(".sub-pages").css("transform","translateY(-100%)");
			}else if(scrollPositionSubWindow=="top"){
				//$(".sub-page-body").css("transform","translateY(-70%)");
				//$(".sub-page-body").scrollTop();
				$(".sub-page-body").animate({ scrollTop: $(document).height() }, 800);
				scrollPositionSubWindow="bottom";		
			}
		}
	}
	
	function goDownWheelReachUs(){
		if(subWindowOpened==false){
			clearTimeout(timeOut);
			console.log("push up");
			if(scrollPositionSubWindow=="none"){
				shake=0;
				scrollPositionSubWindow="top";
				$(".sub-pages-reach-us").removeClass("hidden");
				$(".sub-pages-reach-us").children(".sub-page-body").scrollTop(0);
				$(".toggle-header").css("transform","translateY(100%)");			
				$(".sub-pages-reach-us").css("transform","translateY(-100%)");
				$(".sub-pages-reach-us").children(".sub-page-body").append("<div class='se-pre-con-reach-us'></div>");
				$.ajax({
					url: "/mobile/Converge/html/REACH-US.html",
					success: function(responseText,status){ 
						$(".sub-pages-reach-us").children(".sub-page-body").children(".reach-content").html(responseText);
						setTimeout(function(){
							$(".sub-pages-reach-us").children(".sub-page-body").children(".reach-content").removeClass("hidden");
							$(".sub-pages-reach-us").children(".sub-page-body").children(".se-pre-con-reach-us").remove();
						},1000);
					}
				});
			}else if(scrollPositionSubWindow=="top"){
				//$(".sub-page-body").css("transform","translateY(-70%)");
				//$(".sub-page-body").scrollTop();
				$(".sub-pages-reach-us").children(".sub-page-body").animate({ scrollTop: $(document).height() }, 800);
				scrollPositionSubWindow="bottom";
			}
		}
	}
	
	function goDownWheelSponsor(){
		if(subWindowOpened==false){
			clearTimeout(timeOut);
			console.log("push up");
			if(scrollPositionSubWindow=="none"){
				shake=0;
				scrollPositionSubWindow="top";
				$(".sub-pages-sponsor").removeClass("hidden");
				$(".sub-pages-sponsor").children(".sub-page-body").scrollTop(0);
				$(".toggle-header").css("transform","translateY(100%)");			
				$(".sub-pages-sponsor").css("transform","translateY(-100%)");
				$(".sub-pages-sponsor").children(".sub-page-body").append("<div class='se-pre-con-sponsor'></div>");
				$.ajax({
					url: "/mobile/Converge/html/SPONSOR.html",
					success: function(responseText,status){ 
						$(".sub-pages-sponsor").children(".sub-page-body").children(".sponsor-content").html(responseText);
						setTimeout(function(){
							$(".sub-pages-sponsor").children(".sub-page-body").children(".sponsor-content").removeClass("hidden");
							$(".sub-pages-sponsor").children(".sub-page-body").children(".se-pre-con-sponsor").remove();
						},1000);
					}
				});
			}
		}
	}
	
	function goDownWheelCredits(){
		if(subWindowOpened==false){
			clearTimeout(timeOut);
			console.log("push up");
			if(scrollPositionSubWindow=="none"){
				shake=0;
				scrollPositionSubWindow="top";
				$(".sub-pages-credits").removeClass("hidden");
				$(".sub-pages-credits").children(".sub-page-body").scrollTop(0);
				$(".toggle-header").css("transform","translateY(100%)");			
				$(".sub-pages-credits").css("transform","translateY(-100%)");
				$(".sub-pages-credits").children(".sub-page-body").append("<div class='se-pre-con-credits'></div>");
				$.ajax({
					url: "/mobile/Converge/html/CREDITS.html",
					success: function(responseText,status){ 
						$(".sub-pages-credits").children(".sub-page-body").children(".credits-content").html(responseText);
						setTimeout(function(){
							$(".sub-pages-credits").children(".sub-page-body").children(".credits-content").removeClass("hidden");
							$(".sub-pages-credits").children(".sub-page-body").children(".se-pre-con-credits").remove();
						},1000);
					}
				});
			}
		}
	}
	
	function goDownWheelHighlights(){
		if(subWindowOpened==false){
			clearTimeout(timeOut);
			console.log("push up");
			if(scrollPositionSubWindow=="none"){
				shake=0;
				scrollPositionSubWindow="top";
				$(".sub-pages-highlights").removeClass("hidden");
				$(".sub-pages-highlights").children(".sub-page-body").scrollTop(0);
				$(".toggle-header").css("transform","translateY(100%)");			
				$(".sub-pages-highlights").css("transform","translateY(-100%)");
				$(".sub-pages-highlights").children(".sub-page-body").append("<div class='se-pre-con-highlights'></div>");
				$.ajax({
					url: "/mobile/Converge/html/HIGHLIGHTS.html",
					success: function(responseText,status){ 
						$(".sub-pages-highlights").children(".sub-page-body").children(".highlights-content").html(responseText);
						setTimeout(function(){
							$(".sub-pages-highlights").children(".sub-page-body").children(".highlights-content").removeClass("hidden");
							$(".sub-pages-highlights").children(".sub-page-body").children(".se-pre-con-highlights").remove();
						},1000);
					}
				});
			}
		}
	}
	
	var last_time = new Date();
	$(window).on('wheel', function(e) {
		if(zoomed==true&&subWindowOpened==true){
			return;
		}
		var delta = e.originalEvent.deltaY;
		if(page!=2&&page!=3&&page!=1){
			return;
		}

		var now = new Date();
		if((now - last_time) >= 500){
			if (delta <= 0) {
            //Go up
				switch (page){
					case 1 : {
								goUpWheelSponsor();
								break;
							}
					case 2 : {
								goUpWheel();
								break;
							}
					case 3 : {
								goUpWheelHighlights();
								break;
							}
					case 4 : {
								goUpWheelReachUs();
								break;
							}
					case 5 : {
								goUpWheelCredits();
								break;
							}
				}
			}
			else {
            //Go down
				switch (page){
					case 1 : {
								goDownWheelSponsor();
								break;
							}
					case 2 : {
								goDownWheel();
								break;
							}
					case 3 : {
								goDownWheelHighlights();
								break;
							}
					case 4 : {
								goDownWheelReachUs();
								break;
							}
					case 5 : {
								goDownWheelCredits();
								break;
							}
				}
			}
			last_time = new Date(); 
		}
		return false; // this line is only added so the whole page won't scroll in the demo
	});
	
	$(".show-onhover").on("click",function(){
		if(mainZoomed==false){
			$('.page-set').removeClass("zoom-out-page");
			setTimeout(function(){
				$(".right-move-button").removeClass("hidden");
				$(".left-move-button").removeClass("hidden");
				$(".down-move-button").removeClass("hidden");
				$(".zoom-out").removeClass("zoom-out-super-white");
			},500);
			mainZoomed=true;
			return;
		}
		subWindowOpened=true;
		$(".fixed-bar").addClass("hidden");
		$(".sub-page-blocks").css("transform","translateY(calc(-170% - 60px ))");
		$(".sub-page-blocks").css("opacity","0");
		$(".toggle-header").css("transform","translateY(-20%)");
		$(this).parent().parent().parent().css("height",windowHeight + "px");
		var obj=this;
		setTimeout( function(){ 
			var text = $(obj).children("div.block-text").text();
			selectedEvent=text;
			for(var i=0;i<eventList.length;i++){
				if(eventList[i][0]==selectedEvent){
					maxEventCount=eventList[i][1];
				}
			}
			scaledFocusedPage="1";
			$(obj).parent().parent().parent().children(".sub-page-body").css("overflow-y","hidden");
			$(obj).parent().parent().parent().children(".sub-page-body").scrollTop(0);
			if(page==2)
				$(obj).parent().parent().parent().children(".sub-page-title").children(".menu-sub-page").html("<div class='title-sub-page'>CONVERGE</div><div class='title-sub-page'>" + text + "</div>");
			$(obj).parent().parent().parent().children(".sub-page-body").children(".block-page").removeClass("hidden");
			$(obj).parent().parent().parent().children(".sub-page-body").children(".block-page").css("top","0px");
			$(obj).parent().parent().parent().children(".sub-page-body").children(".block-page").css("opacity","1");
			/*$.post(   
				"../../Converge/html/" + selectedEvent + ".html",
				{

				},
				function(responseText,status){ 
					$(".block-page").html(responseText);
				}
			);*/
			
			$( ".se-pre-con" ).show();
			
			$.ajax({
				url: "/mobile/Converge/html/" + selectedEvent + ".html",
				success: function(responseText,status){ 
					$(obj).parent().parent().parent().children(".sub-page-body").children(".block-page").html(responseText);
					setTimeout(function(){
						setTimeout(function(){
							$( ".se-pre-con" ).hide();
						},500);
						if(selectedEvent=="YOUTH-MARATHON"||selectedEvent=="INFORMAL"){
							setTimeout(function(){
								$(".youth-marathon-page").children(".display").addClass("opacity-full");
							},650);
							setTimeout(function(){
								$(".youth-marathon-page").children(".display").addClass("move-to-right");
							},1950);
						}
					},500);
				}
			});
			
  		}  , 500 );
	});
	
	$(".sub-menu-back").on("click",function(){
		if(subWindowOpened==false){ 
			shake=page-1;
			$(".fixed-bar").removeClass("hidden");
			$(".toggle-header").css("transform","translateY(-20%)");
			$(this).parent().parent().css("transform","translateY(100%)");
			scrollPositionSubWindow="none";
	
			$(".sub-pages-reach-us").children(".sub-page-body").children(".reach-content").html();
			$(".sub-pages-reach-us").children(".sub-page-body").children(".se-pre-con-reach-us").remove();
			$(".sub-pages-sponsor").children(".sub-page-body").children(".sponsor-content").html();
			$(".sub-pages-sponsor").children(".sub-page-body").children(".se-pre-con-sponsor").remove();
			$(".sub-pages-credits").children(".sub-page-body").children(".credits-content").html();
			$(".sub-pages-credits").children(".sub-page-body").children(".se-pre-con-credits").remove();
			$(".sub-pages-highlights").children(".sub-page-body").children(".highlights-content").html();
			$(".sub-pages-highlights").children(".sub-page-body").children(".se-pre-con-highlights").remove();
			/*
			$(".toggle-header").css("transform","translateY(-20%)");
			$(".sub-pages").css("transform","translateY(100%)");
			shake=1;
			*/
		}else if(techSubOpened==true){
			$( ".se-pre-con" ).show();
			techSubOpened=false;
			formOpened=false;
			zoomed=false;
			$.ajax({
				url: "/mobile/Converge/html/TECHNICAL.html",
				success: function(responseText,status){ 
					$(".block-page").html(responseText);
					setTimeout(function(){
						$( ".se-pre-con" ).hide();
						if(selectedEvent=="YOUTH-MARATHON"){
							setTimeout(function(){
								$(".youth-marathon-page").children(".display").addClass("opacity-full");
							},650);
							setTimeout(function(){
								$(".youth-marathon-page").children(".display").addClass("move-to-right");
							},1950);
						}
					},500);
				}
			});
		}else{
			$(".sub-pages").children(".sub-page-body").children(".sub-page-blocks").css("transform","translateY(0)");
			$(".sub-pages").children(".sub-page-body").children(".sub-page-blocks").css("opacity","1");
			$(".toggle-header").css("transform","translateY(100%)");			
			$(".sub-pages").css("height","85%");
			$(".se-pre-con").fadeOut("slow");
			$(".se-pre-con").addClass("hidden");
			
			setTimeout( function(){ 
				$(".sub-pages").children(".sub-page-body").css("overflow-y","visible");
				$(".sub-pages").children(".sub-page-body").scrollTop(0);
				scrollPositionSubWindow="top";
				$(".sub-pages").children(".sub-page-title").children(".menu-sub-page").html("<div class='title-sub-page'>EVENTS</div>");
				$(".sub-pages").children(".sub-page-body").children(".block-page").addClass("hidden");
				$(".sub-pages").children(".sub-page-body").children(".block-page").html("");
				$(".sub-pages").children(".sub-page-body").children(".block-page").css("opacity","0");
				$(".fixed-bar").removeClass("hidden");
	  		}  , 500 );
			zoomed=false;
			subWindowOpened=false;
			formOpened=false;
		}
	});

	$(".black").mouseover(function(){
		effect=1;
		//while(effect==1){
		var obj=this;
		$(obj).parent().append("<span class='red'></span>");
		$(obj).siblings().last().addClass("r-animate");
		$(obj).siblings().last().animate(
			{"opacity" : "0"},
			1000,
			function(){$(this).remove();}
		);
		internId = setInterval(function(){
			console.log("works?");
			$(obj).parent().append("<span class='red'></span>");
			$(obj).siblings().last().addClass("r-animate");
			$(obj).siblings().last().animate(
				{"opacity" : "0"},
				1000,
				function(){$(this).remove();}
			);
		}, 500);		
		//}
	});
	
	$(".black").mouseleave(function(){
		clearInterval(internId);
	});

	$(document).keydown(function(event) {
		if(formOpened==true)
			return true;
		if(subWindowOpened==true){
			if(event.keyCode==37||event.keyCode==38||event.keyCode==39||event.keyCode==40){
				return false;
			}
			return;
		}
		switch (event.keyCode) {
        	case 37:{
						//left key
						if(page==1)
								return;
						if(page==2){
							scrollPositionSubWindow="none";
						}
						page--;
						if(page==2||page==3||page==4){
							setTimeout(function(){
								$(".zoom-out").addClass("zoom-out-white");
							},500);
						}else{
							setTimeout(function(){
								$(".zoom-out").removeClass("zoom-out-white");
							},500);
						}
						shake=page-1;
						switch (page){
							case 1 : {
											$(".pages").css("transform","translateX(0%)");
											$(".toggle-header").css("transform","translateY(-20%)");
											$(".sub-pages").css("transform","translateY(100%)");
											break;
									}
							default : {
											$(".pages").css("transform","translateX(" + 100*(1-page) + "%)");
											$(".toggle-header").css("transform","translateY(-20%)");
											$(".sub-pages").css("transform","translateY(100%)");
											break;
									}
						}
						
						break;
					}
			case 38:{
						if(page==2){
							goUpWheel();
						}else if(page==4){
							goUpWheelReachUs();
						}else if(page==3){
							goUpWheelHighlights();
						}else if(page==5){
							goUpWheelCredits();
						}
						break;
					}
			case 39:{
						//right key
						if(page==maxPageCount)
							return;
						if(page==2){
							scrollPositionSubWindow="none";
						}
						page++;
						if(page==2||page==3||page==4){
							setTimeout(function(){
								$(".zoom-out").addClass("zoom-out-white");
							},500);
						}else{
							setTimeout(function(){
								$(".zoom-out").removeClass("zoom-out-white");
							},500);
						}
						shake=page-1;
						console.log("page : " + page);
						switch (page){
							case (maxPageCount+1) : {
											//$(".pages").css("transform","translateX(0%)");
											break;
									}
							default : {
											$(".pages").css("transform","translateX(-" + 100*(page-1) + "%)");
											$(".toggle-header").css("transform","translateY(-20%)");
											$(".sub-pages").css("transform","translateY(100%)");
									}
						}
						break;
					}
			case 40:{
						if(page==2){
							goDownWheel();
						}else if(page==4){
							goDownWheelReachUs();
						}else if(page==3){
							goDownWheelHighlights();
						}else if(page==5){
							goDownWheelCredits();
						}
						break;
					}
		}
	});

	//for subevents	
	$(document).keydown(function(event) {
		if(formOpened==true)
			return true;
		if(subWindowOpened==false){
			if(event.keyCode==37||event.keyCode==38||event.keyCode==39||event.keyCode==40){
				return false;
			}
			return;
		}
		switch (event.keyCode) {
        	case 37:{
						//left key
						if(formOpened==true){	
							return;
						}
						if(scaledFocusedPage=="1")
							return;
						scaledFocusedPage--;
						console.log("HAHA : " + scaledFocusedPage);
						//alert(scaledFocusedPage);
						$(".sub-event-pages").css("transform","translateX(" + (1-parseInt(scaledFocusedPage))*100 + "%)");
						if(zoomed==true){
							setTimeout( function(){ 
								//$('.event-page').children(parseInt(scaledFocusedPage)).children(".display").addClass("hidden");
								/*$('.event-page').children(parseInt(scaledFocusedPage)).children(".display").removeClass("move-to-right");
								$('.event-page').children(parseInt(scaledFocusedPage)).children(".display").removeClass("opacity-full");
								*/$('.sub-event-pages').eq(parseInt(scaledFocusedPage)-1).children(".display").removeClass("hidden");
							},500);
							
							setTimeout(function(){
								$('.sub-event-pages').eq(parseInt(scaledFocusedPage)-1).children(".display").addClass("opacity-full");
								
							},650);
							
							setTimeout(function(){
								$('.sub-event-pages').eq(parseInt(scaledFocusedPage)-1).children(".display").addClass("move-to-right");
							},2000);
						}else{
							
							$(".sub-event-pages").addClass("grayscale");
							
							$(".sub-event-pages").each(function() {
								if($(this).children(".page-id").text()==scaledFocusedPage)
									$(this).removeClass("grayscale");
							});
						}
						break;
					}
			case 38:{
						//top
						break;
					}
			case 39:{
						//right key
						if(formOpened==true)
							return;
						if(scaledFocusedPage==maxEventCount)
							return;
						scaledFocusedPage++;
						//alert(scaledFocusedPage);
						$(".sub-event-pages").css("transform","translateX(" + (1-parseInt(scaledFocusedPage))*100 + "%)");
						if(zoomed==true){
							setTimeout( function(){ 
								//$('.event-page').children().children(".display").addClass("hidden");
								/*$('.event-page').children().children(".display").removeClass("move-to-right");
								$('.event-page').children().children(".display").removeClass("opacity-full");
								*/$('.sub-event-pages').eq(parseInt(scaledFocusedPage)-1).children(".display").removeClass("hidden");
							},500);
							setTimeout(function(){
								$('.sub-event-pages').eq(parseInt(scaledFocusedPage)-1).children(".display").addClass("opacity-full");
							},650);
							setTimeout(function(){
								$('.sub-event-pages').eq(parseInt(scaledFocusedPage)-1).children(".display").addClass("move-to-right");
							},2000);
						}else{
							$(".sub-event-pages").addClass("grayscale");
							
							$(".sub-event-pages").each(function() {
								if($(this).children(".page-id").text()==scaledFocusedPage)
									$(this).removeClass("grayscale");
							});

						}
						break;
					}
			case 40:{
						//down
						break;
					}
		}
	});
	
	$(".right-move-button").on("click",function(){
		console.log("PAGE : " + page);
		if(page==maxPageCount)
			return;
		if(page==2){
			scrollPositionSubWindow="none";
		}
		page++;
		if(page==2||page==3||page==4){
			setTimeout(function(){
				$(".zoom-out").addClass("zoom-out-white");
			},500);
		}else{
			setTimeout(function(){
				$(".zoom-out").removeClass("zoom-out-white");
			},500);
		}
		shake=page-1;
		switch (page){
			case (maxPageCount+1) : {
							//$(".pages").css("transform","translateX(0%)");
							break;
					}
			default : {
							$(".pages").css("transform","translateX(-" + 100*(page-1) + "%)");
							$(".toggle-header").css("transform","translateY(-20%)");
							$(".sub-pages").css("transform","translateY(100%)");
							$(".sub-pages-sponsor").css("transform","translateY(100%)");
							$(".sub-pages-reach-us").css("transform","translateY(100%)");
							$(".sub-pages-credits").css("transform","translateY(100%)");
							$(".sub-pages-highlights").css("transform","translateY(100%)");
							$(".sub-pages-credits").children(".sub-page-body").children(".credits-content").html();
							$(".sub-pages-credits").children(".sub-page-body").children(".se-pre-con-credits").remove();
							$(".sub-pages-sponsor").children(".sub-page-body").children(".sponsor-content").html();
							$(".sub-pages-sponsor").children(".sub-page-body").children(".se-pre-con-sponsor").remove();
							$(".sub-pages-reach-us").children(".sub-page-body").children(".reach-us-content").html();
							$(".sub-pages-reach-us").children(".sub-page-body").children(".se-pre-con-reach-us").remove();
							$(".sub-pages-highlights").children(".sub-page-body").children(".highlights-content").html();
							$(".sub-pages-highlights").children(".sub-page-body").children(".se-pre-con-highlights").remove();
					}
		}
	});
	
	$(".left-move-button").on("click",function(){
		if(page==1)
				return;
		if(page==2){
			scrollPositionSubWindow="none";
		}
		page--;
		if(page==2||page==3||page==4){
			setTimeout(function(){
				$(".zoom-out").addClass("zoom-out-white");
			},500);
		}else{
			setTimeout(function(){
				$(".zoom-out").removeClass("zoom-out-white");
			},500);
		}
		shake=page-1;
		switch (page){
			case 1 : {
							$(".pages").css("transform","translateX(0%)");
							$(".toggle-header").css("transform","translateY(-20%)");
							$(".sub-pages").css("transform","translateY(100%)");
							$(".sub-pages-sponsor").css("transform","translateY(100%)");
							$(".sub-pages-reach-us").css("transform","translateY(100%)");
							$(".sub-pages-credits").css("transform","translateY(100%)");
							$(".sub-pages-highlights").css("transform","translateY(100%)");
							$(".sub-pages-credits").children(".sub-page-body").children(".credits-content").html();
							$(".sub-pages-credits").children(".sub-page-body").children(".se-pre-con-credits").remove();
							$(".sub-pages-sponsor").children(".sub-page-body").children(".sponsor-content").html();
							$(".sub-pages-sponsor").children(".sub-page-body").children(".se-pre-con-sponsor").remove();
							$(".sub-pages-reach-us").children(".sub-page-body").children(".reach-us-content").html();
							$(".sub-pages-reach-us").children(".sub-page-body").children(".se-pre-con-reach-us").remove();
							$(".sub-pages-highlights").children(".sub-page-body").children(".highlights-content").html();
							$(".sub-pages-highlights").children(".sub-page-body").children(".se-pre-con-highlights").remove();
							break;
					}
			default : {
							$(".pages").css("transform","translateX(" + 100*(1-page) + "%)");
							$(".toggle-header").css("transform","translateY(-20%)");
							$(".sub-pages").css("transform","translateY(100%)");
							$(".sub-pages-sponsor").css("transform","translateY(100%)");
							$(".sub-pages-reach-us").css("transform","translateY(100%)");
							$(".sub-pages-credits").css("transform","translateY(100%)");
							$(".sub-pages-highlights").css("transform","translateY(100%)");
							$(".sub-pages-credits").children(".sub-page-body").children(".credits-content").html();
							$(".sub-pages-credits").children(".sub-page-body").children(".se-pre-con-credits").remove();
							$(".sub-pages-sponsor").children(".sub-page-body").children(".sponsor-content").html();
							$(".sub-pages-sponsor").children(".sub-page-body").children(".se-pre-con-sponsor").remove();
							$(".sub-pages-reach-us").children(".sub-page-body").children(".reach-us-content").html();
							$(".sub-pages-reach-us").children(".sub-page-body").children(".se-pre-con-reach-us").remove();
							$(".sub-pages-highlights").children(".sub-page-body").children(".highlights-content").html();
							$(".sub-pages-highlights").children(".sub-page-body").children(".se-pre-con-highlights").remove();
							break;
					}
		}
	});
	
	$(".hvr-bubble-float-bottom").on("click",function(){
		switch (page){
			case 1 : {
						goDownWheelSponsor();
						break;
					}
			case 2 : {
						goDownWheel();
						break;
					}
			case 3 : {
						goDownWheelHighlights();
						break;
					}
			case 4 : {
						goDownWheelReachUs();
						break;
					}
			case 5 : {
						goDownWheelCredits();
						break;
					}
		}
	});
	
	$(".pages").on('click',function(){
		if(mainZoomed==true)
			return;
		var pId=$(this).children(".page-id").text();
		if(pId==mainScaledFocusedPage&&mainZoomed==false){
			$('.page-set').removeClass("zoom-out-page");
			setTimeout(function(){
				$(".right-move-button").removeClass("hidden");
				$(".left-move-button").removeClass("hidden");
				$(".hvr-bubble-float-bottom").removeClass("hidden");
				$(".zoom-out").removeClass("zoom-out-super-white");
			},500);
			mainZoomed=true;
		}else{
			$(".pages").css("transform","translateX(" + (1-parseInt(pId))*100 + "%)");
			mainScaledFocusedPage=pId;
			page=parseInt(pId);
			if(page==2||page==3||page==4){
				setTimeout(function(){
					$(".zoom-out").addClass("zoom-out-white");
				},500);
			}else{
				setTimeout(function(){
					$(".zoom-out").removeClass("zoom-out-white");
				},500);
			}
			shake=page-1;
		}
	});
	
	$(".zoom-out-menu").on('click',function(){
		if(mainZoomed==true){
			$('.page-set').addClass("zoom-out-page");
			setTimeout(function(){
				$(".right-move-button").addClass("hidden");
				$(".left-move-button").addClass("hidden");
				$(".hvr-bubble-float-bottom").addClass("hidden");
				$(".zoom-out").addClass("zoom-out-super-white");
			},500);
			mainZoomed=false;
		}else{
			$('.page-set').removeClass("zoom-out-page");
			setTimeout(function(){
				$(".right-move-button").removeClass("hidden");
				$(".left-move-button").removeClass("hidden");
				$(".hvr-bubble-float-bottom").removeClass("hidden");
				$(".zoom-out").removeClass("zoom-out-super-white");
			},500);
			mainZoomed=true;
		}
	
	});

	$(".home-link").on("click",function(){
		$(".zoom-out").removeClass("zoom-out-super-white");
		$(".zoom-out").removeClass("zoom-out-white");
		$(".toggle-header").css("transform","translateY(-20%)");
		$(".pages").css("transform","translateX(0%)");
		$('.page-set').removeClass("zoom-out-page");
		$(".sub-pages").css("transform","translateY(100%)");
		$(".sub-pages-sponsor").css("transform","translateY(100%)");
		$(".sub-pages-reach-us").css("transform","translateY(100%)");
		$(".sub-pages-credits").css("transform","translateY(100%)");
		$(".sub-pages-highlights").css("transform","translateY(100%)");
		$(".sub-pages-credits").children(".sub-page-body").children(".credits-content").html();
		$(".sub-pages-credits").children(".sub-page-body").children(".se-pre-con-credits").remove();
		$(".sub-pages-sponsor").children(".sub-page-body").children(".sponsor-content").html();
		$(".sub-pages-sponsor").children(".sub-page-body").children(".se-pre-con-sponsor").remove();
		$(".sub-pages-reach-us").children(".sub-page-body").children(".reach-us-content").html();
		$(".sub-pages-reach-us").children(".sub-page-body").children(".se-pre-con-reach-us").remove();
		$(".sub-pages-highlights").children(".sub-page-body").children(".highlights-content").html();
		$(".sub-pages-highlights").children(".sub-page-body").children(".se-pre-con-highlights").remove();
		$(".right-move-button").removeClass("hidden");
		$(".left-move-button").removeClass("hidden");
		$(".down-move-button").removeClass("hidden");
		page=1;
		mainScaledFocusedPage="1";
		scrollPositionSubWindow="none";
		shake=page-1;
		mainZoomed=false;
		subWindowOpened=false;
	});

	$("body").on('swipeleft',function(){
		
		if(formOpened==true)
			return true;
		if(subWindowOpened==false){
			if(page==maxPageCount)
				return;
			scrollPositionSubWindow="none";
			page++;
			if(page==2||page==3||page==4){
				setTimeout(function(){
					$(".zoom-out").addClass("zoom-out-white");
				},500);
			}else{
				setTimeout(function(){
					$(".zoom-out").removeClass("zoom-out-white");
				},500);
			}
			shake=page-1;
			switch (page){
				case (maxPageCount+1) : {
								//$(".pages").css("transform","translateX(0%)");
								break;
						}
				default : {
								$(".pages").css("transform","translateX(-" + 100*(page-1) + "%)");
								$(".toggle-header").css("transform","translateY(-20%)");
								$(".sub-pages").css("transform","translateY(100%)");
								$(".sub-pages-sponsor").css("transform","translateY(100%)");
								$(".sub-pages-reach-us").css("transform","translateY(100%)");
								$(".sub-pages-credits").css("transform","translateY(100%)");
								$(".sub-pages-highlights").css("transform","translateY(100%)");
								$(".sub-pages-credits").children(".sub-page-body").children(".credits-content").html();
								$(".sub-pages-credits").children(".sub-page-body").children(".se-pre-con-credits").remove();
								$(".sub-pages-sponsor").children(".sub-page-body").children(".sponsor-content").html();
								$(".sub-pages-sponsor").children(".sub-page-body").children(".se-pre-con-sponsor").remove();
								$(".sub-pages-reach-us").children(".sub-page-body").children(".reach-us-content").html();
								$(".sub-pages-reach-us").children(".sub-page-body").children(".se-pre-con-reach-us").remove();
								$(".sub-pages-highlights").children(".sub-page-body").children(".highlights-content").html();
								$(".sub-pages-highlights").children(".sub-page-body").children(".se-pre-con-highlights").remove();
						}
			}
		}else if(subWindowOpened==true){
			if(formOpened==true)
				return;
			if(scaledFocusedPage==maxEventCount)
				return;
			scaledFocusedPage++;
			//alert(scaledFocusedPage);
			$(".sub-event-pages").css("transform","translateX(" + (1-parseInt(scaledFocusedPage))*100 + "%)");
			if(zoomed==true){
				setTimeout( function(){ 
					$('.sub-event-pages').eq(parseInt(scaledFocusedPage)-1).children(".display").removeClass("hidden");
				},500);
				setTimeout(function(){
					$('.sub-event-pages').eq(parseInt(scaledFocusedPage)-1).children(".display").addClass("opacity-full");
				},650);
				setTimeout(function(){
					$('.sub-event-pages').eq(parseInt(scaledFocusedPage)-1).children(".display").addClass("move-to-right");
				},2000);
			}else{
				$(".sub-event-pages").addClass("grayscale");
				
				$(".sub-event-pages").each(function() {
					if($(this).children(".page-id").text()==scaledFocusedPage)
						$(this).removeClass("grayscale");
				});

			}
		}
		
	});
	
	$("body").on('swiperight',function(){
		if(formOpened==true)
			return true;
		if(subWindowOpened==false){
			if(page==1)
				return;
			scrollPositionSubWindow="none";
			page--;
			if(page==2||page==3||page==4){
				setTimeout(function(){
					$(".zoom-out").addClass("zoom-out-white");
				},500);
			}else{
				setTimeout(function(){
					$(".zoom-out").removeClass("zoom-out-white");
				},500);
			}
			shake=page-1;
			switch (page){
				case 1 : {
								$(".pages").css("transform","translateX(0%)");
								$(".toggle-header").css("transform","translateY(-20%)");
								$(".sub-pages").css("transform","translateY(100%)");
								$(".sub-pages-sponsor").css("transform","translateY(100%)");
								$(".sub-pages-reach-us").css("transform","translateY(100%)");
								$(".sub-pages-credits").css("transform","translateY(100%)");
								$(".sub-pages-highlights").css("transform","translateY(100%)");
								$(".sub-pages-credits").children(".sub-page-body").children(".credits-content").html();
								$(".sub-pages-credits").children(".sub-page-body").children(".se-pre-con-credits").remove();
								$(".sub-pages-sponsor").children(".sub-page-body").children(".sponsor-content").html();
								$(".sub-pages-sponsor").children(".sub-page-body").children(".se-pre-con-sponsor").remove();
								$(".sub-pages-reach-us").children(".sub-page-body").children(".reach-us-content").html();
								$(".sub-pages-reach-us").children(".sub-page-body").children(".se-pre-con-reach-us").remove();
								$(".sub-pages-highlights").children(".sub-page-body").children(".highlights-content").html();
								$(".sub-pages-highlights").children(".sub-page-body").children(".se-pre-con-highlights").remove();
								break;
						}
				default : {
								$(".pages").css("transform","translateX(" + 100*(1-page) + "%)");
								$(".toggle-header").css("transform","translateY(-20%)");
								$(".sub-pages").css("transform","translateY(100%)");
								$(".sub-pages-sponsor").css("transform","translateY(100%)");
								$(".sub-pages-reach-us").css("transform","translateY(100%)");
								$(".sub-pages-credits").css("transform","translateY(100%)");
								$(".sub-pages-highlights").css("transform","translateY(100%)");
								$(".sub-pages-credits").children(".sub-page-body").children(".credits-content").html();
								$(".sub-pages-credits").children(".sub-page-body").children(".se-pre-con-credits").remove();
								$(".sub-pages-sponsor").children(".sub-page-body").children(".sponsor-content").html();
								$(".sub-pages-sponsor").children(".sub-page-body").children(".se-pre-con-sponsor").remove();
								$(".sub-pages-reach-us").children(".sub-page-body").children(".reach-us-content").html();
								$(".sub-pages-reach-us").children(".sub-page-body").children(".se-pre-con-reach-us").remove();
								$(".sub-pages-highlights").children(".sub-page-body").children(".highlights-content").html();
								$(".sub-pages-highlights").children(".sub-page-body").children(".se-pre-con-highlights").remove();
								break;
						}
			}
		}else if(subWindowOpened==true){
			if(formOpened==true){	
				return;
			}
			if(scaledFocusedPage=="1")
				return;
			scaledFocusedPage--;
			console.log("HAHA : " + scaledFocusedPage);
			//alert(scaledFocusedPage);
			$(".sub-event-pages").css("transform","translateX(" + (1-parseInt(scaledFocusedPage))*100 + "%)");
			if(zoomed==true){
				setTimeout( function(){ 
					//$('.event-page').children(parseInt(scaledFocusedPage)).children(".display").addClass("hidden");
					/*$('.event-page').children(parseInt(scaledFocusedPage)).children(".display").removeClass("move-to-right");
					$('.event-page').children(parseInt(scaledFocusedPage)).children(".display").removeClass("opacity-full");
					*/$('.sub-event-pages').eq(parseInt(scaledFocusedPage)-1).children(".display").removeClass("hidden");
				},500);
				
				setTimeout(function(){
					$('.sub-event-pages').eq(parseInt(scaledFocusedPage)-1).children(".display").addClass("opacity-full");
					
				},650);
				
				setTimeout(function(){
					$('.sub-event-pages').eq(parseInt(scaledFocusedPage)-1).children(".display").addClass("move-to-right");
				},2000);
			}else{
				
				$(".sub-event-pages").addClass("grayscale");
				
				$(".sub-event-pages").each(function() {
					if($(this).children(".page-id").text()==scaledFocusedPage)
						$(this).removeClass("grayscale");
				});
			}
		}
	});	
});
}