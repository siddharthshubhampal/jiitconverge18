if(startJQuery==true){
$(function(){
	
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
	});// JavaScript Document

});
}