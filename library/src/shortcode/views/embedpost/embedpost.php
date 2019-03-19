<article class="<?php echo $this->get_container_classes(); ?>">
	<div class="embedpost--left one-third">
		<p class="embedpost--entry-meta">
			<?php if ( $this->is_library ) : ?>
                <span class="embedpost--library">Library of Docx, Labs, and Insights</span>
			<?php elseif ( isset( $this->metadata['_ktc_coming_soon'] ) && $this->metadata['_ktc_coming_soon'] ) : ?>
				<?php $this->render_coming_soon(); ?>
			<?php elseif ( $this->is_series ) : ?>
                <span class="video-stats"><i class="fa fa-video-camera" aria-hidden="true"></i> <?php echo (int) $this->metadata['_number_of_labs_in_series']; ?> Labs<br/><i class="fa fa-clock-o" aria-hidden="true"></i> <?php esc_html_e( $this->metadata['_series_video_runtime'] ); ?> Runtime</span>
			<?php elseif ( 'lab' === $this->post_type ) : ?>
				<span class="video-stats"><i class="fa fa-video-camera" aria-hidden="true"></i> <?php echo (int) $this->metadata['_number_of_videos']; ?> Episodes<br/><i class="fa fa-clock-o" aria-hidden="true"></i> <?php esc_html_e( $this->metadata['_video_runtime'] ); ?> Runtime</span>
			<?php endif; ?>
		</p>
		<a href="<?php echo $this->permalink; ?>" class="embedpost--image"><?php echo $this->image; ?></a>
	</div>
	<div class="embedpost--right two-thirds last">
		<h3 class="embedpost--entry-title" itemprop="headline">
			<a href="<?php echo $this->permalink; ?>"><?php echo $this->title; ?></a><?php if ( $this->is_free() ) : ?><span class="badge badge__free">free</span><?php endif; ?>
		</h3>
		<p><?php echo esc_html( get_the_excerpt( $this->post_id ) ); ?></p>
		<p><a href="<?php echo $this->permalink; ?>">Learn more</a></p>
	</div>
	<div class="clearfix"></div>
</article>
