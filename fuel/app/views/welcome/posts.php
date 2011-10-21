<?php foreach ($posts AS $i => $post) { ?>
<?php //echo "<PRE>"; var_dump($post); ?>

<div class="post">
	<div class="sender">
		<?php
		echo $post['sender'].' said';
		if ($post['receiver']) {
			echo ' to '.$post['receiver'];
		}
		echo ':'
		?>
	</div>
	<?php echo $post['f_body']; ?>
</div>
<?php } ?>