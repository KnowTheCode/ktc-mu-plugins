<div id="<?php echo $video_id; ?>" class="embed-vimeo">
	<iframe src="<?php echo esc_url( $url ); ?>" width="<?php echo (int) $this->atts['width']; ?>" height="<?php echo (int) $this->atts['height']; ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
	<?php
	if ( is_user_logged_in() ) {
		echo $video_footer;
	} ?>
</div>