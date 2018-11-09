// JavaScript Document
$(function(){
	
	$('#event-form').on('submit', function (e) {

		e.preventDefault();
		var obj=this;
		$(obj).parent().parent().children(".se-pre-con-forms").removeClass("hidden");
		var eventName= $(obj).parent().children(".event-name").text();
		$(obj).addClass("hidden");
		$.ajax({
			type: 'post',
			url: '/mobile/Converge/submit-php/' + eventName + '-submit.php',
			data: $('#event-form').serialize(),
			success: function (responseText) {
				setTimeout(function(){
					$(obj).parent().parent().children(".se-pre-con-forms").addClass("hidden");
					$(obj).parent().html(responseText);
				},500);
			}
		});

	});

});