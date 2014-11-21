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

	$('button.pas-cap').off('click');
	$('button.pas-cap').on('click', function() {
		displayCap(window.current_cap);
	});

	displayCap(window.current_cap);

	getPublications();

	function displayCap(cap, callback) {
		//console.log('called');
		console.log(window.current_cap);

		$.ajax({
			type : "POST",
			url : "Cap/switchCap/"+window.current_cap,
			success: function(response){
				//console.log(response);

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
					
					window.current_cap = response.current_cap.number;
				}
			},

			error: function(){
				console.log('error');
            }
		});

		if(callback) callback();
	}

	$('.publish, .btn-forum-publish').off('click');
	$('.publish, .btn-forum-publish').on('click', function() {
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
		$('#alwaysShow').countdown({until: releaseDate, format: 'DHMS'});
		$('#year').text(releaseDate.getFullYear());
	});
	
	/*--------END COUNTDOWN--------*/


	/*--------HOVER RESEAUX--------*/
		$('#fb_icon').hover(
			function(){
				$('.msg_reseaux p').text("Rejoins-nous !");
			},

			function(){
				$('.msg_reseaux p').text("");
			}

		);

		$('#twitter_icon').hover(
			function(){
				$('.msg_reseaux p').text("Suis-nous !");
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

	$('.picture_home').height(($(window).height()-130));

	$(window).resize(function() {
		$('.picture_home').height(($(window).height()-130));
	});

	for (var p = 0; p < 32; p++) {
		
		if(p === 9 || p === 16 || p === 24) {
			$('.points').append('<div class="point'+p+' point big_point "></div>');
		} else {
			$('.points').append('<div class="point'+p+' point"></div>');
		}
	}

	var place = 0;
	for (var r = 0; r < 32; r++) {
		if(r >= 0 && r < 4) {
			$('.point'+r).css('left', (-place*26)+'px');
			place++;
		}
		if(r === 4) {
			$('.point'+r).css('left', (-place*22)+'px');
			place--;
		}
		if(r === 5) {
			$('.point'+r).css('left', (-place*24)+'px');
		}
		if(r >= 6 && r < 10) {
			$('.point'+r).css('left', ((-place*14)+r)+'px');
			place = place - 2;
		}
		if(r >= 10 && r < 13) {
			$('.point'+r).css('left', ((-place*14)+r)+'px');
			place--;
		}
		if(r >= 13 && r < 15) {
			$('.point'+r).css('left', ((-place*10)+r)+'px');
			place++;
		}
		if(r >= 13 && r < 15) {
			$('.point'+r).css('left', ((-place*12)+r)+'px');
			place++;
		}
		if(r >= 15 && r < 17) {
			$('.point'+r).css('left', ((-place*10)+r)+'px');
			place++;
		}
		if(r === 17) {
			$('.point'+r).css('left', ((-place*16)+r)+'px');
		}
		if(r >= 18 && r < 21) {
			$('.point'+r).css('left', ((-place*16)+r)+'px');
			place--;
		}
		if(r === 21) {
			$('.point'+r).css('left', ((-place*13)+r)+'px');
		}
		if(r === 22) {
			$('.point'+r).css('left', ((-place*10)+r)+'px');
			place++;
		}
		if(r === 23) {
			$('.point'+r).css('left', ((-place*5)+r)+'px');
			place++;
		}
		if(r === 24) {
			$('.point'+r).css('left', ((-place*-5)+r)+'px');
			place++;
		}
		if(r === 25) {
			$('.point'+r).css('left', ((-place*-10)+r)+'px');
			place++;
		}
		if(r === 26) {
			$('.point'+r).css('left', ((-place*-6)+r)+'px');
			place++;
		}
		if(r >= 27 && r < 29) {
			place--;
			$('.point'+r).css('left', ((-place*20)+r)+'px');
			place--;
		}
		if(r === 29) {
			$('.point'+r).css('left', ((-place*20)+r)+'px');
			place++;
		}
		if(r === 30) {
			place--;
			$('.point'+r).css('left', ((-place*23)+r)+'px');
			place++;
		}
		if(r === 31) {
			$('.point'+r).css('left', ((-place*24)+r)+'px');
			place++;
		}


		$('.point'+r).css('top', (r*45)+'px');
	}

	displayPoint('jaune', 0);

	var display_red = 0;
	var nb_bulle = 1;
	var this_color;

	function displayPoint(color, yo) {
		if(yo === 9 || yo === 16 || yo === 24) {
			$('.points_'+color+' .point'+yo).animate({
			    width: "16px",
			    height: "16px"
			  }, 200, function() {
			  	if(color === 'jaune') {
			  		this_color = 'rouge';
			  	} else {
			  		this_color = 'jaune';
			  	}
			  	$('.bulle_'+this_color+nb_bulle).animate({
				    width: "350px",
				    height: "308px"
				  }, 0, function() {
				  	nb_bulle++;
				});
			  	yo++;
			    displayPoint(color, yo);
			});
		} else {
			$('.points_'+color+' .point'+yo).animate({
			    width: "8px",
			    height: "8px"
			  }, 200, function() {
			  	yo++;
			    displayPoint(color, yo);
			});
		}
		if(yo === 31) {
			if(display_red === 0) {
				nb_bulle = 1;
				displayPoint('rouge', 0);
				display_red = 1;
			}
		}
	}

});