$(document).ready(function() {


	var current_cap = 0;


	$('.valid-cap').off('click');
	$('.valid-cap').on('click', function() {
		alert('Vous êtes cap !');
	});

	$('.pas-cap a').off('click');
	$('.pas-cap a').on('click', function(e) {
		e.preventDefault();
		alert('Vous êtes pas cap !');
	});


	$('.publish').off('click');
	$('.publish').on('click', function() {
		alert('Publication !');
	});


	function displayProjects(type, callback) {

		current_cap = current_cap +1;

		$.ajax({
			type : "POST",
			url : "/Blacksheep/Cap/switchCap/"+current_cap,
			success: function(response){
				console.log(response);

				alert(response)
			},

			error: function(){
				console.log('error');
            }
		});

		if(callback) callback();
	}






});