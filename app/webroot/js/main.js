$(document).ready(function() {


	window.current_cap = 1; // On initie la variable pour récupérer le CAP à l'ID 1
	var pseudo = '';
	var cap = '';

	$('.valid-cap').off('click'); 
	$('.valid-cap').on('click', function() { // Lorsqu'on clique sur CAP
		$('.pop-up-pseudo').fadeIn();
	});

	$('.form_add_pseudo form').off('submit');
	$('.form_add_pseudo form').on('submit', function() { // Lorsqu'on valide un pseudo

		var parent = $(this).parent();

		pseudo = $(this).find('.get_pseudo').val();

		if(pseudo === '') {
			return false;
		}

		$.ajax({
			type : "POST",
			url : "Cap/addPseudo/"+pseudo,
			success: function(response){
				console.log(response);
				parent.find('.info_add').text('');
				if(response.check === 'KO') {
					parent.find('.info_add_error').text('Ce pseudo existe déjà, veuillez en entrer un autre !');
				} else {
					parent.find('.info_add_success').text('Votre pseudo a bien été ajouté, vous pouvez désormais publier !');
				}
			},

			error: function(){
				console.log('error');
            }
		});
		return false;
	});

	$('.form_add_cap form').off('submit');
	$('.form_add_cap form').on('submit', function() { // Lorsqu'on valide un pseudo

		var parent = $(this).parent();

		cap = $(this).find('.get_cap').val();

		if(cap === '') {
			return false;
		}

		$.ajax({
			type : "POST",
			url : "Cap/addCap/"+cap,
			success: function(response){
				console.log(response);
				parent.find('.info_add').text('');
				parent.find('.get_cap').val('');
				if(response.check === 'KO') {
					parent.find('.info_add_error').text('Erreur lors de l\'ajout de votre proposition !');
				} else {
					parent.find('.info_add_success').text('Votre proposition a bien été ajoutée, elle sera étudiée par nos administrateurs, merci !');
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
		console.log(window.current_cap);
		e.preventDefault();
		displayCap(window.current_cap);
	});

	displayCap(window.current_cap);

	getPublications();

	function displayCap(cap, callback) {
		console.log('called');

		$.ajax({
			type : "POST",
			url : "Cap/switchCap/"+cap,
			success: function(response){
				console.log(response);

				if(response.check === 'KO') {
					$('.txt-cap').hide(400);
					setTimeout(function(){
						$('.txt-cap').css('color')
						$('.txt-cap').text('Vous êtes arrivé à la dernière question !').fadeIn();
					}, 400);
					$('.pas-cap').hide();
					$('.valid-cap').hide();
				} else {
					$('.txt-cap').hide(400);
					setTimeout(function(){
						$('.txt-cap').text(response.current_cap.Cap.text).fadeIn();
					}, 400);
					

					window.current_cap = response.current_cap.number +1;
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
		$('.pop-up-publish').fadeIn();
	});

	$('.publish_cap').off('click');
	$('.publish_cap').on('click', function() {
		$('.pop-up-publish-cap').fadeIn();
	});

	$('.close').off('click');
	$('.close').on('click', function() {
		$('.pop-up').fadeOut();
	});

	$('.add_publication').off('submit');
	$('.add_publication').on('submit', function() {
		var publi_pseudo = $('.publi_pseudo').val();
		var publi_url = $('.publi_url').val();
		//var publi_comment = $('.publi_comment').text();

		$.ajax({
			type : "POST",
			url : "Cap/addPublication/"+publi_pseudo+'/'+publi_url+'/Comment',
			success: function(response){
				//console.log(response);
				$('.form_add_pseudo .info_add').text('');
				if(response.check === 'KO') {
					$('.form_add_pseudo .info_add_error').text('Erreur');
				} else {
					$('.form_add_pseudo .info_add_success').text('Votre pseudo a bien été ajouté !');
				}

				$('.pop-up').hide();

				getPublications();
			},

			error: function(){
				console.log('error');
            }
		});
		return false;
	});


	function getPublications() {
		$.ajax({
			type : "POST",
			url : "Cap/getPublications/",
			success: function(response){
				//console.log(response);

				$('.publications').empty();

				for (var p = 0; p < response.publications.length; p++) {
					//console.log(response.publications[p].Publication);
					var publi = response.publications[p].Publication;
					var publication =
						' <li class="publication">' +

							'<div class="publication_picture">' +
								'<img src="'+publi.picture+'" width="300" />' +
							'</div>' + 

							'<div class="publication_txt">' +

								'<div class="publication_pseudo">' +
									publi.pseudo +
								'</div>' +

								'<div class="publication_comment">' + 
								publi.comment +
								'</div>' +

							'</div>' +

						'</li>'
					;

					$('.publications').append(publication);
				}
			
			},


		});
	};

	/*--------COUNTDOWN--------*/

	$(function () {
		var releaseDate = new Date();
		releaseDate = new Date(releaseDate.getFullYear() +0, 11 - 1, 22);
		$('#defaultCountdown').countdown({until: releaseDate});
		$('#year').text(releaseDate.getFullYear());
	});
	
	/*--------END COUNTDOWN--------*/


	/*--------HOVER RESEAUX--------*/
		$('#fb_icon').hover(
			function(){
				$('.msg_reseaux p').text("Suis-nous !");
			},

			function(){
				$('.msg_reseaux p').text("");
			}

		);

		$('#twitter_icon').hover(
			function(){
				$('.msg_reseaux p').text("Follow");
			},

			function(){
				$('.msg_reseaux p').text("");
			}

		);
		
		$('#youtube_icon').hover(
			function(){
				$('.msg_reseaux p').text("Abonne-toi !");
			},

			function(){
				$('.msg_reseaux p').text("");
			}

		);
	/*--------END HOVER RESEAUX--------*/


});