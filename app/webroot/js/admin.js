$(document).ready(function() {
	$(document).off('click', '.validate-cap');
	$(document).on('click', '.validate-cap', function() {

		var this_bloc = $(this).parent().parent();

		var data_id = $(this).attr('data-id');

		$.ajax({
			type : "POST",
			url : "/Blackship/validCap/"+data_id,
			success: function(response){
				//console.log(response);
				$('.form_add_pseudo .info_add').text('');
				if(response.check === 'KO') {
					$('.info').text('Erreur');
				} else {
					$('.info').text('Vous avez ajouté ce Cap à la liste !');
				}
				this_bloc.css("background", 'green');
			},

			error: function(){
				console.log('error');
            }
		});
	});

	$(document).off('click', '.unvalidate-cap');
	$(document).on('click', '.unvalidate-cap', function() {

		var this_bloc = $(this).parent().parent();

		var data_id = $(this).attr('data-id');

		$.ajax({
			type : "POST",
			url : "/Blackship/unvalidCap/"+data_id,
			success: function(response){
				//console.log(response);
				$('.form_add_pseudo .info_add').text('');
				if(response.check === 'KO') {
					$('.info').text('Erreur');
				} else {
					$('.info').text('Vous avez dé-ajouté ce Cap à la liste !');
				}
				this_bloc.css("background", 'red');
			},

			error: function(){
				console.log('error');
            }
		});
	});

	$(document).off('click', '.delete-cap');
	$(document).on('click', '.delete-cap', function() {

		var this_bloc = $(this).parent().parent();

		var data_id = $(this).attr('data-id');

		$.ajax({
			type : "POST",
			url : "/Blackship/deleteCap/"+data_id,
			success: function(response){
				//console.log(response);
				$('.form_add_pseudo .info_add').text('');
				if(response.check === 'KO') {
					$('.info').text('Erreur');
				} else {
					$('.info').text('Vous avez supprimé ce Cap de la liste !');
				}
				this_bloc.remove();
			},

			error: function(){
				console.log('error');
            }
		});
	});

	$(document).off('click', '.valid-message');
	$(document).on('click', '.valid-message', function() {
		console.log('ok');

		var this_bloc = $(this).parent().parent();

		var data_id = this_bloc.attr('data-id');

		$.ajax({
			type : "POST",
			url : "/Blackship/validMessage/"+data_id,
			success: function(response){
				//console.log(response);
				$('.form_add_pseudo .info_add').text('');
				if(response.check === 'KO') {
					$('.info').text('Erreur');
				} else {
					$('.info').text('Vous avez validé ce message !');
				}
			},

			error: function(){
				console.log('error');
            }
		});
	});


	$(document).off('click', '.unvalid-message');
	$(document).on('click', '.unvalid-message', function() {
		console.log('ok');

		var this_bloc = $(this).parent().parent();

		var data_id = this_bloc.attr('data-id');

		$.ajax({
			type : "POST",
			url : "/Blackship/unvalidMessage/"+data_id,
			success: function(response){
				//console.log(response);
				$('.form_add_pseudo .info_add').text('');
				if(response.check === 'KO') {
					$('.info').text('Erreur');
				} else {
					$('.info').text('Vous avez DEvalidé ce message !');
				}
			},

			error: function(){
				console.log('error');
            }
		});
	});


});