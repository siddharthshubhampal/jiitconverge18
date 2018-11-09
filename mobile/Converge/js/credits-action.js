// JavaScript Document
$(function(){
	
	$(".member-panel-photo").on("click",function(){
		$(this).addClass("hidden");
		$(this).siblings(".member-panel-data").removeClass("hidden");
	});
	
	$(".member-panel-data").on("click",function(){
		$(this).addClass("hidden");
		$(this).siblings(".member-panel-photo").removeClass("hidden");
	});
	
});