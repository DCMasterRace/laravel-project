$(document).ready(function() {
	$.ajax({
		type: "GET",
		cache: false,
		url: 'api/movies',
		success: function(data) {
			$('#movies').append(data);
			console.log(data);
		}
	});

	// $('.nav-side-menu').css('display','none');

	function test(){
		alert('etst');
	};
});
