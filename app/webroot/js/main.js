$(document).ready(function() {


	window.current_cap = 1;
	var pseudo = '';

	$('.form_add_pseudo').hide();

	$('.valid-cap').off('click');
	$('.valid-cap').on('click', function() {
		$('.form_add_pseudo').show();
	});

	$('.form_add_pseudo').off('submit');
	$('.form_add_pseudo').on('submit', function() {

		pseudo = $('.get_pseudo').val();

		if(pseudo === '') {
			return false;
		}

		$.ajax({
			type : "POST",
			url : "/BlackSheep/Cap/addPseudo/"+pseudo,
			success: function(response){
				console.log(response);

				if(response.check === 'KO') {
					$('#content').append('Erreur');
				} else {
					$('#content').append('Votre pseudo a bien été ajouté !');
				}
			},

			error: function(){
				console.log('error');
            }
		});
		return false;
	});




	$('.pas-cap a').off('click');
	$('.pas-cap a').on('click', function(e) {
		e.preventDefault();
		displayProjects(window.current_cap);
	});

	displayProjects(window.current_cap);

	getPublications();

	function displayProjects(cap, callback) {

		$.ajax({
			type : "POST",
			url : "/BlackSheep/Cap/switchCap/"+cap,
			success: function(response){
				console.log(response);

				if(response.check === 'KO') {
					$('.txt-cap').text('');
					$('.txt-cap').text('Vous êtes arrivé à la dernière question !');
					$('.pas-cap').hide();
					$('.valid-cap').hide();
				} else {
					$('.txt-cap').text('');
					$('.txt-cap').text(response.current_cap.Cap.text);

					window.current_cap = window.current_cap +1;
				}
			},

			error: function(){
				console.log('error');
            }
		});

		if(callback) callback();
	}

	$('.publish').off('click');
	$('.publish').on('click', function() {
		$('.pop-up').show();
	});

	function getPublications() {
		$.ajax({
			type : "POST",
			url : "/BlackSheep/Cap/getPublications/",
			success: function(response){
				console.log(response);

				for (var p = 0; p < response.publications.length; p++) {
					console.log(response.publications[p].Publication);
					var publi = response.publications[p].Publication;

					var publication =
						' <div class="publication">' +

							'<div>' +
								'<img src="publi.picture" width="300" />' +
							'</div class="publication_picture">' + 

							'<div class="publication_txt>' +

								'<div class="publication_pseudo">' +
									publi.pseudo +
								'</div>' +

								'<div class="publication_comment">' + 
								publi.comment +
								'</div>' +

							'</div>' +

						'</div>'
					;

					$('.publications').append(publication);
				}
			
			},

			error: function(){
				console.log('error');
            }

		});
	}
});