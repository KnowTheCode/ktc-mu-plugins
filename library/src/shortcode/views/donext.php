<section id="donext" class="donext">
	<header class="donext--header">
		<h3 class="donext--title"><i class="fa fa-play" aria-hidden="true"></i> <?php esc_html_e( $this->atts['title'] ); ?></h3>
	</header>

<?php if ( ! $this->atts['hide_feature'] ) : ?>
	<div class="donext--featured">
		<article class="lab-<?php echo $this->next['post_id']; ?> donext--item">
			<div class="donext--left one-third">
				<p class="donext--entry-meta">
				<?php if ( $this->next['_ktc_coming_soon'] ) : ?>
					Coming Soon
				<?php elseif ( $this->next['_number_of_labs_in_series'] ) : ?>
					<span class="video-stats"><i class="fa fa-flask"></i> <?php echo (int) $this->next['_number_of_labs_in_series']; ?> Labs<br/><i class="fa fa-video-camera"></i> <?php echo (int) $this->next['_number_of_videos']; ?> Episodes<br/><i class="fa fa-clock-o"></i> <?php esc_html_e( $this->next['_video_runtime'] ); ?> Runtime</span>
				<?php else: ?>
					<span class="video-stats"><i class="fa fa-video-camera"></i> <?php echo (int) $this->next['_number_of_videos']; ?> Episodes<br/><i class="fa fa-clock-o"></i> <?php esc_html_e( $this->next['_video_runtime'] ); ?> Runtime</span>
				<?php endif; ?>
				</p>
				<a href="<?php echo $this->next['permalink']; ?>" class="donext--image">
					<?php echo $this->next['image']; ?>
				</a>
			</div>
			<div class="donext--right two-thirds last">
				<h3 class="donext--entry-title" itemprop="headline">
					<a href="<?php echo $this->next['permalink']; ?>"><?php echo $this->next['title']; ?></a>
				</h3>
				<p><?php esc_html_e( get_the_excerpt( $this->next['post_id'] ) ); ?></p>
				<p><a href="<?php echo $this->next['permalink']; ?>">Learn more</a></p>
			</div>
			<div class="clearfix"></div>
		</article>
	</div>
<?php endif; ?>
<?php if ( $this->atts['library_id'] ) : ?>
	<p class="donext--library">Check out the <a href="<?php echo esc_url( get_permalink( (int) $this->atts['library_id'] ) ); ?>"><?php esc_html_e( get_the_title( (int) $this->atts['library_id'] ) ); ?></a> for more hands-on labs, insights, Docx, and more.</p>
<?php endif; ?>
<?php if ( $this->atts['series_id'] ) : ?>
	<p class="donext--library">Check out the series page for more labs: <a href="<?php echo esc_url( get_permalink( (int) $this->atts['series_id'] ) ); ?>"><?php esc_html_e( get_the_title( (int) $this->atts['series_id'] ) ); ?></a></p>
<?php endif; ?>
<?php if ( $this->parent_id ) : ?>
	<p class="donext--parent"><i class="fa fa-backward" aria-hidden="true"></i> <a href="<?php echo esc_url( get_permalink( $this->parent_id ) ); ?>">Back to the lab's opening page.</a></p>
<?php endif; ?>

	<nav class="pagination__entry">
		<div class="pagination__previous">
			<a href="<?php echo $this->previous['permalink']; ?>" class="button">&laquo; Previous</a>
			<div class="pagination__post-title"><?php echo $this->previous['title']; ?></div>
		</div>
		<div class="pagination__next">
			<a href="<?php echo $this->next['permalink']; ?>" class="button">Next &raquo;</a>
			<div class="pagination__post-title"><?php echo $this->next['title']; ?></div>
		</div>
	</nav>
</section>