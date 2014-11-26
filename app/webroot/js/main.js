$(document).ready(function() {


	window.current_cap = 1; // On initialise la variable pour récupérer le CAP à l'ID 1
	var pseudo = '';
	var cap = '';

	$('.valid-cap').off('click'); 
	$('.valid-cap').on('click', function() { // Lorsqu'on clique sur CAP
		$('.pop-up-pseudo').fadeIn();
	});

	if($('.page_isolement').length != 0) {
		$('li a[href=isolement]').addClass('link_active');
	} else if($('#bg-solutions').length != 0) {
		$('li a[href=solutions]').addClass('link_active');
	} else if($('.page_webseries').length != 0) {
		$('li a[href=webseries]').addClass('link_active');
	} else if($('.page_affiche').length != 0) {
		$('li a[href=affiches]').addClass('link_active');
	}

	$('.form_add_pseudo form').off('submit');
	$('.form_add_pseudo form').on('submit', function() { // Lorsqu'on valide un pseudo

		var parent = $(this).parent();

		var publi_pseudo = $(this).find('.get_pseudo').val();
		var publi_comment = $(this).find('.get_comment').val();
		var publi_file = window.picture_uploaded;

		if(publi_pseudo == '' || publi_pseudo == undefined || publi_pseudo == null) {
			publi_pseudo = 'Anonyme';
		}
		if(publi_file == '' || publi_file == undefined || publi_file == null) {
			publi_file = '';
		}

		$.ajax({
			type : "POST",
			url : "Cap/addPublication/",
			data : {
				pseudo : publi_pseudo,
				comment : publi_comment,
				url : publi_file
			},
			success: function(response){
				$('.form_add_pseudo .info_add').text('');
				if(response.check === 'KO') {
					$('.form_add_pseudo .info_add_error').text('Erreur');
				} else {
					$('.form_add_pseudo .info_add_success').text('Votre publication a bien été ajouté !');
				}

				getPublications();
			},

			error: function(){
            }
		});
		return false;
	});

	$('.form_add_cap form').off('submit');
	$('.form_add_cap form').on('submit', function() { // Lorsqu'on valide un pseudo

		var parent = $(this).parent();

		var cap = $(this).find('.get_cap').val();
		var pseudo = $(this).find('.get_pseudo').val();
		var email = $(this).find('.get_email').val();

		if(pseudo == '' || pseudo == undefined || pseudo == null) {
			pseudo = "Anonyme";
		}
		if(pseudo == '' || pseudo == undefined || pseudo == null) {
			pseudo = "Anonyme";
		}

		$.ajax({
			type : "POST",
			url : "Cap/addCap/",
			data : {
				cap : cap,
				pseudo : pseudo,
				email : email
			},
			success: function(response){
				parent.find('.info_add').text('');
				parent.find('.get_cap').val('');
				if(response.check === 'KO') {
					parent.find('.info_add_error').text('Erreur lors de l\'ajout de votre proposition !');
				} else {
					parent.find('.info_add_success').text('Votre proposition a bien été ajoutée, elle sera étudiée par nos administrateurs, merci !');
				}
			},

			error: function(){
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

		$.ajax({
			type : "POST",
			url : "Cap/switchCap/"+window.current_cap,
			success: function(response){

				if(response.check === 'KO') {
					$('.txt-cap').hide(400);
					setTimeout(function(){
						$('.txt-cap').css('color')
						$('.txt-cap').text('Vous êtes arrivé au dernier défi !').fadeIn();
						$('#visuel').html('');
					}, 400);
					$('.pas-cap').hide();
					$('.valid-cap').hide();
				} else {
					$('.txt-cap').fadeOut(400);
					$('.author-cap').fadeOut(400);
					setTimeout(function(){
						$('.txt-cap').text(response.current_cap.Cap.text).fadeIn();
						if(response.current_cap.Cap.author != 'Admin') {
							$('.author-cap').text(response.current_cap.Cap.author).fadeIn();
						} else {
							$('.author-cap').text('');
						}
						
						if(response.current_cap.Cap.picture != null && response.current_cap.Cap.picture != undefined) {
							$('#visuel').html('<img height="250" src="'+response.current_cap.Cap.picture+'" />');
						}
						
					}, 400);
					
					window.current_cap = response.current_cap.number;
				}
			},

			error: function(){
            }
		});

		if(callback) callback();
	}

	$('.publish, .btn-forum-publish').off('click');
	$('.publish, .btn-forum-publish').on('click', function() {
		$('.pop-up-pseudo').fadeIn();
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
            }
		});
		return false;
	});


	function getPublications() {
		$.ajax({
			type : "POST",
			url : "Cap/getPublications/",
			success: function(response){

				$('.publications').empty();

				for (var p = 0; p < response.publications.length; p++) {
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

	setTimeout(function() {
		$('.button_home1')
       .animate({"left":"0px"},600);
	}, 500);

	setTimeout(function() {
		$('.button_home2')
       .animate({"left":"0px"},600);
	}, 1000);

	setTimeout(function() {
		$('.button_home3')
       .animate({"left":"0px"},600);
	}, 1500);

	$(".forum-fixed").hover(
		function(){
			$(this).addClass('active');
		},
		function(){
			$(this).removeClass('active');
		}
	);

	/*--------POPUP OVERLAY--------*/

    $('.activator').click(function(){
       	$('#overlay').fadeIn('fast');
    });

    $('.close').click(function(){
        $('#overlay').fadeOut('fast');
    });
 
	

	/*--------POPUP OVERLAY--------*/


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

	var window_height = $(window).height();
	// header: 103 px, h1 : 50px + 60px top + 20px bottom
	var header_height = 183;

	$('.div_red_first').css('margin-top', (window_height-header_height)-(window_height /1.65)+'px');
	$('.scroll_down').css('margin-top', (window_height-header_height)-(window_height /1.65)+'px')

	$('.affiche').hide();
	$('.affiche2').show();

	$(document).off('click', '.slide_affiche.swiper-slide-visible');
	$(document).on('click', '.slide_affiche.swiper-slide-visible', function() {
		var data_id = $(this).attr('data-id');
		$('.affiche').hide();
		$('.affiche'+data_id).show();
	});

	$('.button_twitter').off('click');
    $('.button_twitter').on('click', function(e) {
    	e.preventDefault();
        var width  = 575,
        height = 400,
        left   = ($(window).width()  - width)  / 2,
        top    = ($(window).height() - height) / 2,
        txt    = "#CommeDesGosses http://bit.ly/11Oa2d9",
        url    = "http://twitter.com/share?text="+urlencode(txt)+"&url="+'http//www.google.fr',
        opts   = 'status=1' +
        ',width='  + width  +
        ',height=' + height +
        ',top='    + top    +
        ',left='   + left;

        window.open(url, 'twitter', opts);
    });

    $('.button_facebook').off('click');
    $('.button_facebook').on('click', function(e) {
    	e.preventDefault();
        var params = {
            name: "J'ai été cap !",
            description: "Venez vous aussi sur Comme des gosses et prouvez que vous êtes cap de faire quelque chose !",
            link:'http://commedesgosses.com/',
            picture: 'http://commedesgosses.com/img/logo.png',
            display     : 'dialog',
			method      : 'feed'
        };
        publish(params, function() {
        });
    });

    $('#cap_img_up').uploadify({
        'fileSizeLimit' : '2MB',
        'fileTypeExts'  : '*.gif; *.jpg; *.jpeg; *.png',
        'swf'           : 'uploadify/uploadify.swf',
        'uploader'      : 'uploadify/uploadify.php?folder_images=img&folder=upload',
        'method'        : 'post',
        'onSelectError' : function(file, errorCode, errorMsg) {
            if(errorCode == 'QUEUE_LIMIT_EXCEEDED ')    alert('Le fichier est trop volumineux.');
            else if(errorCode == 'INVALID_FILETYPE  ')  alert('Le fichier n\'est pas au bon format.');
            else    alert('Erreur inconnue.');
        },
        'onUploadSuccess' : function(file, data, response) {
        	window.picture_uploaded = data;
            //console.log('The file was saved to: ' + data);
        }
    });

    function urlencode(str) {
	    str = (str + '').toString();
	    return encodeURIComponent(str).replace(/!/g, '%21').replace(/'/g, '%27').replace(/\(/g, '%28').replace(/\)/g, '%29').replace(/\*/g, '%2A').replace(/%20/g, '+');
	}

	function publish(def, callback) { 
		FB.ui(def, function(response)
		{
		if(callback)callback(response);
		}); 
	}

});