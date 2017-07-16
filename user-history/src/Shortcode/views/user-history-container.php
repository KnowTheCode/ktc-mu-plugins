<?php if ( $this->records ) : ?>
<ul class="uhlist--container">
	<?php $this->render_history_rows(); ?>
</ul>
<?php else: ?>
<p><?php echo $this->atts['none_found']; ?></p> 
<?php endif; ?>
