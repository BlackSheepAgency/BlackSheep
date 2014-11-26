for (var p = 0; p < 32; p++) {
	if(p === 9 || p === 16 || p === 24) {
		$('.points').append('<div class="point'+p+' point big_point "></div>');
	} else {
		$('.points').append('<div class="point'+p+' point"></div>');
	}
}
for (var p = 0; p < 32; p++) {
	$('.point'+p).attr('data-checked', '0');
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

	$(window).off('scroll');

	var scroll_down = 0;
	window.number_point = 0;

	var offset_points_rouge = $('.points_rouge').offset().top;
	var display_red = 0;
	var nb_bulle = 1;
	var this_color;
	var display_jaune = 0;

	$(document).off('click', '.back_top');
	$(document).on('click', '.back_top', function() {
		$('html, body')
	       .stop()
	       .animate({scrollTop: $('body').offset().top}, 500 );
	});

	$(window).on('scroll', function() {
		if(display_jaune === 0) {
			theDisplay('jaune', window.number_point);
		}

		if(display_red === 0) {
			if(offset_points_rouge < ($(window).height() + $(window).scrollTop())) {
				theDisplay('rouge', window.number_point);
			}
		}

		if($('body').scrollTop() > ($(window).height())) {
			$('.back_top').fadeIn(500);
		} else {
			$('.back_top').fadeOut(500);
		}
	});

	function runBig() {
	  $('.picture_scroll_big')
       .animate({"top":"10px"},600)
       .animate({"top":"0px"},400)
	}

	setInterval(function() {
		runBig();
	}, 200);

	function runSmall() {
	  $('.picture_scroll_small')
       .animate({"top":"10px"},600)
       .animate({"top":"0px"},400)
	}

	setInterval(function() {
		runSmall();
	}, 200);

	function runBigPoint() {
	  $('.big_point.big_point_active')
       .animate({"opacity":"0.5"},600)
       .animate({"opacity":"1"},400);

	}
	setInterval(function() {
		runBigPoint();
	}, 200);
	

	

	
	function theDisplay(color, yo) {
		//if(callback) callback();
		var the_point = $('.points_'+color+' .point'+window.number_point);
		var previous_point = $('.points_'+color+' .point'+((window.number_point)-1));
		//console.log('point', the_point);
		//console.log('previous', previous_point);
		var point_top = the_point.offset().top;
		var window_top = ($(window).height() + $(window).scrollTop()) - 100;

		if(point_top < window_top && (the_point.attr('data-checked') == '0') && (previous_point.attr('data-checked') == '1') || window.number_point == 0) {
			if(display_jaune === 0) {
				display_jaune = 1;
			} else if(display_jaune === 2) {
				display_red = 1;
			}

			//console.log(display_jaune);
			//console.log('rouge', display_red);

			if(window.number_point === 9 || window.number_point === 16 || window.number_point === 24) {
				the_point.animate({
				    width: "16px",
				    height: "16px"
				  }, 200, function() {
				  	if(color === 'jaune') {
				  		this_color = 'rouge';
				  	} else {
				  		this_color = 'jaune';
				  	}
				  	the_point.addClass('big_point_active');
				  	$('.bulle_'+this_color+nb_bulle).animate({
					    opacity: 1
					}, {
					    duration: 500,
					    specialEasing: {
					    width: "easeOutQuint",
					    height: "easeOutQuint"
						},
						 complete: function() {
					      nb_bulle++;
					    }
					});
					the_point.attr('data-checked', '1');
				  	window.number_point = window.number_point + 1;
				  	if(display_jaune === 1) {
				  		display_jaune = 0;
				  	} 
				  	if(display_jaune === 2) {
				  		display_red = 0;
				  	}
				  	if(window.number_point !== 32) {
				  		the_point = $('.points_'+color+' .point'+window.number_point);
						point_top = the_point.offset().top;
						window_top = ($(window).height() + $(window).scrollTop()) - 100;

						if(point_top < window_top) {
							theDisplay(color, window.number_point);
						}
				  	}
				});

			} else {
				the_point.animate({
				    width: "8px",
				    height: "8px"
				  }, 200, function() {
				  	the_point.attr('data-checked', '1');
				  	window.number_point = window.number_point + 1;
				  	if(display_jaune === 1) {
				  		display_jaune = 0;
				  	} 
				  	if(display_jaune === 2) {
				  		display_red = 0;
				  	}
				  	if(window.number_point !== 32) {
				  		the_point = $('.points_'+color+' .point'+window.number_point);
						point_top = the_point.offset().top;
						window_top = ($(window).height() + $(window).scrollTop()) - 100;

						if(point_top < window_top) {
							theDisplay(color, window.number_point);
						}
				  	} else {
				  		//console.log('end');
				  		if(display_jaune === 2 && display_red === 0) {
				  			display_red = 1;
				  		}
				  		if(display_jaune === 0) {
				  			display_jaune = 2;
				  		}
				  		window.number_point = 0;
				  		nb_bulle = 1;
				  	}
				});
			}
		}
	}