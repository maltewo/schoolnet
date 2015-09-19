$(document).ready(function(){
	$("#group-dropdown li a").click(function(evt){
		evt.preventDefault();
		var group = $(this).data("id");
		var text = $(this).text();
		$("#group-text").text(text);
		$("#group").val(group);
	});
});