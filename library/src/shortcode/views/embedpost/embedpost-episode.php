<article class="<?php echo $this->get_container_classes(); ?>">
	<div class="embedpost--left one-third">
		<p class="embedpost--entry-meta">
			<?php if ( $this->metadata['episode_coming_soon'] ) : ?>
				<?php $this->render_coming_soon(); ?>
			<?php else : ?>
				<span class="video-stats">Episode #<?php esc_html_e( $this->metadata['episode_number'] ); ?><br/><i class="fa fa-clock-o" aria-hidden="true"></i> <?php esc_html_e( $this->metadata['episode_runtime'] ); ?> Runtime</span>
			<?php endif; ?>
		</p>
		<a href="<?php echo $this->permalink; ?>" class="embedpost--image"><?php echo $this->image; ?></a>
	</div>
	<div class="embedpost--right two-thirds last">
		<h3 class="embedpost--entry-title" itemprop="headline">
			<a href="<?php echo $this->permalink; ?>"><?php echo $this->title; ?></a><?php if ( $this->metadata['episode_access'] === 'free' ) : ?><span class="badge badge__free">free</span><?php endif; ?>
		</h3>
        <h4 class="embedpost--parent-title">
            <i class="fa fa-flask" aria-hidden="true"></i> Lab: <?php esc_html_e( $this->parent['title'] ); ?>
        </h4>
		<p><?php esc_html_e( get_the_excerpt( $this->post_id ) ); ?></p>
		<p><a href="<?php echo $this->permalink; ?>">Learn more</a></p>
	</div>
	<div class="clearfix"></div>
</article>