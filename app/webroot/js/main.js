$(document).ready(function() {


	window.current_cap = 1; // On initie la variable pour récupérer le CAP à l'ID 1
	var pseudo = '';

	$('.form_add_pseudo').hide();

	$('.valid-cap').off('click'); 
	$('.valid-cap').on('click', function() { // Lorsqu'on clique sur CAP
		$('.form_add_pseudo').show();
	});

	$('.form_add_pseudo form').off('submit');
	$('.form_add_pseudo form').on('submit', function() { // Lorsqu'on valide un pseudo

		pseudo = $('.get_pseudo').val();

		if(pseudo === '') {
			return false;
		}

		$.ajax({
			type : "POST",
			url : "/BlackSheep/Cap/addPseudo/"+pseudo,
			success: function(response){
				console.log(response);
				$('.form_add_pseudo .info_add').text('');
				if(response.check === 'KO') {
					$('.form_add_pseudo .info_add_error').text('Erreur');
				} else {
					$('.form_add_pseudo .info_add_success').text('Votre pseudo a bien été ajouté !');
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
		displayCap(window.current_cap);
	});

	displayCap(window.current_cap);

	getPublications();

	function displayCap(cap, callback) {

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

	$('.close').off('click');
	$('.close').on('click', function() {
		$('.pop-up').hide();
	});

	$('.add_publication').off('submit');
	$('.add_publication').on('submit', function() {
		var publi_pseudo = $('.publi_pseudo').val();
		var publi_url = $('.publi_url').val();
		//var publi_comment = $('.publi_comment').text();

		$.ajax({
			type : "POST",
			url : "/BlackSheep/Cap/addPublication/"+publi_pseudo+'/'+publi_url+'/Comment',
			success: function(response){
				console.log(response);
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
			url : "/BlackSheep/Cap/getPublications/",
			success: function(response){
				console.log(response);

				$('.publications').empty();

				for (var p = 0; p < response.publications.length; p++) {
					console.log(response.publications[p].Publication);
					var publi = response.publications[p].Publication;

					var publication =
						' <div class="publication">' +

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

	var totaltime = 20;

	function update(percent) {
    	var deg;
    		if (percent < (totaltime / 2)) {
        	deg = 90 + (360 * percent / totaltime);
        	$('.pie').css('background-image',
            'linear-gradient(' + deg + 'deg, transparent 50%, white 50%),linear-gradient(90deg, white 50%, transparent 50%)'
       		 );
    		} else if (percent >= (totaltime / 2)) {
        deg = -90 + (360 * percent / totaltime);
        $('.pie').css('background-image',
            'linear-gradient(' + deg + 'deg, transparent 50%, #00b5e8 50%),linear-gradient(90deg, white 50%, transparent 50%)'
       		 );
   		 }
	}

	var count = parseInt($('#time').text());
	myCounter = setInterval(function () {
    count += 1;
    $('#time').html(count);
    update(count);
    if (count == totaltime) clearInterval(myCounter);
	}, 1000);
});