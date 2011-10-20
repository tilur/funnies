function add_funnies(way) {
	if (way == 'show') {
		$('#funny').css({'height': '70px', 'max-height': '70px', 'min-height': '70px'});
		$('#add_funnies-sender').show();
		$('#add_funnies-receiver').show();
		$('#add_funnies-context').show();
		$('#add_funnies-buttons').show();
	}
	else if (way == 'hide') {
		$('#funny').css({'height': '20px', 'max-height': '20px', 'min-height': '20px'});
		$('#add_funnies-sender').hide();
		$('#add_funnies-receiver').hide();
		$('#add_funnies-context').hide();
		$('#add_funnies-buttons').hide();
	}
}

function showtab(which) {
	$('#wrapper-funnies_post').find('.tabs').find('div').each(function () {
		$(this).removeClass('active');
		$('#' + $(this).attr('id') + '-posts').hide();
	});

	$('#' + which + '-posts').show();
	$('#' + which).addClass('active');
}