$(document).ready(function() {


	window.current_cap = 1;

	$('.valid-cap').off('click');
	$('.valid-cap').on('click', function() {
		alert('Vous êtes cap !');
	});

	$('.pas-cap a').off('click');
	$('.pas-cap a').on('click', function(e) {
		e.preventDefault();
		displayProjects(window.current_cap);
	});

	$('.publish').off('click');
	$('.publish').on('click', function() {
		alert('Publication !');
	});

	displayProjects(window.current_cap);


	function displayProjects(cap, callback) {

		$.ajax({
			type : "POST",
			url : "/BlackSheep/Cap/switchCap/"+cap,
			success: function(response){
				console.log(response);
				$('.txt-cap').text('');
				$('.txt-cap').text(response.current_cap.Cap.text);

				window.current_cap = window.current_cap +1;
			},

			error: function(){
				console.log('error');
            }
		});

		if(callback) callback();
	}
});