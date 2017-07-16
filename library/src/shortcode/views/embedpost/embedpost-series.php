<article class="<?php echo $this->get_container_classes(); ?>">
	<div class="embedpost--left one-third">
		<p class="embedpost--entry-meta">
            <span class="video-stats"><i class="fa fa-flask" aria-hidden="true"></i> <?php echo (int) $this->metadata['_number_of_labs_in_series']; ?> Labs<br/><i class="fa fa-video-camera" aria-hidden="true"></i> <?php echo (int) $this->metadata['_number_of_videos_in_series']; ?> Episodes<br/><i class="fa fa-clock-o" aria-hidden="true"></i> <?php esc_html_e( $this->metadata['_series_video_runtime'] ); ?> Runtime</span>
		</p>
		<a href="<?php echo $this->permalink; ?>" class="embedpost--image"><?php echo $this->image; ?></a>
	</div>
	<div class="embedpost--right two-thirds last">
		<h3 class="embedpost--entry-title" itemprop="headline">
			<a href="<?php echo $this->permalink; ?>"><?php echo $this->title; ?></a>
		</h3>
		<p><?php esc_html_e( get_the_excerpt( $this->post_id ) ); ?></p>
		<p><a href="<?php echo $this->permalink; ?>">Learn more</a></p>
	</div>
	<div class="clearfix"></div>
</article>