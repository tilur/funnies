<h1>Funnies</h1>

<p>You must have heard something funny while in the office, no? Here's your chance to let everyone else know just how funny it was. Share the wealth...</p>

<div id="wrapper-add_funnies" class="mb16">
	<div class="form-row">
		<div class="form-label">What was so funny?</div>
		<div class="form-input"><?php echo Form::textarea($formData['funny']); ?></div>
	</div>

	<div id="add_funnies-sender" class="form-row float-left w50">
		<div class="form-label">Who said it?</div>
		<div class="form-input"><?php echo Form::select($formData['sender']); ?></div>
	</div>

	<div id="add_funnies-receiver" class="form-row float-left w50">
		<div class="form-label">Did they say it to someone?</div>
		<div class="form-input"><?php echo Form::select($formData['receiver']); ?></div>
	</div>

	<div id="add_funnies-context" class="form-row mb16">
		<div class="form-label">Any extra context?</div>
		<div class="form-input"><?php echo Form::textarea($formData['context']); ?></div>
	</div>

	<div id="add_funnies-buttons" class="form-row mb16">
		<center><?php echo Form::button($formData['btnSubmit']).' '.Form::button($formData['btnCancel']); ?></center>
	</div>

	<div class="styled-hr"></div>
</div>

<h1>Oh The Laughs</h1>

<div id="wrapper-funnies_post">
	<div class="tabs">
		<div id="tab-funniest" class="tab active">Funniest</div>
		<div id="tab-recent" class="tab">Recent</div>
	</div>

	<div class="posts">
		<div id="tab-funniest-posts" class="post funniest">
			<?php echo $posts['funniest']; ?>
		</div>

		<div id="tab-recent-posts" class="post recent">
			<?php echo $posts['recent']; ?>
		</div>
	</div>
</div>

<script>
	$('#funny').bind('focus', function() {
		add_funnies('show');
	});
	$('#wrapper-funnies_post').find('.tabs').find('div').each(function () {
		$(this).bind('click', function() {
			showtab($(this).attr('id'));
		})
	});
</script>
