function add_funnies(way) {
	if (way == 'show') {
		$('#funny').css({'height': '70px', 'max-height': '70px', 'min-height': '70px'});
		$('#add_funnies-sender').show();
		$('#add_funnies-receiver').show();
		$('#add_funnies-context').show();
		$('#add_funnies-buttons').show();
		/*
		$('#wrapper-add_funnies_button').animate({height: 'toggle'}, 200, function() {
			$('#wrapper-add_funnies').animate({height: 'toggle'}, 200);
		});
		*/
	}
	else if (way == 'hide') {
		$('#funny').css({'height': '20px', 'max-height': '20px', 'min-height': '20px'});
		$('#add_funnies-sender').hide();
		$('#add_funnies-receiver').hide();
		$('#add_funnies-context').hide();
		$('#add_funnies-buttons').hide();
		/*
		$('#wrapper-add_funnies').animate({height: 'toggle'}, 200, function() {
			$('#wrapper-add_funnies_button').animate({height: 'toggle'}, 200);
		});
		*/
	}
}