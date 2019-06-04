<article <?php echo genesis_attr( 'entry' ); ?>>
	<?php
	if ( $video_filename ) {
		include $video_filename;
	}
	?>
	<?php echo do_shortcode( '[adspot]' ); ?>
	<div class="episode__content" itemprop="text">
		<header class="episode__header">
			<h1 class="episode__title" itemprop="headline"><?php the_title(); ?></h1>
			<h2 class="episode__lab-title"><i class="fa fa-flask" aria-hidden="true"></i> <?php printf( 'Lab: %s', get_the_title( $parent_id ) ); ?></h2>
			<?php if ( $video_filename ) : ?>
			<p><i class="fa fa-video-camera" aria-hidden="true"></i> Video Runtime: <?php esc_html_e( $runtime ); ?></p>
			<?php endif; ?>
		</header>
        <a href="#episode-playlist" style="margin: 30px 0;">Skip to episode playlist</a>
        <div class="episode--content" style="margin-top: 30px;">
			<?php the_content( '' ); ?>
        </div>
	</div>
	<?php Library\Episodes\Playlist\render_playlist(); ?>
	<i class="fa fa-backward" aria-hidden="true"></i> <a href="<?php echo get_permalink( $parent_id ); ?>">Back to the lab's opening page.</a>
</article>
