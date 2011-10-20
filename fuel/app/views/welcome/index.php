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

<script>
	$('#funny').bind('focus', function() {
		add_funnies('show');
	})
</script>

<h1>Oh The Laughs</h1>

<div id="wrapper-funnies_post">
	<div class="tabs">
		<div class="tab active">Funniest</div>
		<div class="tab active">Recent</div>
	</div>

	<div class="posts">
		<div class="post funniest">
			<?php foreach ($posts['funniest'] AS $i => $post) {
				echo $post['f_body'].'<br>';
			}?>
		</div>

		<div class="post recent">
			<?php foreach ($posts['recent'] AS $i => $post) {
				echo $post['f_body'].'<br>';
			}?>
		</div>
	</div>
</div>
