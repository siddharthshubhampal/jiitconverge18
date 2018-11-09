// JavaScript Document
var scaledFocusedPage;
$(function(){
	/*$( document ).load(function(){
		$(".se-pre-con").hide();
		$(".timeline-cover").removeClass("hidden");
	});*/
	
	$(".sub-event-pages").on('click',function(){
		var pId=$(this).children(".page-id").text();
		if(zoomed==false){
			if(pId==scaledFocusedPage){
				$('.event-page').addClass("zoom-in");
				var obj=this;
				zoomed=true;
				setTimeout( function(){ 
					$(obj).children(".display").removeClass("hidden");
					$(".sub-event-pages").removeClass("grayscale");
					
					/*$(obj).css(
					{
						'background':'none',
						'background-color':'#1f1f1f'
					});*/
				},500);
				setTimeout(function(){
					$(obj).children(".display").addClass("opacity-full");
				},650);
				setTimeout(function(){
					$(obj).children(".display").addClass("move-to-right");
				},1950);
			}else{
				$(".sub-event-pages").css("transform","translateX(" + (1-parseInt(pId))*100 + "%)");
				scaledFocusedPage=pId;
				$(".sub-event-pages").addClass("grayscale");
				$(this).removeClass("grayscale");
			}
		}
	});
	
	$(".display-meta").on("click",function(){
		return false;
	});
	
	$(".event-name").on("click",function(){
		var pId=$(this).parent().parent().children(".page-id").text();
		if(zoomed==false){
			if(pId==scaledFocusedPage){
				$('.event-page').addClass("zoom-in");
				var obj=this;
				zoomed=true;
				setTimeout( function(){ 
					$(obj).parent().parent().children(".display").removeClass("hidden");
					$(".sub-event-pages").removeClass("grayscale");
					
					/*$(obj).css(
					{
						'background':'none',
						'background-color':'#1f1f1f'
					});*/
				},500);
				setTimeout(function(){
					$(obj).parent().parent().children(".display").addClass("opacity-full");
				},650);
				setTimeout(function(){
					$(obj).parent().parent().children(".display").addClass("move-to-right");
				},1950);
			}else{
				$(".sub-event-pages").css("transform","translateX(" + (1-parseInt(pId))*100 + "%)");
				scaledFocusedPage=pId;
				$(".sub-event-pages").addClass("grayscale");
				$(this).parent().parent().removeClass("grayscale");
			}
		}
	});
	
	$(".zoom-out-sub-events").on('click',function(){
		if(formOpened==true){
			formOpened=false;
			var obj=this;
			$(obj).parent().children(".event-content").css("transform","translateY(0%)");
			$(obj).parent().children(".ajax-forms").css("transform","translateY(0%)");
			setTimeout(function(){
				$(obj).addClass("hidden");	
				$(obj).parent().children(".ajax-forms").children(".content-forms").html("");
				$(obj).parent().children(".ajax-forms").children(".se-pre-con-forms").addClass("hidden");
			},500);
		}else{
			
		}
	});
	$(".expandable").on("click",function(){
		$(this).toggleClass("expand");
		if($(this).children(".closed-arrow").hasClass("hidden")){
			$(this).children(".open-arrow").addClass("hidden");
			$(this).children(".closed-arrow").removeClass("hidden");
		}else{
			$(this).children(".closed-arrow").addClass("hidden");
			$(this).children(".open-arrow").removeClass("hidden");
		}
	});
	
	$(".register-button").on("click",function(){
		formOpened=true;
		var obj=this;
		$(obj).parent().parent().css("transform","translateY(-200%)");
		$(obj).parent().parent().parent().children(".ajax-forms").css("transform","translateY(-205%)");
		setTimeout(function(){
			$(obj).parent().parent().parent().children(".zoom-out-sub-events").children(".display-text").text("BACK TO DETAILS");	
			$(obj).parent().parent().parent().children(".zoom-out-sub-events").removeClass("hidden");
		},500);
		var selectedEvent = $(obj).children(".form-name").text();
		$(obj).parent().parent().parent().children(".ajax-forms").children(".se-pre-con-forms").removeClass("hidden");
		$.ajax({
			url: "/mobile/Converge/forms/" + selectedEvent + ".php",
			success: function(responseText,status){
				setTimeout(function(){
					$(obj).parent().parent().parent().children(".ajax-forms").children(".se-pre-con-forms").addClass("hidden");
					$(obj).parent().parent().parent().children(".ajax-forms").children(".content-forms").html(responseText);
				},1500);
			}
		});
		
	});
	
});