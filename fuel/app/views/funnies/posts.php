<?php foreach ($posts AS $i => $post) {
	$voteLink = 'funnies/vote/'.$post['f_funnies_id'].'/'.($type === 1 ? 'funniest' : 'recent').($offset ? '/'.$offset : '');
?>
<?php //echo "<PRE>"; var_dump($post); ?>

<div class="post">
	<div class="post-header">
		<div class="post-sender">
			<?php
			echo Html::anchor('search/'.$post['f_sender_id'], $post['sender'], array('title'=>'Search for more entries by '.$post['sender'])).' said';
			if ($post['receiver']) {
				echo ' to '.Html::anchor('search/'.$post['f_receiver_id'], $post['receiver'], array('title'=>'Search for more entries by '.$post['receiver']));
			}
			echo ':'
			?>
		</div>
		<div class="post-timestamp"><?php echo date("F d, Y (H:i)", strtotime($post['f_date_added'])); ?></div>
	</div>

	<div class="styled-hr cb"></div>

	<div class="post-content">
		<div class="post-body">"<?php echo $post['f_body']; ?>"</div>
		<?php if ($post['f_context']) { ?>
		<div class="post-context">
			<div class="label">The Context:</div>
			<?php echo $post['f_context']; ?>
		</div>
		<?php } ?>
	</div>
	<div class="post-votes">
		<?php echo $post['f_votes']; ?> Vote<?php echo $post['f_votes'] === 1 ? '' : 's'; ?>&nbsp;&nbsp;&nbsp;<?php echo Html::anchor($voteLink, '+1', array('title'=>'Vote for this as the funniest funny')); ?>
	</div>
</div>
<?php } ?>